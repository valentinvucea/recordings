<div class="comprecordingnotes form">
<?php echo $this->Form->create('Comprecordingnote'); ?>
	<fieldset>
		<legend><?php echo __('Add Composition recording note'); ?></legend>
	<?php
        echo $this->Form->input('note', array('class' => 'focus-field', 'label' => 'Rec. Standard Note'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Comp. recording notes'), array('action' => 'index')); ?></li>
	</ul>
</div>
