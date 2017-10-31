<div class="recordingnotes form">
<?php echo $this->Form->create('Recordingnote'); ?>
	<fieldset>
		<legend><?php echo __('Edit Recordings note'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('recording_note');
        echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Recordingnote.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Recordingnote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recordings notes'), array('action' => 'index')); ?></li>
	</ul>
</div>
