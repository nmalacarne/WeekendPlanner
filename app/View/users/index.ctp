<div class="row">
<div class="span6 offset4">
<table class="table table-hover">
<?php foreach($attendings as $attending): ?>
	<tr>
		<td><?php echo $attending['users']['username'];?> </td>
		<td><?php echo $attending['events']['event_name']; ?> </td>
		<td><?php echo $attending['events']['event_date'];?> </td>	
	</tr>
	<?php endforeach; ?>
</table>
</div>
</div>
	
	
