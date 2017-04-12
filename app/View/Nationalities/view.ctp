<div class="nationalities view">
<h2><?php  echo __('Nationality'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['nationality']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nationality'), array('action' => 'edit', $nationality['Nationality']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nationality'), array('action' => 'delete', $nationality['Nationality']['id']), null, __('Are you sure you want to delete # %s?', $nationality['Nationality']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Nationalities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nationality'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'composers', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Composers'); ?></h3>
	<?php if (!empty($nationality['Director'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Alt Name'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th><?php echo __('Nationality Id'); ?></th>
		<th><?php echo __('Dates'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($nationality['Director'] as $director): ?>
		<tr>
			<td><?php echo $director['id']; ?></td>
			<td><?php echo $director['name']; ?></td>
			<td><?php echo $director['alt_name']; ?></td>
			<td><?php echo $director['notes']; ?></td>
			<td><?php echo $director['nationality_id']; ?></td>
			<td><?php echo $director['dates']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'composers', 'action' => 'view', $director['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'composers', 'action' => 'edit', $director['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'composers', 'action' => 'delete', $director['id']), null, __('Are you sure you want to delete # %s?', $director['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
