<div class="songs form flat">
	<?php echo $this->Form->create('Song'); ?>
	<fieldset>
		<legend><?php echo __('Add Composer-Composition'); ?></legend>
		<?php

		/* COMPOSER */
		echo '<div class="input text"><label for="Composer">Composer</label></div>';
		// Hidden
		echo $this->Form->input(
			'composer_id', 
			array(
				'type' => 'hidden', 
				'value' => (isset($songs['composer_id']) ? $songs['composer_id'] : '')
			));
		// Display
		echo $this->Form->input(
			'x_composer_id', 
			array(
				'type' => 'text', 
				'readonly' => 'readonly', 
				'label' => false, 
				'value' => (isset($songs['Composer.name']) ? $songs['Composer.name'] : '')
			));
		// Change/add link
		echo $this->Html->link((isset($songs['composer_id']) ? 'Change composer' : 'Add composer'), '/Composers/select' . (isset($songs['composer_id']) ? '/' . $songs['composer_id'] : ''), array('class' => 'jump first'));
				
		echo '<br/><br />';		

		/* COMPOSITION */
		echo '<div class="input text"><label for="Composition">Composition</label></div>';
		// Hidden
		echo $this->Form->input(
			'composition_id', 
			array(
				'type' => 'hidden', 
				'value' => (isset($songs['composition_id']) ? $songs['composition_id'] : '')
			));
		// Display
		echo $this->Form->input(
			'x_composition_id', 
			array(
					'type' => 'text', 
					'readonly' => 'readonly', 
					'label' => false, 
					'value' => (isset($songs['Composition.title']) ? $songs['Composition.title'] : '')
			));
		// Link to compositions
		echo $this->Html->link((isset($songs['composition_id']) ? 'Change composition' : 'Add composition'), '/Compositions/select' . (isset($songs['composition_id']) ? '/' . $songs['composition_id'] : ''), array('class' => 'jump first'));

		?>
	</fieldset>
	<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Composer-Composition list'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Composition'), array('controller' => 'compositions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Composer'), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Back to Recordings'), array('controller' => 'Recordings', 'action' => 'index')); ?> </li>
	</ul>
</div>
