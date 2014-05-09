
									
<table class="table">
	<?php for($p = 0; $p < sizeof($items); $p++): ?>
		<tr>
			<td><?php echo $items[$p]['Item']['name']; ?> </td>
			<td><?php echo $items[$p]['User']['username']; ?></td>
		</tr>
	<?php endfor;?>
	
</table>