<!-- app/View/Events/add.ctp -->
<div class="form">
<?php echo $this->Form->create('Event'); ?>
    <fieldset>
        <legend><?php echo __('Add Event'); ?></legend>
        <?php echo $this->Form->input('Event Name');
        echo $this->Form->input('Start Date');
        echo $this->Form->input('Number of Days');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>