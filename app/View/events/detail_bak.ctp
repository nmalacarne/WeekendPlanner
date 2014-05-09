<h2><?php echo $details['Event']['event_name']; ?> </h2> 
<div class="form">
<?php echo $this->Form->create('Attending');?>
<fieldset>
	<legend><?php echo __(''); ?></legend>
	<?php if($isAttending > 0): ?>
	<?php echo $this->Form->hidden('formsent', array('value' => 'notAttending')) ?>
	</fieldset>
	<?php echo $this->Form->end(__('Click to Unattend')); ?>
	<?php else: ?>
	<?php echo $this->Form->hidden('formsent', array('value' => 'attending')) ?>
	</fieldset>
	<?php echo $this->Form->end(__('Click to Attend')); ?>
	<?php endif; ?>
</div>
<h3>Begins <?php echo date('m-d-Y',strtotime($details['Event']['event_date']));?> </h3>
	<?php $days = array("Friday", "Saturday", "Sunday", "Monday");?>
	
    <div class="tabbable"> <!-- Only required for left/right tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#admin" data-toggle="tab">Admin</a></li>
			<?php for($i = 1; $i <= (int)$details['Event']['num_days'];$i++): ?>
			<li><a href="#<?php echo $days[$i - 1];?>" data-toggle="tab"><?php echo $days[$i - 1];?></a></li>
			<?php endfor; ?>
			<li><a href="#album" data-toggle="tab">Album</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="admin">
				<div class="row">
					<div class="span6">
						<div class="well">
							<h2>Attending</h2>
							<table class="table">
								<?php for($i=0; $i<sizeof($allAttending); $i++):?>
								<tr>
									
									<td><?php echo $allAttending[$i]['users']['username']; ?> </td>
								</tr>
								<?php endfor;?>
									
							</table>
						</div>
						<div class="well">
							<h2>General Items</h2>
								<?php echo $this->Form->create('Item'); ?>										
										<?php echo $this->Form->input(" ", array('name'=>'data[Item][ItemName]','div'=>false, 'style'=>'width:150px;'));?>
										<?php echo $this->Js->submit('Add', array(
											'div'=>false, 
											'style'=>array('height:30px;', 
											'margin-top:-10px;', 
											'padding-top:0px;'),
											'update'=>'#items'
											));?>
											
								<?php echo $this->Form->end();?>
								<div id="items">
								<table class="table">
									<?php for($p = 0; $p < sizeof($items); $p++): ?>
										<tr>
											<td><?php echo $items[$p]['items']['name']; ?> </td>
											<td><?php echo $items[$p]['users']['username']; ?></td>
										</tr>
									<?php endfor;?>
									
								</table>
								</div>
						</div>
						<div class="well">
							<h2>Alcohol</h2>
						</div>
					</div>
				</div>
				
			</div>
			<?php for($i = 1; $i <= (int)$details['Event']['num_days']; $i++): ?>
			<div class="tab-pane" id="<?php echo $days[$i - 1]; ?>">
				<div class="row">
					<div class="span10">
						<div class="well">
						<div class="row">
							<div class="span4">
							<h2>Meals</h2>
								
									<?php echo $this->Form->create('Meal'); 
										  echo $this->Form->hidden('formsent', array('value' => 'meal'))?>
										<fieldset>
											<legend><?php echo __('Create New Meal'); ?></legend>
											<?php echo $this->Form->input('category', array(
												'options' => array('breakfast' => 'Breakfast', 'lunch' => 'Lunch', 'dinner' => 'Dinner', 'other' => 'Other')
											));?>
										<input type="hidden" name="data[Meal][day]" value="<?php echo $days[$i - 1]; ?>">
										
										<?php echo $this->Form->input('Eat in/out', array(
												'options' => array(1 => 'Eat In', 0 => 'Eat Out')
										));?>
										</fieldset>
									<?php echo $this->Form->end(__('Create')); ?>
								
							</div>
							<div class="span4">
							<div id='<?php echo $days[$i - 1] . "breakfast" ?>' >
							<h3>Breakfast</h3>
							<ul>
							<?php for($p = 0; $p < sizeof($meals); $p++): ?>
								<?php if($meals[$p]['Meal']['day'] == $days[$i - 1] && $meals[$p]['Meal']['category'] === 'breakfast'): ?>
									<?php if($meals[$p]['Meal']['eat_in'] == 1){
											$mealText = 'Eat in';
									      }else{
											$mealText = 'Eat out';
									      }
									?>
									<li><?php echo $meals[$p]['Meal']['category'] . ": " . $mealText ?></li>
								<?php endif; ?>
							<?php endfor; ?>
							</ul>
							</div>
							<h3>Lunch</h3>
							
							<ul>
							<?php for($p = 0; $p < sizeof($meals); $p++): ?>
								<?php if($meals[$p]['Meal']['day'] == $days[$i - 1] && $meals[$p]['Meal']['category'] === 'lunch'): ?>
									<?php if($meals[$p]['Meal']['eat_in'] == 1){
											$mealText = 'Eat in';
									      }else{
											$mealText = 'Eat out';
									      }
									?>
									<li><?php echo $meals[$p]['Meal']['category'] . ": " . $mealText ?></li>
								<?php endif; ?>
							<?php endfor; ?>
							</ul>
							
							<h3>Dinner</h3>
							</div>
							</div>
						</div>
						<div class="well">
							<h2>Activities</h2>
							<div class="form">
								<?php echo $this->Form->create('Activity'); 
									  echo $this->Form->hidden('formsent', array('value' => 'activity'));?>
								
									<fieldset>
										<legend><?php echo __('Create New Activity'); ?></legend>
										<?php echo $this->Form->input('Activity Name');
										
									?>
									<textarea name="data[Activity][description]"></textarea>
									<input type="hidden" name="data[Activity][day]" value="<?php echo $days[$i - 1]; ?>">
									</fieldset>
								<?php echo $this->Form->end(__('Create')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endfor; ?>
		<div class="tab-pane" id="album">
		
			<p>Photo album</p>
			<p><?php $hashtag = preg_replace('/\s+/', '', $details['Event']['event_name']);
					  echo "#" . $hashtag;?></p>
					  
			<?php
		// Supply a user id and an access token
		$userid = "86673380a2e14925b452d8492737fc5e";
		$accessToken = "392294531.8667338.af08eee89f154eb0b8b5e876ecc94485";
		
		

		// Gets our data
		function fetchData($url){
			 
		     $ch = curl_init($url);
		     curl_setopt($ch, CURLOPT_URL, $url);
		     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		     curl_setopt($ch, CURLOPT_TIMEOUT, 20);
			 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		     $result = curl_exec($ch);
			 if(curl_errno($ch)){
				echo 'Curl error: ' . curl_error($ch);
			}
		     curl_close($ch); 
		     return $result;
			 
		}

		// Pulls and parses data.
		$result = fetchData("https://api.instagram.com/v1/tags/{$hashtag}/media/recent?access_token={$accessToken}");
		
		$result = json_decode($result);
		
		
		foreach ($result->data as $post): ?>
		
		<!-- Renders images. @Options (thumbnail,low_resoulution, high_resolution) -->
		<a class="group" rel="group1" href="<?php echo $post->images->standard_resolution->url ?>"><img src="<?php echo $post->images->thumbnail->url ?>"></a>
		<?php endforeach ?>
		</div>
    </div>
    </div>