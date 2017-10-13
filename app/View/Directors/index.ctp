<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Directors') . '</h2>';
    ?>
    </div>
    <div class="actions-top grid-3-4 fleft" style="padding: 5px 0px;">
        <ul>
            <li><?php echo $this->Html->link(__('New Director'), array('action' => 'add')); ?></li>
        </ul>
    </div>
</div>

<div class="conditions horizontal-form row bg-grey rounded">
    <div class="inner">
    <?php
		echo $this->Form->create(
			array('action' => 'index', 
				  'type' => 'POST',
				  'style' => 'margin-bottom: 0px;',
				  'accept-charset' => 'UTF-8',
		)); 

        echo $this->Form->input('name', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-4 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'Name:',
			'value' => (isset($conditions['Director.name']) ? $conditions['Director.name'] : ''),
		));

        echo $this->Form->input('position_id', array(
            'type'    => 'select',
            'div' => 'grup grid-1-4 fleft search-form',
            'label' => 'Position:',
            'empty' => 'Any position',
            'options' => $position_list,
            'value' => (isset($conditions['Director.position_id']) ? $conditions['Director.position_id'] : ''),
        ));
			
		echo '<div class="grup grid-6-12 submit fleft" style="padding-top: 27px;">';
		
        echo $this->Form->submit('SEARCH', array(
			'type' => 'submit',
            'div' => false,
			));

		echo $this->Form->submit('RESET', array(
			'type' => 'reset',
            'style' => 'margin-left: 10px;',
            'div' => false,
            'id' => 'DirectorsReset'
			));
		echo '</div>';            
		
		echo $this->Form->end();
	?>
    </div>
</div>

<div class="inner">
    <div class="grid-1-2 fleft" style="line-height: 64px;">
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Found <strong>{:count}</strong> records, pag. <strong>{:page}/{:pages}</strong> ({:current} records/page)')
        ));
        ?>
    </div>
    
    <div class="horizontal-form grid-1-2 fleft" style="text-align: right; padding: 10px 0;">
        <strong>Go to page: </strong>
        <input type="text" id="input-goto" style="width: 50px; display: inline; position: relative; top: 2px; ">
        <input type="button" id="DirectorsGoto" data-count="<?php echo $this->Paginator->counter(array('format' => __('{:pages}'))); ?>" class="btn" value="GO" style="min-width: 60px;">
    </div>
<div>

<div class="inner">
	<table cellpadding="0" cellspacing="0">
        <tr class="border-top">
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('alt_name'); ?></th>
            <th><?php echo $this->Paginator->sort('position_id'); ?></th>
            <th><?php echo $this->Paginator->sort('notes'); ?></th>
            <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
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
	?>	
    </p>
	
    <div class="paging">
	<?php
        echo $this->Paginator->first('<< ' . __('first'), array('class' => 'first'), null, array('class' => 'first disabled'));
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        echo $this->Paginator->last(__('last') . ' >>', array('class' => 'last'), null, array('class' => 'last disabled'));
	?>
	</div>
</div>

<?php echo $this->Html->script('/js/paging-functions');