<div class="choirs form">
<?php echo $this->Form->create('Choir'); ?>
	<fieldset>
		<legend><?php echo __('Add Choir'); ?></legend>
	<?php
		echo $this->Form->input('choir', array('class' => 'focus-field'));
		echo $this->Form->input('alt_name');
		echo $this->Form->input('city', array('value' => ''));
		echo $this->Form->input('state_id', array('class' => 'tall', 'value' => 'XX'));
		echo $this->Form->input('country_id', array('class' => 'tall', 'value' => 223));
		echo $this->Form->input('denomination_id', array('class' => 'tall', 'value' => 1));
		echo $this->Form->input('vocalformat_id', array('class' => 'tall', 'value' => 7));
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Choirs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Denominations'), array('controller' => 'denominations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Denomination'), array('controller' => 'denominations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vocalformats'), array('controller' => 'vocalformats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vocalformat'), array('controller' => 'vocalformats', 'action' => 'add')); ?> </li>
	</ul>
</div>
