<div class="composers view">
<h2><?php  echo __('Composer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($composer['Composer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($composer['Composer']['name']); ?>
			&nbsp;
		</dd>
		<dt>Alt. name</dt>
		<dd>
			<?php echo h($composer['Composer']['alt_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($composer['Nationality']['nationality']); ?>
			&nbsp;
		</dd>        
		<dt><?php echo __('Dates'); ?></dt>
		<dd>
			<?php echo h($composer['Composer']['dates']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($composer['Composer']['notes']); ?>
			&nbsp;
		</dd>		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
    <?php
		$this->Authorize->echoIfAdmin($this->Html->link(__('Edit Composer'), array('action' => 'edit', $composer['Composer']['id'])), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Composer'), array('action' => 'delete', $composer['Composer']['id']), null, __('Are you sure you want to delete # %s?', $composer['Composer']['id'])), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Html->link(__('List Composers'), array('action' => 'index')), true);
		$this->Authorize->echoIfAdmin($this->Html->link(__('Add Composer'), array('action' => 'add')), $isAdmin);
    ?>
	</ul>
</div>
