<div class="songs form flat">
	<?php echo $this->Form->create('Singer'); ?>
	<fieldset>
		<legend><?php echo 'Edit Choir-Director #' . $singers['id']; ?></legend>
		<?php

		// Hidden ID
		echo $this->Form->input('id', array('type' => 'hidden', 'value' => $singers['id']));		
			
		/* Choir */
		echo '<div class="input text"><label for="Choir">Choir</label></div>';
		// Hidden
		echo $this->Form->input(
			'choir_id', 
			array(
				'type' => 'hidden', 
				'value' => (isset($singers['choir_id']) ? $singers['choir_id'] : '')
			));
		// Display
		echo $this->Form->input(
			'x_choir_id', 
			array(
					'type' => 'text', 
					'readonly' => 'readonly', 
					'label' => false, 
					'value' => (isset($singers['Choir.choir']) ? $singers['Choir.choir'] : '')
			));
		// Link to Choirs
		echo $this->Html->link((isset($singers['choir_id']) ? 'Change Choir' : 'Add Choir'), '/Choirs/select' . (isset($singers['choir_id']) ? '/' . $singers['choir_id'] : ''), array('class' => 'jump first'));

		echo '<br/><br /><br />';

		/* Director */
		echo '<div class="input text"><label for="Director">Director</label></div>';
		// Hidden
		echo $this->Form->input(
			'director_id', 
			array(
				'type' => 'hidden', 
				'value' => (isset($singers['director_id']) ? $singers['director_id'] : '')
			));
		// Display
		echo $this->Form->input(
			'x_director_id', 
			array(
				'type' => 'text', 
				'readonly' => 'readonly', 
				'label' => false, 
				'value' => (isset($singers['Director.name']) ? $singers['Director.name'] : '')
			));
		// Link to Directors
		echo $this->Html->link((isset($singers['director_id']) ? 'Change Director' : 'Add Director'), '/Directors/select' . (isset($singers['director_id']) ? '/' . $singers['director_id'] : ''), array('class' => 'jump first'));
		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete this pair'), array('action' => 'delete', $this->Form->value('Singer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Singer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List all pairs'), array('action' => 'index')); ?></li>
		<li><hr/></li>
		<li><?php echo $this->Html->link(__('List Choirs'), array('controller' => 'choirs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choir'), array('controller' => 'choirs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directors'), array('controller' => 'directors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
	</ul>
</div>
