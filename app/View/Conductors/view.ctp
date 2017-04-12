<div class="conductors view">
<h2><?php  echo __('Conductor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($conductor['Conductor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($conductor['Conductor']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($conductor['Conductor']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alt First Name'); ?></dt>
		<dd>
			<?php echo h($conductor['Conductor']['alt_first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alt Last Name'); ?></dt>
		<dd>
			<?php echo h($conductor['Conductor']['alt_last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($conductor['Conductor']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Conductor'), array('action' => 'edit', $conductor['Conductor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Conductor'), array('action' => 'delete', $conductor['Conductor']['id']), null, __('Are you sure you want to delete # %s?', $conductor['Conductor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Conductors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Conductor'), array('action' => 'add')); ?> </li>
	</ul>
</div>
