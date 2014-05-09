<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
	  ul
		{
			list-style-type: none;
			padding:0; 
			margin:0;
		}
		li{
			padding:0; 
			margin:0;
		}
    </style>
	<?php
		echo $this->Html->meta('icon');
		
		

		echo $this->Html->css(array('bootstrap', 'bootstrap.min', 'bootstrap-responsive', 'bootstrap-responsive.min', 'datepicker','customcss'));
		echo $this->Html->script(array('bootstrap', 'jquery','bootstrap-datepicker'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Js->writeBuffer(array('cache'=>TRUE));
		//echo $this->fetch('script');
	?>
	<link rel="stylesheet" type="text/css" href="/planner/app/webroot/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="/planner/app/webroot/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/planner/app/webroot/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="/planner/app/webroot/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" type="text/css" href="/planner/app/webroot/css/datepicker.css" />
	<link rel="stylesheet" type="text/css" href="/planner/app/webroot/css/customcss.css" />
	<script type="text/javascript" src="/planner/app/webroot/js/bootstrap.js"></script>
	<script type="text/javascript" src="/planner/app/webroot/js/jquery.js"></script>
	<script type="text/javascript" src="/planner/app/webroot/js/bootstrap-datepicker.js"></script>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top" >
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Planner</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="http://localhost/planner">Home</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
	
	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('sql_dump'); ?>
		
	</div>
		
		
	<script>
		$(function(){
			
			
			$('#startDate').datepicker();
			$('#endDate').datepicker();
				
				
			
							
			
			
		});
		
		
	</script>
	
	<script type="text/javascript">
		$(document).ready(function(){
		$('.dailySchedule').on("click",'#mealButton',function(){
			
			var meal = $(this);
			var form = meal.nextAll('.mealForm').first();
			
			
			if(form.is(':visible')){
				
				form.hide();
			}else{
				form.show();   
			}
			
			
				
			
									   
			});
			
		$('.dailySchedule').on("click",'#activityButton',function(){
			
			var button = $(this);
			var form = button.nextAll('.activityForm').first();
			
			
			if(form.is(':visible')){
				
				form.hide();
			}else{
				form.show();   
			}
			
			
				
			
									   
			});
		
		
		});

	
	</script>
</body>
</html>
