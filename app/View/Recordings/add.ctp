<div class="recordings form flat">
<?php echo $this->Form->create('Recording'); ?>
	<fieldset>
		<legend><?php echo __('Add Recording'); ?></legend>
	<?php
		echo $this->Form->input('no', array('label' => 'Rec. no'));
		echo $this->Form->input('name', array('class' => 'focus-field'));
		echo $this->Form->input('format_id', array('class' => 'tall'));
		echo $this->Form->input('company_id', array('class' => 'tall', 'value' => 7));
		echo $this->Form->input('catalog');
		echo $this->Form->input('comprecordingnote_id', array('label' => 'Recording note', 'class' => 'tall', 'value' => 8));
		echo $this->Form->input('ancillarymusic_id', array('label' => 'Ancillary music', 'class' => 'tall', 'value' => 18));
		echo $this->Form->input('presentation_id', array('class' => 'tall', 'value' => 27));
		echo $this->Form->input('recordingdate', array('label' => 'Recording date'));
		echo $this->Form->input('notes');		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Recordings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Formats'), array('controller' => 'formats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Format'), array('controller' => 'formats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recording Notes'), array('controller' => 'comprecordingnotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording Note'), array('controller' => 'comprecordingnotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ancillary Musics'), array('controller' => 'ancillarymusics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ancillary Music'), array('controller' => 'ancillarymusics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Presentations'), array('controller' => 'presentations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Presentation'), array('controller' => 'presentations', 'action' => 'add')); ?> </li>
	</ul>
</div>
