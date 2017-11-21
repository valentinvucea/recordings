<div class="versions view">
<h2><?php  echo __('Version'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($version['Version']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version'); ?></dt>
		<dd>
			<?php echo h($version['Version']['version']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Version'), array('action' => 'edit', $version['Version']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Version'), array('action' => 'delete', $version['Version']['id']), null, __('Are you sure you want to delete # %s?', $version['Version']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Versions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Version'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Composition'), array('controller' => 'compositions', 'action' => 'add')); ?> </li>
	</ul>
</div>
