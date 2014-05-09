<?php

class Meal_assignment extends AppModel{
	
	var $name = 'Meal_assignment';
	var $belongsTo = array('User' => array('classname' => 'Meal',
										'foreignKey' => 'meal_id'))
	
	
	);
	
	
	
	

}

?>