<div class="recordings index">
	<h2><?php echo __('Recordings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('no'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('format_id'); ?></th>
			<th><?php echo $this->Paginator->sort('company_id'); ?></th>
			<th><?php echo $this->Paginator->sort('catalog'); ?></th>
			<th><?php echo $this->Paginator->sort('recordingnote_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ancillarymusic_id'); ?></th>
			<th><?php echo $this->Paginator->sort('presentation_id'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('recordingdate'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($recordings as $recording): ?>
	<tr>
		<td><?php echo h($recording['Recording']['id']); ?>&nbsp;</td>
		<td><?php echo h($recording['Recording']['no']); ?>&nbsp;</td>
		<td><?php echo h($recording['Recording']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recording['Format']['format'], array('controller' => 'formats', 'action' => 'view', $recording['Format']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($recording['Company']['company'], array('controller' => 'companies', 'action' => 'view', $recording['Company']['id'])); ?>
		</td>
		<td><?php echo h($recording['Recording']['catalog']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recording['Recordingnote']['recording_note'], array('controller' => 'recordingnotes', 'action' => 'view', $recording['Recordingnote']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($recording['Ancillarymusic']['name'], array('controller' => 'ancillarymusics', 'action' => 'view', $recording['Ancillarymusic']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($recording['Presentation']['presentation'], array('controller' => 'presentations', 'action' => 'view', $recording['Presentation']['id'])); ?>
		</td>
		<td><?php echo h($recording['Recording']['notes']); ?>&nbsp;</td>
		<td><?php echo h($recording['Recording']['recordingdate']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recording['Recording']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recording['Recording']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recording['Recording']['id']), null, __('Are you sure you want to delete # %s?', $recording['Recording']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Recording'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Formats'), array('controller' => 'formats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Format'), array('controller' => 'formats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recordingnotes'), array('controller' => 'recordingnotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recordingnote'), array('controller' => 'recordingnotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ancillarymusics'), array('controller' => 'ancillarymusics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ancillarymusic'), array('controller' => 'ancillarymusics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Presentations'), array('controller' => 'presentations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Presentation'), array('controller' => 'presentations', 'action' => 'add')); ?> </li>
	</ul>
</div>
