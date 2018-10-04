<div class="singers view">
<h2><?php  echo 'Pair Choir-Director #' . $singer['Singer']['id']; ?></h2>
	<dl>
		<dt><?php echo __('Choir'); ?></dt>
		<dd>
			<?php 
				echo $this->Html->link($singer['Choir']['choir'], array('controller' => 'choirs', 'action' => 'view', $singer['Choir']['id']));
				if($singer['Choir']['city'] != '') {
					echo '<br />';
					echo $singer['Choir']['city'];
					if($singer['Choir']['state_id'] != '')
						echo ", " . $singer['Choir']['state_id'];
				}
			?>
			&nbsp;
		</dd>
		<dt><?php echo __('Director'); ?></dt>
		<dd>
			<?php 
				echo $this->Html->link($singer['Director']['name'], array('controller' => 'directors', 'action' => 'view', $singer['Director']['id'])); 
				echo '<br/>';
				echo '(' . $singer['Director']['Position']['position'] . ')';
			?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
        <?php
        $this->Authorize->echoIfAdmin($this->Html->link(__('Edit this pair'), array('action' => 'edit', $singer['Singer']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete pair'), array('action' => 'delete', $singer['Singer']['id']), null, __('Are you sure you want to delete # %s?', $singer['Singer']['id'])), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List all pairs'), array('action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add new pair'), array('action' => 'add')), $isAdmin);
        echo '<li><hr/></li>';
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Choirs'), array('controller' => 'choirs', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Choir'), array('controller' => 'choirs', 'action' => 'add')), $isAdmin);
        $this->Authorize->echoIfAdmin($this->Html->link(__('List Directors'), array('controller' => 'directors', 'action' => 'index')), true);
        $this->Authorize->echoIfAdmin($this->Html->link(__('Add Director'), array('controller' => 'directors', 'action' => 'add')), $isAdmin);
        ?>
	</ul>
</div>

