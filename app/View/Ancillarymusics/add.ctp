<div class="ancillarymusics form">
<?php echo $this->Form->create('Ancillarymusic'); ?>
	<fieldset>
		<legend><?php echo __('Add Ancillary music'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ancillary music'), array('action' => 'index')); ?></li>
	</ul>
</div>
