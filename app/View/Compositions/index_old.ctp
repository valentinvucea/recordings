<div class="compositions">
	<h2><?php echo __('Compositions'); ?></h2>
	
	
	
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th class="grid-1-20"><?php echo $this->Paginator->sort('id'); ?></th>
			<th class="grid-1-5"><?php echo $this->Paginator->sort('title'); ?></th>
			<th class="grid-1-5"><?php echo $this->Paginator->sort('opening_text'); ?></th>
			<th><?php echo $this->Paginator->sort('genre_id'); ?></th>
			<th><?php echo $this->Paginator->sort('version_id'); ?></th>
			<th><?php echo $this->Paginator->sort('key_name'); ?></th>
			<!--
			<th><?php echo $this->Paginator->sort('recordingnote_id'); ?></th>
			-->
			<th><?php echo $this->Paginator->sort('voicing_id'); ?></th>
			<th><?php echo $this->Paginator->sort('collection_title'); ?></th>
			<!--
			<th><?php echo $this->Paginator->sort('ancillary_music'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			-->
			<th class="actions grid-1-20"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($compositions as $composition): ?>
	<tr>
		<td class="grid-1-20"><?php echo h($composition['Composition']['id']); ?>&nbsp;</td>
		<td class="grid-1-5"><?php echo h($composition['Composition']['title']); ?>&nbsp;</td>
		<td class="grid-1-5"><?php echo h($composition['Composition']['opening_text']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($composition['Genre']['genre'], array('controller' => 'genres', 'action' => 'view', $composition['Genre']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($composition['Version']['version'], array('controller' => 'versions', 'action' => 'view', $composition['Version']['id'])); ?>
		</td>
		<td class="grid-1-8"><?php echo h($composition['Composition']['key_name']); ?>&nbsp;</td>
		<!--
		<td>
			<?php echo $this->Html->link($composition['Recordingnote']['recording_note'], array('controller' => 'recordingnotes', 'action' => 'view', $composition['Recordingnote']['id'])); ?>
		</td>
		-->
		<td>
			<?php echo $this->Html->link($composition['Voicing']['voicing'], array('controller' => 'voicings', 'action' => 'view', $composition['Voicing']['id'])); ?>
		</td>
		<td class="grid-1-8"><?php echo h($composition['Composition']['collection_title']); ?>&nbsp;</td>
		<!--
		<td><?php echo h($composition['Composition']['ancillary_music']); ?>&nbsp;</td>
		<td><?php echo h($composition['Composition']['notes']); ?>&nbsp;</td>
		-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $composition['Composition']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $composition['Composition']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $composition['Composition']['id']), null, __('Are you sure you want to delete # %s?', $composition['Composition']['id'])); ?>
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
		echo $this->Paginator->first('<< ' . __('first'), array(), null, array('class' => 'first disabled'));
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ' . __('last'), array(), null, array('class' => 'last disabled'));		
	?>
	</div>
</div>

<!--
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Composition'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Genres'), array('controller' => 'genres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Genre'), array('controller' => 'genres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Versions'), array('controller' => 'versions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Version'), array('controller' => 'versions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recordingnotes'), array('controller' => 'recordingnotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recordingnote'), array('controller' => 'recordingnotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Voicings'), array('controller' => 'voicings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Voicing'), array('controller' => 'voicings', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->
