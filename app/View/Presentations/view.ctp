<div class="presentations view">
<h2><?php  echo __('Presentation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($presentation['Presentation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presentation'); ?></dt>
		<dd>
			<?php echo h($presentation['Presentation']['presentation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($presentation['Presentation']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Presentation'), array('action' => 'edit', $presentation['Presentation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Presentation'), array('action' => 'delete', $presentation['Presentation']['id']), null, __('Are you sure you want to delete # %s?', $presentation['Presentation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Presentations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Presentation'), array('action' => 'add')); ?> </li>
	</ul>
</div>
