<?php

class Item extends AppModel{
	
	var $name = 'Item';
	var $belongsTo = array('User' => array('classname' => 'User',
										'foreignKey' => 'user_id'),
							'Event' => array('classname' => 'Event',
										'foreignKey' => 'event_id')
	
	
	);
	
	
	
	

}

?>