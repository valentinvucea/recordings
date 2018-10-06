<div class="countries view">
<h2><?php  echo __('Country'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($country['Country']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($country['Country']['country']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Country'), array('action' => 'edit', $country['Country']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Country'), array('action' => 'delete', $country['Country']['id']), null, __('Are you sure you want to delete # %s?', $country['Country']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Countries'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Country'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add State'), array('controller' => 'states', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related States'); ?></h3>
	<?php if (!empty($country['State'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($country['State'] as $state): ?>
		<tr>
			<td><?php echo $state['id']; ?></td>
			<td><?php echo $state['state']; ?></td>
			<td><?php echo $state['country_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'states', 'action' => 'view', $state['id'])); ?>
				<?php
                    if (true === $isAdmin) {
                        echo $this->Html->link(__('Edit'), array('controller' => 'states', 'action' => 'edit', $state['id']));
                        echo $this->Form->postLink(__('Delete'), array('controller' => 'states', 'action' => 'delete', $state['id']), null, __('Are you sure you want to delete # %s?', $state['id']));
                    }
                 ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
    <?php endif; ?>
</div>
