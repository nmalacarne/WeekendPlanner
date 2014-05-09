<table class="table">
<?php for($p = 0; $p < sizeof($meals); $p++): ?>
<?php if($meals[$p]['Meal']['day'] == $mealDay && $meals[$p]['Meal']['category'] === $mealCategory): ?>
    <?php if($meals[$p]['Meal']['eat_in'] == 1){
        $mealText = 'Eat in';
      }else{
        $mealText = 'Eat out';
      }
    ?>
<tr>
    <td><?php echo $meals[$p]['Meal']['category'];?></td>
    <td><?php echo $mealText;?></td>
</tr>
<?php endif; ?>
<?php endfor; ?>
</table>


<table class="table">
<?php for($p = 0; $p < sizeof($activities); $p++): ?>
<?php if($activities[$p]['Activity']['day'] == $activityDay && $activities[$p]['Activity']['category'] === $activityCategory): ?>
<tr>
    <td><?php echo $activities[$p]['Activity']['name'] ?></td>
</tr>

<?php endif; ?>
<?php endfor; ?>
</table>
