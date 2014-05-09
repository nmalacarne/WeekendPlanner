<?php

class EventsController extends AppController{
	
	var $name = 'Events';
	public $components = array('RequestHandler');
	var $helpers = array('Js');
	
	public function index(){			
		if(!$this->Auth->user()){
			$this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
		}
		
		$this->loadModel('Attending');
		$rows = $this->Attending->find('count', array(
			'conditions' => array('Attending.user_id' => $this->Auth->user('id'))));
		
		
		$this->set('rowCount', $rows);
		$this->set('attendings', $this->Event->Query("Select users.username, events.event_name, events.start_date, events.end_date
														from users 
														join attendings on attendings.user_id = users.id
														join events on events.id = attendings.event_id
														where users.id = ?", array($this->Auth->user('id'))));
		$this->loadModel('Event');												
		if($this->request->is('post')){
		
			
			$name = $this->data['Event']['Event Name'];
			$start_date = str_replace("/","-",$this->data['Event']['Start Date']);
			$end_date = str_replace("/","-",$this->data['Event']['End Date']);
			
			$diff = ((abs(strtotime($start_date) - strtotime($end_date)))/(60*60*24)) + 1;
			
			$this->set('rawDate', $start_date);
			
			$data = array(
				'Event' => array(
					'created_by' => $this->Auth->user('id'),
					'event_name' => $this->data['Event']['Event Name'],
					'start_date' => date('Y-m-d',strtotime($start_date)),
					'end_date' => date('Y-m-d',strtotime($end_date)),
					'create_dt' => (string)date('m-d-y'),
					'num_days' => $diff
				)
			);
			
			$this->Event->create();
			if($this->Event->save($data)){
				
				$this->redirect(array('controller' => 'Events', 'action' => 'detail', $name));
				
			}else{
				$this->Session->setFlash(__('The event could not be saved.  Please try again'));
			}
		
		}
	} 
	
	public function add(){
		if($this->request->is('post')){
			$this->Event->create();
			if($this->Event->save($this->request->data)){
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect($this->Auth->redirect());
				
			}else{
				$this->Session->setFlash(__('The user could not be saved.  Please try again'));
			}
		
		}
	}
	
	public function detail($name){
		
		
		
		$event = $this->Event->find('first', array(
			'conditions' => array('Event.event_name' => $name)
		));
		$this->set('details', $event);
		
		//Meals
		$this->loadmodel('Meal');
		$meals = $this->Meal->find('all', array(
			'conditions' => array('Meal.event_id' => $event['Event']['id'])
		));
		$this->set('meals', $meals);
		
		//Attending
		$this->loadmodel('Attending');
		$isAttending = $this->Attending->find('count', array(
			'conditions' => array('Attending.user_id' => $this->Auth->user('id'), 'Attending.event_id' => $event['Event']['id'])));
		$this->set('isAttending', $isAttending);
		
		$this->set('allAttending', $this->Attending->Query("Select users.username
														from attendings 
														join users on attendings.user_id = users.id											
														where attendings.event_id = ?", array($event['Event']['id'])));
		
		
		$attendingInfo = $this->Attending->find('first', array(
			'conditions' => array('Attending.user_id' => $this->Auth->user('id'), 'Attending.event_id' => $event['Event']['id'])));
		
		
		//Items
		$this->loadmodel('Item');
		$items = $this->Item->Query("Select users.username, items.name
														from items 
														join users on items.user_id = users.id											
														where items.event_id = ?", array($event['Event']['id']));
		$this->set('items', $items);
		
		//Activities
		$this->loadmodel('Activity');
		$activities = $this->Activity->find('all', array(
			'conditions' => array('Activity.event_id' => $event['Event']['id'])));
		$this->set('activities', $activities);
		
		if($this->request->is('post')){
			
			if(isset($this->data['Meal'])){
				
			
				
				$data = array(
					'Meal' => array(
						'created_by' => $this->Auth->user('id'),
						'event_id' => $event['Event']['id'],
						'category' => $this->data['Meal']['category'],
						'eat_in' => $this->data['Meal']['Eat in/out'],
						'day' => $this->data['Meal']['day']
					)
				);
				
				$this->loadmodel('Meal');
				
				$this->Meal->create();
				if($this->Meal->save($data)){
					
					if($this->RequestHandler->isAjax()){
						$this->autoLayout = $this->autoRender = false; 
						
						//push meals
						$this->loadmodel('Meal');
						$meals = $this->Meal->find('all', array(
							'conditions' => array('Meal.event_id' => $event['Event']['id'], 'Meal.day' => $data['Meal']['day'])
						));
						$this->set('meals', $meals);
                        
						$this->set('mealDay', $data['Meal']['day']);
						$this->set('mealCategory', $data['Meal']['category']);
						
						//push activities
						$this->loadmodel('Activity');
						
						$activities = $this->Activity->find('all', array(
							'conditions' => array('Activity.event_id' => $event['Event']['id'], 'Activity.day' => $data['Meal']['day'])
						));
						$this->set('activities', $activities);
						
						$this->set('activityDay', $data['Meal']['day']);
						$this->set('activityCategory', $data['Meal']['category']);
						
						$this->render('day', 'ajax');
						
					}else{
						$this->redirect(array('controller' => 'Events', 'action' => 'detail', $name));
						
					}
				}else{
					
					$this->Session->setFlash(__('There was an issue.  Please try again'));
				}
			}else if(isset($this->data['Activity'])){
				$data = array(
					'Activity' => array(
						'created_by' => $this->Auth->user('id'),
						'event_id' => $event['Event']['id'],
						'name' => $this->data['Activity']['Activity Name'],
						'description' => $this->data['Activity']['description'],
						'day' => $this->data['Activity']['day'],
						'create_dt' => (string)date('m-d-y'),
						'category'=> $this->data['Activity']['category']
					)
				);
				$this->loadmodel('Activity');
				$this->Activity->create();
				if($this->Activity->save($data)){
					
					if($this->RequestHandler->isAjax()){
						$this->autoLayout = $this->autoRender = false; 
						$this->loadmodel('Activity');
						
                        //push activities
						$activities = $this->Activity->find('all', array(
							'conditions' => array('Activity.event_id' => $event['Event']['id'], 'Activity.day' => $data['Activity']['day'])
						));
						$this->set('activities', $activities);
						
						$this->set('activityDay', $data['Activity']['day']);
						$this->set('activityCategory', $data['Activity']['category']);
						
                        //push meals
						$this->loadmodel('Meals');
						
						$meals = $this->Meal->find('all', array(
							'conditions' => array('Meal.event_id' => $event['Event']['id'], 'Meal.day' => $data['Activity']['day'])
						));
						$this->set('meals', $meals);
						$this->set('mealDay', $data['Activity']['day']);
                        $this->set('mealCategory', $data['Activity']['category']);
					
											
						$this->render('day', 'ajax');
						
					}else{
						$this->redirect(array('controller' => 'Events', 'action' => 'detail', $name));
						
					}
				}else{
					
					$this->Session->setFlash(__('There was an issue.  Please try again'));
				}
				
			}else if(isset($this->data['Attending']) && 'attending' === $this->data['Attending']['formsent']){
				$data = array(
					'Attending' => array(
						'user_id' => $this->Auth->user('id'),
						'event_id' => $event['Event']['id']
						
					)
				);
				
				
				
				$this->loadmodel('Attending');
				$this->Attending->create();
				if($this->Attending->save($data)){
					
					
					$this->redirect(array('controller' => 'Events', 'action' => 'detail', $name));
					
				}else{
					
					$this->Session->setFlash(__('There was an issue.  Please try again'));
				}
				
				
			}else if(isset($this->data['Attending']) && 'notAttending' === $this->data['Attending']['formsent']){
				$this->Attending->delete($attendingInfo['Attending']['id']);
				$this->redirect(array('controller' => 'Events', 'action' => 'detail', $name));
			}else if(isset($this->data['Item'])){
				
				$data = array(
					'Item' => array(
						'user_id' => $this->Auth->user('id'),
						'event_id' => $event['Event']['id'],
						'name' => $this->data['Item']['ItemName']
						
					));
				$this->loadmodel('Item');
				$this->Item->create();
				
				if($this->Item->save($data)){
					
					if($this->RequestHandler->isAjax()){
						$this->autoLayout = $this->autoRender = false; 
						$this->loadmodel('Item');
						
						$items = $this->Item->find('all', array(
							'conditions' => array('Item.event_id' => $event['Event']['id'], 'User.id'=>$this->Auth->user('id')
						)));	
						
						
						
						$this->set('items', $items);
						
						$this->render('items', 'ajax');
						
					}else{
						$this->redirect(array('controller' => 'Events', 'action' => 'detail', $name));
						
					}
				}else{
					
					$this->Session->setFlash(__('There was an issue.  Please try again'));
				}
				
				
				
			}
		}
		
		
	}
	

	
}
?>