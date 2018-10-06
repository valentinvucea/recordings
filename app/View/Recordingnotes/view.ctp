<div class="recordingnotes view">
<h2><?php  echo 'Recordings note'; ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recordingnote['Recordingnote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recording Note'); ?></dt>
		<dd>
			<?php echo h($recordingnote['Recordingnote']['recording_note']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Recordings note'), array('action' => 'edit', $recordingnote['Recordingnote']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Recordings note'), array('action' => 'delete', $recordingnote['Recordingnote']['id']), null, __('Are you sure you want to delete # %s?', $recordingnote['Recordingnote']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Recordings notes'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Recordings note'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
