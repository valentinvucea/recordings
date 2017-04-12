<div class="comprecordingnotes view">
<h2><?php  echo __('Composition recording note'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($comprecordingnote['Comprecordingnote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($comprecordingnote['Comprecordingnote']['note']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Comp. recording note'), array('action' => 'edit', $comprecordingnote['Comprecordingnote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Comp. recording note'), array('action' => 'delete', $comprecordingnote['Comprecordingnote']['id']), null, __('Are you sure you want to delete # %s?', $comprecordingnote['Comprecordingnote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Comp. recording note'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Comp. recording note'), array('action' => 'add')); ?> </li>
	</ul>
</div>
