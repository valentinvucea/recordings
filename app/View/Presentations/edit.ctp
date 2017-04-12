<div class="presentations form">
<?php echo $this->Form->create('Presentation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Presentation'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('presentation');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Presentation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Presentation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Presentations'), array('action' => 'index')); ?></li>
	</ul>
</div>
