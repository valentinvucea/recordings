<div class="presentations view">
<h2><?php  echo __('Presentation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($presentation['Presentation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presentation'); ?></dt>
		<dd>
			<?php echo h($presentation['Presentation']['presentation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($presentation['Presentation']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Presentations'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Presentation'), array('action' => 'edit', $presentation['Presentation']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Presentation'), array('action' => 'delete', $presentation['Presentation']['id']), null, __('Are you sure you want to delete # %s?', $presentation['Presentation']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Presentation'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
