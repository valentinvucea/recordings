<div class="directors view">
<h2><?php  echo __('Director'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($director['Director']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($director['Director']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alt Name'); ?></dt>
		<dd>
			<?php echo h($director['Director']['alt_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo $this->Html->link($director['Position']['id'], array('controller' => 'positions', 'action' => 'view', $director['Position']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($director['Director']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Director'), array('action' => 'edit', $director['Director']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Director'), array('action' => 'delete', $director['Director']['id']), null, __('Are you sure you want to delete # %s?', $director['Director']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Directors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
	</ul>
</div>
