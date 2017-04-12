<div class="denominations view">
<h2><?php  echo __('Denomination'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($denomination['Denomination']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denomination'); ?></dt>
		<dd>
			<?php echo h($denomination['Denomination']['denomination']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Denomination'), array('action' => 'edit', $denomination['Denomination']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Denomination'), array('action' => 'delete', $denomination['Denomination']['id']), null, __('Are you sure you want to delete # %s?', $denomination['Denomination']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Denominations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Denomination'), array('action' => 'add')); ?> </li>
	</ul>
</div>
