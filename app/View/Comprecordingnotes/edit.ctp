<div class="comprecordingnotes form">
<?php echo $this->Form->create('Comprecordingnote'); ?>
	<fieldset>
		<legend><?php echo __('Edit Composition recording note'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('note', array('label' => 'Rec. Standard Note'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Comprecordingnote.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Comprecordingnote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Comp. recording notes'), array('action' => 'index')); ?></li>
	</ul>
</div>
