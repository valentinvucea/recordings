<div class="denominations form">
<?php echo $this->Form->create('Denomination'); ?>
	<fieldset>
		<legend><?php echo __('Add Denomination'); ?></legend>
	<?php
		echo $this->Form->input('denomination');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Denominations'), array('action' => 'index')); ?></li>
	</ul>
</div>
