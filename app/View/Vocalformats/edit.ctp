<div class="vocalformats form">
<?php echo $this->Form->create('Vocalformat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Vocal format'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('vocalformat');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Vocalformat.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Vocalformat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vocal formats'), array('action' => 'index')); ?></li>
	</ul>
</div>
