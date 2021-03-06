<div class="compositions view">
<h2><?php  echo __('Composition'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($composition['Composition']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($composition['Composition']['title']); ?>
			&nbsp;
		</dd>
		<dt>Opening text</dt>
		<dd>
			<?php echo h($composition['Composition']['opening_text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Genre'); ?></dt>
		<dd>
			<?php echo $this->Html->link($composition['Genre']['genre'], array('controller' => 'genres', 'action' => 'view', $composition['Genre']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Version'); ?></dt>
		<dd>
			<?php echo $this->Html->link($composition['Version']['version'], array('controller' => 'versions', 'action' => 'view', $composition['Version']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key/Name'); ?></dt>
		<dd>
			<?php echo h($composition['Composition']['key_name']); ?>
			&nbsp;
		</dd>
		<dt>Recording notes</dt>
		<dd>
			<?php echo $this->Html->link($composition['Recordingnote']['recording_note'], array('controller' => 'recordingnotes', 'action' => 'view', $composition['Recordingnote']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Voicing'); ?></dt>
		<dd>
			<?php echo $this->Html->link($composition['Voicing']['voicing'], array('controller' => 'voicings', 'action' => 'view', $composition['Voicing']['id'])); ?>
			&nbsp;
		</dd>
		<dt>Collection title</dt>
		<dd>
			<?php echo h($composition['Composition']['collection_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ancillary music'); ?></dt>
		<dd>
			<?php echo h($composition['Composition']['ancillary_music']); ?>
			&nbsp;
		</dd>
		<dt>Composer/Other notes</dt>
		<dd>
			<?php echo h($composition['Composition']['notes']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
    <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Composition'), array('action' => 'edit', $composition['Composition']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Composition'), array('action' => 'delete', $composition['Composition']['id']), null, __('Are you sure you want to delete # %s?', $composition['Composition']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Compositions'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Composition'), array('action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Genres'), array('controller' => 'genres', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Genre'), array('controller' => 'genres', 'action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Versions'), array('controller' => 'versions', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Version'), array('controller' => 'versions', 'action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Recordings notes'), array('controller' => 'recordingnotes', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Recordings note'), array('controller' => 'recordingnotes', 'action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Voicings'), array('controller' => 'voicings', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Voicing'), array('controller' => 'voicings', 'action' => 'add')), $isAdmin);
	?>
    </ul>
</div>
