<div class="vocalformats view">
<h2><?php  echo __('Vocal format'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vocalformat['Vocalformat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vocal format'); ?></dt>
		<dd>
			<?php echo h($vocalformat['Vocalformat']['vocalformat']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vocal format'), array('action' => 'edit', $vocalformat['Vocalformat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vocal format'), array('action' => 'delete', $vocalformat['Vocalformat']['id']), null, __('Are you sure you want to delete # %s?', $vocalformat['Vocalformat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vocal formats'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Vocal format'), array('action' => 'add')); ?> </li>
	</ul>
</div>
