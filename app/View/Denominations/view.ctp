<div class="denominations view">
<h2><?php  echo __('Denomination'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($denomination['Denomination']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denomination'); ?></dt>
		<dd>
			<?php echo h($denomination['Denomination']['denomination']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Denomination'), array('action' => 'edit', $denomination['Denomination']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Denomination'), array('action' => 'delete', $denomination['Denomination']['id']), null, __('Are you sure you want to delete # %s?', $denomination['Denomination']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Denominations'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Denomination'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
