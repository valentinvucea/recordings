<div class="records index">
	<h2><?php echo __('Records'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('recording_id'); ?></th>
			<th><?php echo $this->Paginator->sort('composition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('composer_id'); ?></th>
			<th><?php echo $this->Paginator->sort('choir_id'); ?></th>
			<th><?php echo $this->Paginator->sort('director_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($records as $record): ?>
	<tr>
		<td><?php echo h($record['Record']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($record['Recording']['name'], array('controller' => 'recordings', 'action' => 'view', $record['Recording']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($record['Composition']['title'], array('controller' => 'compositions', 'action' => 'view', $record['Composition']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($record['Composer']['name'], array('controller' => 'composers', 'action' => 'view', $record['Composer']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($record['Choir']['choir'], array('controller' => 'choirs', 'action' => 'view', $record['Choir']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($record['Director']['name'], array('controller' => 'directors', 'action' => 'view', $record['Director']['id'])); ?>
		</td>
		<td><?php echo h($record['Record']['order']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $record['Record']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $record['Record']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $record['Record']['id']), null, __('Are you sure you want to delete # %s?', $record['Record']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Record'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recordings'), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording'), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composition'), array('controller' => 'compositions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composer'), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Choirs'), array('controller' => 'choirs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choir'), array('controller' => 'choirs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directors'), array('controller' => 'directors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
	</ul>
</div>
