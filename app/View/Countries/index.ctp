<div class="countries index">
	<h2><?php echo __('Countries'); ?></h2>

    <?php echo $this->element('goto', array("prefix" => "Countries")); ?>

	<table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('country'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($countries as $country): ?>
        <tr>
            <td><?php echo h($country['Country']['id']); ?>&nbsp;</td>
            <td><?php echo h($country['Country']['country']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $country['Country']['id'])); ?>
                <?php
                    if (true === $isAdmin) {
                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $country['Country']['id']));
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $country['Country']['id']), null, __('Are you sure you want to delete # %s?', $country['Country']['id']));
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
	?>
    </p>
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
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Country'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add State'), array('controller' => 'states', 'action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')), true);
        ?>
	</ul>
</div>

<?php echo $this->Html->script('/js/paging-functions');
