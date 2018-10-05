<div class="comprecordingnotes index">
	<h2><?php echo __('Composition recording notes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($comprecordingnotes as $comprecordingnote): ?>
	<tr>
		<td><?php echo h($comprecordingnote['Comprecordingnote']['id']); ?>&nbsp;</td>
		<td><?php echo h($comprecordingnote['Comprecordingnote']['note']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $comprecordingnote['Comprecordingnote']['id'])); ?>
			<?php
                if (true === $isAdmin) {
                    echo $this->Html->link(__('Edit'), array('action' => 'edit', $comprecordingnote['Comprecordingnote']['id']));
                    echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $comprecordingnote['Comprecordingnote']['id']), null, __('Are you sure you want to delete # %s?', $comprecordingnote['Comprecordingnote']['id']));
                }
			?>
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
    <?php
        if (true === $isAdmin) {
    ?>
        <li><?php echo $this->Html->link(__('Add Comp. Recording Note'), array('action' => 'add')); ?></li>
    <?php
        }
    ?>
	</ul>
</div>
