<?php

class Meal extends AppModel{
	
	var $name = 'Meal';
	var $belongsTo = array('User' => array('classname' => 'User',
										'foreignKey' => 'created_by'),
							'Event' => array('classname' => 'Event',
										'foreignKey' => 'event_id')
	
	
	);
	
	

}

?>