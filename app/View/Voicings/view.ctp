<div class="voicings view">
<h2><?php  echo __('Voicing'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($voicing['Voicing']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Voicing'); ?></dt>
		<dd>
			<?php echo h($voicing['Voicing']['voicing']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Voicing'), array('action' => 'edit', $voicing['Voicing']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Voicing'), array('action' => 'delete', $voicing['Voicing']['id']), null, __('Are you sure you want to delete # %s?', $voicing['Voicing']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Voicings'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Voicing'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
