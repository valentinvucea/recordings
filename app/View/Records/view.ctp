<div class="records view">
<h2><?php  echo __('Record'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($record['Record']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recording'); ?></dt>
		<dd>
			<?php echo $this->Html->link($record['Recording']['name'], array('controller' => 'recordings', 'action' => 'view', $record['Recording']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Composition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($record['Composition']['title'], array('controller' => 'compositions', 'action' => 'view', $record['Composition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Composer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($record['Composer']['name'], array('controller' => 'composers', 'action' => 'view', $record['Composer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Choir'); ?></dt>
		<dd>
			<?php echo $this->Html->link($record['Choir']['choir'], array('controller' => 'choirs', 'action' => 'view', $record['Choir']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Director'); ?></dt>
		<dd>
			<?php echo $this->Html->link($record['Director']['name'], array('controller' => 'directors', 'action' => 'view', $record['Director']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($record['Record']['order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Record'), array('action' => 'edit', $record['Record']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Record'), array('action' => 'delete', $record['Record']['id']), null, __('Are you sure you want to delete # %s?', $record['Record']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Records'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Record'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recordings'), array('controller' => 'recordings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording'), array('controller' => 'recordings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composition'), array('controller' => 'compositions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Composer'), array('controller' => 'composers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Choirs'), array('controller' => 'choirs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choir'), array('controller' => 'choirs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Directors'), array('controller' => 'directors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Director'), array('controller' => 'directors', 'action' => 'add')); ?> </li>
	</ul>
</div>
