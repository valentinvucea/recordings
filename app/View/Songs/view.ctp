<div class="songs view">
<h2><?php  echo 'Composer-Composition pair #' . h($song['Song']['id']); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($song['Song']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Composer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($song['Composer']['name'], array('controller' => 'composers', 'action' => 'view', $song['Composer']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Composition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($song['Composition']['title'], array('controller' => 'compositions', 'action' => 'view', $song['Composition']['id'])); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Genre'); ?></dt>
		<dd>
			<?php echo $this->Html->link($song['Composition']['Genre']['genre'], array('controller' => 'genres', 'action' => 'view', $song['Composition']['Genre']['id'])); ?>
			&nbsp;
		</dd>		
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit this pair'), array('action' => 'edit', $song['Song']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete pair'), array('action' => 'delete', $song['Song']['id']), null, __('Are you sure you want to delete # %s?', $song['Song']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List all pairs'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add new pair'), array('action' => 'add')), $isAdmin);
        echo '<li><hr/></li>';
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Compositions'), array('controller' => 'compositions', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Composition'), array('controller' => 'compositions', 'action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Composers'), array('controller' => 'composers', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Composer'), array('controller' => 'composers', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>

