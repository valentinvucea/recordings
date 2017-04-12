<div class="choirs index">
	<h2><?php echo __('Choirs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('choir'); ?></th>
			<th><?php echo $this->Paginator->sort('alt_name'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state_id'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th><?php echo $this->Paginator->sort('denomination_id'); ?></th>
			<th><?php echo $this->Paginator->sort('vocalformat_id'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($choirs as $choir): ?>
	<tr>
		<td><?php echo h($choir['Choir']['id']); ?>&nbsp;</td>
		<td><?php echo h($choir['Choir']['choir']); ?>&nbsp;</td>
		<td><?php echo h($choir['Choir']['alt_name']); ?>&nbsp;</td>
		<td><?php echo h($choir['Choir']['city']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($choir['State']['id'], array('controller' => 'states', 'action' => 'view', $choir['State']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($choir['Country']['Country'], array('controller' => 'countries', 'action' => 'view', $choir['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($choir['Denomination']['id'], array('controller' => 'denominations', 'action' => 'view', $choir['Denomination']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($choir['Vocalformat']['id'], array('controller' => 'vocalformats', 'action' => 'view', $choir['Vocalformat']['id'])); ?>
		</td>
		<td><?php echo h($choir['Choir']['notes']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $choir['Choir']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $choir['Choir']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $choir['Choir']['id']), null, __('Are you sure you want to delete # %s?', $choir['Choir']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Choir'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Denominations'), array('controller' => 'denominations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Denomination'), array('controller' => 'denominations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vocalformats'), array('controller' => 'vocalformats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vocalformat'), array('controller' => 'vocalformats', 'action' => 'add')); ?> </li>
	</ul>
</div>
