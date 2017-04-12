<div class="recordingnotes form">
<?php echo $this->Form->create('Recordingnote'); ?>
	<fieldset>
		<legend><?php echo __('Add Recordings note'); ?></legend>
	<?php
		echo $this->Form->input('recording_note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Recordings notes'), array('action' => 'index')); ?></li>
	</ul>
</div>
