<?php

class Event extends AppModel{
	
	var $name = 'Event';
	var $hasMany = array('Attending');

}

?>