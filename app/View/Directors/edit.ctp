<div class="directors form">
<?php echo $this->Form->create('Director'); ?>
	<fieldset>
		<legend><?php echo __('Edit Director'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('alt_name');
		echo $this->Form->input('position_id');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Director.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Director.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Directors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
	</ul>
</div>
