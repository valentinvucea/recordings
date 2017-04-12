<div class="directors index">
	<?php 
		echo '<h2>' . __('Directors') . '</h2>';
	?>
	
	<?php
		echo '<div class="index-search">';

		echo $this->Form->create(
			array('action' => 'index', 
				  'type' => 'POST',
				  'style' => 'margin-bottom: 0px;',
				  'accept-charset' => 'UTF-8',
				)); 

		echo $this->Form->input('name', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-3',
			'placeholder' => 'min. 4 chars',
			'label' => 'Name:',
			'value' => (isset($conditions['Director.name']) ? $conditions['Director.name'] : ''),
		));

		echo $this->Form->input('position_id', array(
		    'type'    => 'select',
			'div' => 'grup grid-1-5',
			'label' => 'Position:',
			'empty' => 'Any position',
		    'options' => $position_list,
			'value' => (isset($conditions['Director.position_id']) ? $conditions['Director.position_id'] : ''),
		));
			
		echo '<div class="grup grid-1-5" style="height: 58px;">';
		echo '<label>&nbsp;</label>';
		echo $this->Form->button('SEARCH', array(
			'type' => 'submit',
			'class' => 'submit',
			));
			
		echo '</div>';
		
		echo $this->Form->end();
		echo '<div class="clearfix"></div>';
		echo '</div>';
	?>	
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('alt_name'); ?></th>
			<th><?php echo $this->Paginator->sort('position_id'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($directors as $director): ?>
	<tr>
		<td><?php echo h($director['Director']['id']); ?>&nbsp;</td>
		<td><?php echo h($director['Director']['name']); ?>&nbsp;</td>
		<td><?php echo h($director['Director']['alt_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($director['Position']['position'], array('controller' => 'positions', 'action' => 'view', $director['Director']['position_id'])); ?>
		</td>
		<td><?php echo h($director['Director']['notes']); ?>&nbsp;</td>
		<td class="actions">
			<?php
                if( $this->Sessionplus->isSession('Singers') == true ) {
                    if( !$this->Sessionplus->isLinked('director_id', $director['Director']['id'], 'Singers') ) {
                        echo $this->Html->link(__('Link'), array('action' => 'link', $director['Director']['id']));
                    } else {
                        echo $this->Html->link(__('Unlink'), array('action' => 'link', 'u' . $director['Director']['id']), array('class' => 'btngreen'));
                    }
                }
			?>		
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $director['Director']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $director['Director']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $director['Director']['id']), null, __('Are you sure you want to delete # %s?', $director['Director']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->first();
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last();
	?>
	</div>
</div>





<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Director'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
	</ul>
</div>
