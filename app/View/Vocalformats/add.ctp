<div class="vocalformats form">
<?php echo $this->Form->create('Vocalformat'); ?>
	<fieldset>
		<legend><?php echo __('Add Vocal format'); ?></legend>
	<?php
        echo $this->Form->input('vocalformat', array('class' => 'focus-field'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Vocal formats'), array('action' => 'index')); ?></li>
	</ul>
</div>
