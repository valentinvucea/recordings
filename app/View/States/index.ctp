<div class="states index">
	<h2><?php echo __('States'); ?></h2>

    <?php echo $this->element('goto', array("prefix" => "States")); ?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('country_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($states as $state): ?>
	<tr>
		<td><?php echo h($state['State']['id']); ?>&nbsp;</td>
		<td><?php echo h($state['State']['state']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($state['Country']['country'], array('controller' => 'countries', 'action' => 'view', $state['Country']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $state['State']['id'])); ?>
			<?php
                if (true === $isAdmin) {
                    echo $this->Html->link(__('Edit'), array('action' => 'edit', $state['State']['id']));
                    echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $state['State']['id']), null, __('Are you sure you want to delete # %s?', $state['State']['id']));
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
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add State'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Country'), array('controller' => 'countries', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>

<?php echo $this->Html->script('/js/paging-functions');
