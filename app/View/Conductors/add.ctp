<div class="conductors form">
<?php echo $this->Form->create('Conductor'); ?>
	<fieldset>
		<legend><?php echo __('Add Conductor'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('alt_first_name');
		echo $this->Form->input('alt_last_name');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Conductors'), array('action' => 'index')); ?></li>
	</ul>
</div>
