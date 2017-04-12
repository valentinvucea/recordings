<div class="compversions view">
<h2><?php  echo __('Compversion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($compversion['Compversion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Compversion'); ?></dt>
		<dd>
			<?php echo h($compversion['Compversion']['compversion']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Compversion'), array('action' => 'edit', $compversion['Compversion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Compversion'), array('action' => 'delete', $compversion['Compversion']['id']), null, __('Are you sure you want to delete # %s?', $compversion['Compversion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Compversions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Compversion'), array('action' => 'add')); ?> </li>
	</ul>
</div>
