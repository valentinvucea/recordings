<div class="songs index">
	<h2><?php echo __('Songs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('composition_id'); ?></th>
			<th><?php echo $this->Paginator->sort('composer_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($songs as $song): ?>
	<tr>
		<td><?php echo h($song['Song']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($song['Composition']['title'], array('controller' => 'compositions', 'action' => 'view', $song['Composition']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($song['Composer']['name'], array('controller' => 'composers', 'action' => 'view', $song['Composer']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $song['Song']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $song['Song']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $song['Song']['id']), null, __('Are you sure you want to delete # %s?', $song['Song']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Song'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composition'), array('controller' => 'compositions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composer'), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recsongs'), array('controller' => 'recsongs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recsong'), array('controller' => 'recsongs', 'action' => 'add')); ?> </li>
	</ul>
</div>
