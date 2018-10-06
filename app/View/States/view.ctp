<div class="states view">
<h2><?php  echo __('State'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($state['State']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($state['State']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($state['Country']['country'], array('controller' => 'countries', 'action' => 'view', $state['Country']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit State'), array('action' => 'edit', $state['State']['id'])), true);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete State'), array('action' => 'delete', $state['State']['id']), null, __('Are you sure you want to delete # %s?', $state['State']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List States'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add State'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Country'), array('controller' => 'countries', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
