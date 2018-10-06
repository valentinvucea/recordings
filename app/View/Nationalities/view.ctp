<div class="nationalities view">
<h2><?php  echo __('Nationality'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['nationality']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Nationality'), array('action' => 'edit', $nationality['Nationality']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Nationality'), array('action' => 'delete', $nationality['Nationality']['id']), null, __('Are you sure you want to delete # %s?', $nationality['Nationality']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Nationalities'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Nationality'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Director'), array('controller' => 'composers', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
