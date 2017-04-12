<div class="conductors index">
	<h2><?php echo __('Conductors'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('alt_first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('alt_last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($conductors as $conductor): ?>
	<tr>
		<td><?php echo h($conductor['Conductor']['id']); ?>&nbsp;</td>
		<td><?php echo h($conductor['Conductor']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($conductor['Conductor']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($conductor['Conductor']['alt_first_name']); ?>&nbsp;</td>
		<td><?php echo h($conductor['Conductor']['alt_last_name']); ?>&nbsp;</td>
		<td><?php echo h($conductor['Conductor']['notes']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $conductor['Conductor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $conductor['Conductor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $conductor['Conductor']['id']), null, __('Are you sure you want to delete # %s?', $conductor['Conductor']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Conductor'), array('action' => 'add')); ?></li>
	</ul>
</div>
