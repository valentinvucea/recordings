<div class="positions view">
<h2><?php  echo __('Position'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($position['Position']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($position['Position']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Position'), array('action' => 'edit', $position['Position']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Position'), array('action' => 'delete', $position['Position']['id']), null, __('Are you sure you want to delete # %s?', $position['Position']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directors'), array('controller' => 'directors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
	</ul>
</div>
