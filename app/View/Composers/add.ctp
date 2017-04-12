<div class="composers form">
<?php echo $this->Form->create('Composer'); ?>
	<fieldset>
		<legend><?php echo __('Add Composer'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Composers'), array('action' => 'index')); ?></li>
	</ul>
</div>
