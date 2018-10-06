<div class="nationalities index">
	<h2><?php echo __('Nationalities'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nationality'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($nationalities as $nationality): ?>
	<tr>
		<td><?php echo h($nationality['Nationality']['id']); ?>&nbsp;</td>
		<td><?php echo h($nationality['Nationality']['nationality']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $nationality['Nationality']['id'])); ?>
			<?php
                if (true === $isAdmin) {
                    echo $this->Html->link(__('Edit'), array('action' => 'edit', $nationality['Nationality']['id']));
                    echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $nationality['Nationality']['id']), null, __('Are you sure you want to delete # %s?', $nationality['Nationality']['id']));
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
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Nationality'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Director'), array('controller' => 'composers', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
