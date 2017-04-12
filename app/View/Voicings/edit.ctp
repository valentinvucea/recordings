<div class="voicings form">
<?php echo $this->Form->create('Voicing'); ?>
	<fieldset>
		<legend><?php echo __('Edit Voicing'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('voicing');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Voicing.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Voicing.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Voicings'), array('action' => 'index')); ?></li>
	</ul>
</div>
