<?php

class Activity extends AppModel{
	
	var $name = 'Activity';
	var $belongsTo = array('User' => array('classname' => 'User',
										'foreignKey' => 'created_by'),
							'Event' => array('classname' => 'Event',
										'foreignKey' => 'event_id')
	
	
	);
	
	

}

?>