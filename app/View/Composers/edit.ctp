<div class="composers form">
<?php echo $this->Form->create('Composer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Composer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('alt_name');
		echo $this->Form->input('nationality_id');           
		echo $this->Form->input('notes');
		echo $this->Form->input('dates');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Composer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Composer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Composers'), array('action' => 'index')); ?></li>
	</ul>
</div>
