<?php

class AttendingsController extends AppController{
	
	var $name = 'Attendings';
	
	public function getCount(){			
		if(!$this->Auth->user()){
			$this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'login')));
		}
		$rows = $this->Attending->find('count', array(
			'conditions' => array('Attending.user_id' => $this->Auth->user('id'))));
		echo 'Count ' . $rows;
		
														
	} 

}
?>