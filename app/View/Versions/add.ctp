<div class="versions form">
<?php echo $this->Form->create('Version'); ?>
	<fieldset>
		<legend><?php echo __('Add Version'); ?></legend>
	<?php
		echo $this->Form->input('version');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Versions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composition'), array('controller' => 'compositions', 'action' => 'add')); ?> </li>
	</ul>
</div>
