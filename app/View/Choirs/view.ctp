<div class="choirs view">
<h2><?php  echo __('Choir'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($choir['Choir']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Choir'); ?></dt>
		<dd>
			<?php echo h($choir['Choir']['choir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Alt Name'); ?></dt>
		<dd>
			<?php echo h($choir['Choir']['alt_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($choir['Choir']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($choir['State']['state'], array('controller' => 'states', 'action' => 'view', $choir['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($choir['Country']['country'], array('controller' => 'countries', 'action' => 'view', $choir['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denomination'); ?></dt>
		<dd>
			<?php echo $this->Html->link($choir['Denomination']['denomination'], array('controller' => 'denominations', 'action' => 'view', $choir['Denomination']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vocalformat'); ?></dt>
		<dd>
			<?php echo $this->Html->link($choir['Vocalformat']['vocalformat'], array('controller' => 'vocalformats', 'action' => 'view', $choir['Vocalformat']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($choir['Choir']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Choir'), array('action' => 'edit', $choir['Choir']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Choir'), array('action' => 'delete', $choir['Choir']['id']), null, __('Are you sure you want to delete # %s?', $choir['Choir']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Choirs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Choir'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Denominations'), array('controller' => 'denominations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Denomination'), array('controller' => 'denominations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vocal Formats'), array('controller' => 'vocalformats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Vocal Format'), array('controller' => 'vocalformats', 'action' => 'add')); ?> </li>
	</ul>
</div>
