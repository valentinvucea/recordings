<div class="versions index">
	<h2><?php echo __('Versions'); ?></h2>

    <?php echo $this->element('goto', array("prefix" => "Versions")); ?>

	<table cellpadding="0" cellspacing="0">
        <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('version'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($versions as $version): ?>
        <tr>
            <td><?php echo h($version['Version']['id']); ?>&nbsp;</td>
            <td><?php echo h($version['Version']['version']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $version['Version']['id'])); ?>
                <?php
                    if (true === $isAdmin) {
                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $version['Version']['id']));
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $version['Version']['id']), null, __('Are you sure you want to delete # %s?', $version['Version']['id']));
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
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Version'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Composition'), array('controller' => 'compositions', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>

<?php echo $this->Html->script('/js/paging-functions');
