<?php

class HomeController extends AppController{
	
	var $name = 'Events';
	
	public function index(){			
		
		if(!$this->Auth->user()){
			$this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
		}
		$this->set('attendings', $this->Event->Query("Select users.username, events.event_name, events.event_date
														from users 
														join attendings on attendings.user_id = users.id
														join events on events.id = attendings.event_id
														where users.id = ?", array($this->Auth->user('id'))));
														
	} 

}
?>