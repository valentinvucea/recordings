<div class="choirs form">
<?php echo $this->Form->create('Choir'); ?>
	<fieldset>
		<legend><?php echo __('Edit Choir'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('choir');
		echo $this->Form->input('alt_name');
		echo $this->Form->input('city');
		echo $this->Form->input('state_id', array('class' => 'tall'));
		echo $this->Form->input('country_id', array('class' => 'tall'));
		echo $this->Form->input('denomination_id', array('class' => 'tall'));
		echo $this->Form->input('vocalformat_id', array('class' => 'tall'));
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Choir.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Choir.id'))); ?></li>
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
