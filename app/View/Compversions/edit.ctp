<div class="compversions form">
<?php echo $this->Form->create('Compversion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Compversion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('compversion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Compversion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Compversion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Compversions'), array('action' => 'index')); ?></li>
	</ul>
</div>
