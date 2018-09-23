<div class="denominations index">
	<h2><?php echo __('Denominations'); ?></h2>

    <?php echo $this->element('goto', array("prefix" => "Denominations")); ?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('denomination'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($denominations as $denomination): ?>
	<tr>
		<td><?php echo h($denomination['Denomination']['id']); ?>&nbsp;</td>
		<td><?php echo h($denomination['Denomination']['denomination']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $denomination['Denomination']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $denomination['Denomination']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $denomination['Denomination']['id']), null, __('Are you sure you want to delete # %s?', $denomination['Denomination']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Add Denomination'), array('action' => 'add')); ?></li>
	</ul>
</div>

<?php echo $this->Html->script('/js/paging-functions');
