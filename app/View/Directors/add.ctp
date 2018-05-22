<div class="directors form">
<?php echo $this->Form->create('Director'); ?>
	<fieldset>
		<legend><?php echo __('Add Director'); ?></legend>
	<?php
		echo $this->Form->input('name', array('class' => 'focus-field'));
		echo $this->Form->input('alt_name', array('label' => 'Alt. name'));
		echo $this->Form->input('position_id');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Directors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
	</ul>
</div>
