	
	<div class="form">
	<?php echo $this->Form->create('Event'); ?>
		<fieldset>
			<legend><?php echo __('Create Event'); ?></legend>
			<?php echo $this->Form->input('Event Name'); ?>
			<div class="input-append date" id="startDate" data-date="07-01-2013" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
			<label for="StartDate">Start Date</label>
				<input name="data[Event][Start Date]" readonly = "" size="16" type="text"  value="12-02-2012">
				<span class="add-on"><i class="icon-calendar"></i></span>
			 </div>
			 <div class="input-append date" id="endDate" data-date="07-01-2013" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
			<label for="EndDate">End Date</label>
				<input name="data[Event][End Date]" readonly = "" size="16" type="text"  value="12-02-2012">
				<span class="add-on"><i class="icon-calendar"></i></span>
			 </div>
		</fieldset>
	<?php echo $this->Form->end(__('Create New Event')); ?>
	</div>
	<br>
	<h2>Upcoming events</h2>
	
		<div class="row">
		<div class="span6">
		<?php if($rowCount > 0): ?>
			<table class="table table-hover">
			<?php foreach($attendings as $attending): ?>
				<tr>
				
				<td><a href="http://localhost/planner/events/detail/<?php echo $attending['events']['event_name']?>"><?php echo $attending['events']['event_name']?></a> </td>
				<td><?php echo $attending['events']['start_date'];?> </td>	
				</tr>
			<?php endforeach; ?>
			</table>
		<?php else: ?>
		<p>You need to create some events</p>
		<?php endif; ?>
		</div>
	</div>
	
	
	
	
