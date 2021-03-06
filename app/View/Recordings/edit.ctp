<div class="recordings form flat">
<?php echo $this->Form->create('Recording'); ?>
	<fieldset>
		<legend><?php echo __('Edit Recording #' . $this->Form->value('Recording.id')); ?></legend>
		<?php
		echo $this->Form->input('id');
		echo $this->Form->input('no', array('label' => 'Recording no.', 'type' => 'text'));
		echo $this->Form->input('name');
		echo $this->Form->input('format_id');
        echo $this->Form->input('company_id');
		echo $this->Form->input('catalog', array('label' => 'Catalog no.'));
		echo $this->Form->input('comprecordingnote_id', array('label' => 'Recording note'));
		echo $this->Form->input('ancillarymusic_id', array('label' => 'Ancillary music'));
		echo $this->Form->input('presentation_id');
		echo $this->Form->input('recordingdate', array('label' => 'Recording date'));
        echo $this->Form->input('notes');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Recording.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Recording.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recordings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Formats'), array('controller' => 'formats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Format'), array('controller' => 'formats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recording Notes'), array('controller' => 'comprecordingnotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Recording Note'), array('controller' => 'comprecordingnotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ancillary Musics'), array('controller' => 'ancillarymusics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Ancillary Music'), array('controller' => 'ancillarymusics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Presentations'), array('controller' => 'presentations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Presentation'), array('controller' => 'presentations', 'action' => 'add')); ?> </li>
	</ul>
</div>
