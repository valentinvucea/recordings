<div class="recordingnotes index">
	<h2><?php echo 'Recordings notes'; ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('recording_note'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($recordingnotes as $recordingnote): ?>
	<tr>
		<td><?php echo h($recordingnote['Recordingnote']['id']); ?>&nbsp;</td>
		<td><?php echo h($recordingnote['Recordingnote']['recording_note']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recordingnote['Recordingnote']['id'])); ?>
			<?php
                if (true === $isAdmin) {
                    echo $this->Html->link(__('Edit'), array('action' => 'edit', $recordingnote['Recordingnote']['id']));
                    echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recordingnote['Recordingnote']['id']), null, __('Are you sure you want to delete # %s?', $recordingnote['Recordingnote']['id']));
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
            $this->Authorize->echoIfAdmin($this->Html->link(__('Add Recordings note'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
