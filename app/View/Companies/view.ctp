<div class="companies view">
<h2><?php  echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo h($company['Company']['company']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Companies'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), null, __('Are you sure you want to delete # %s?', $company['Company']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Company'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
