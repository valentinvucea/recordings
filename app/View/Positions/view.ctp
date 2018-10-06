<div class="positions view">
<h2><?php  echo __('Position'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($position['Position']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($position['Position']['position']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Position'), array('action' => 'edit', $position['Position']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Position'), array('action' => 'delete', $position['Position']['id']), null, __('Are you sure you want to delete # %s?', $position['Position']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Positions'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Position'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Directors'), array('controller' => 'directors', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Director'), array('controller' => 'directors', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
