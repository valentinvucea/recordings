<div class="compositions form">
<?php echo $this->Form->create('Composition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Composition'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('opening_text');
		echo $this->Form->input('genre_id', array('class' => 'tall'));
		echo $this->Form->input('version_id', array('class' => 'tall'));
		echo $this->Form->input('key_name', array('label' => 'Key/Name'));
		echo $this->Form->input('recordingnote_id', array('class' => 'tall', 'label' => 'Recording Note'));
		echo $this->Form->input('voicing_id', array('class' => 'tall'));
		echo $this->Form->input('collection_title');
		echo $this->Form->input('ancillary_music', array('label' => 'Additional text'));
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Composition.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Composition.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Compositions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Genres'), array('controller' => 'genres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Genre'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Versions'), array('controller' => 'versions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Version'), array('controller' => 'versions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recording Notes'), array('controller' => 'recordingnotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording Note'), array('controller' => 'recordingnotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Voicings'), array('controller' => 'voicings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voicing'), array('controller' => 'voicings', 'action' => 'add')); ?> </li>
	</ul>
</div>
