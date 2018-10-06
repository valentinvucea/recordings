<div class="genres view">
<h2><?php  echo __('Genre'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($genre['Genre']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Genre'); ?></dt>
		<dd>
			<?php echo h($genre['Genre']['genre']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit Genre'), array('action' => 'edit', $genre['Genre']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Genre'), array('action' => 'delete', $genre['Genre']['id']), null, __('Are you sure you want to delete # %s?', $genre['Genre']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Genres'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Genre'), array('action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>
