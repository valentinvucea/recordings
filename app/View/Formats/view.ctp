<div class="formats view">
<h2><?php  echo __('Format'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($format['Format']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Format'); ?></dt>
		<dd>
			<?php echo h($format['Format']['format']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Formats'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Format'), array('action' => 'edit', $format['Format']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Format'), array('action' => 'delete', $format['Format']['id']), null, __('Are you sure you want to delete # %s?', $format['Format']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Format'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
