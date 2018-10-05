<div class="ancillarymusics view">
<h2><?php  echo __('Ancillary music'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ancillarymusic['Ancillarymusic']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ancillarymusic['Ancillarymusic']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($ancillarymusic['Ancillarymusic']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Ancillary music'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Ancillary music'), array('action' => 'edit', $ancillarymusic['Ancillarymusic']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Ancillary music'), array('action' => 'delete', $ancillarymusic['Ancillarymusic']['id']), null, __('Are you sure you want to delete # %s?', $ancillarymusic['Ancillarymusic']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Ancillary music'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
