<div class="records form">
<?php echo $this->Form->create('Record'); ?>
	<fieldset>
		<legend><?php echo __('Edit Record'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('recording_id');
		echo $this->Form->input('composition_id');
		echo $this->Form->input('composer_id');
		echo $this->Form->input('choir_id');
		echo $this->Form->input('director_id');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Record.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Record.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Records'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Recordings'), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording'), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composition'), array('controller' => 'compositions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composer'), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Choirs'), array('controller' => 'choirs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choir'), array('controller' => 'choirs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directors'), array('controller' => 'directors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
	</ul>
</div>
