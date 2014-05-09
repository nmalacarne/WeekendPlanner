<?php

class Attending extends AppModel{
	
	var $name = 'Attending';
	var $belongsToMany = array('User' => array('classname' => 'User',
										'foreignKey' => 'user_id'),
							'Event' => array('classname' => 'Event',
										'foreignKey' => 'event_id')
	
	
	);
	
	

}

?>