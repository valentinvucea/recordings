<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Recordings') . '</h2>';
    ?>
    </div>
    <div class="actions-top grid-3-4 fleft" style="padding: 5px 0px;">
        <ul>
            <li><?php echo $this->Html->link(__('Add Recording'), array('action' => 'add')); ?></li>
        </ul>
    </div>
</div>

<div class="conditions horizontal-form row bg-grey rounded">
    <div class="inner recordings">
    <?php
		echo $this->Form->create(
			array('url' => '/Recordings/index',
				  'type' => 'POST',
				  'style' => 'margin-bottom: 0px;',
				  //'action' => 'index',			  
				  'accept-charset' => 'UTF-8'
		)); 

        echo $this->Form->input('no', array(
		    'type' => 'text',
			'div' => 'grup grid-1-12 fleft',      
			'label' => 'Rec. #',
			'value' => (isset($conditions['Recording.no']) ? $conditions['Recording.no'] : ''),
		));        
		
        echo $this->Form->input('name', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-3 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'Name:',
			'value' => (isset($conditions['Recording.name']) ? $conditions['Recording.name'] : ''),
		));
		
		echo $this->Form->input('format_id', array(
		    'type'    => 'select',
			'div' => 'grup grid-1-3 fleft',
			'empty' => '(choose one)',
            'required' => false,
			'label' => 'Format:',
			'value' => (isset($conditions['Recording.format_id']) ? $conditions['Recording.format_id'] : ''),
		));
			
		echo '<div class="grup grid-1-4 submit fleft" style="padding-top: 27px;">';
		
        echo $this->Form->submit('SEARCH', array(
			'type' => 'submit',
            'div' => false,
			));

		echo $this->Form->submit('RESET', array(
			'type' => 'reset',
            'style' => 'margin-left: 10px;',
            'div' => false,
            'id' => 'RecordingsReset'
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
        <input type="button" id="RecordingsGoto" data-count="<?php echo $this->Paginator->counter(array('format' => __('{:pages}'))); ?>" class="btn" value="GO" style="min-width: 60px;">
    </div>
<div>

<div class="inner">
	<table cellpadding="0" cellspacing="0">
        <tr class="border-top">
            <th class="text-center"><?php echo $this->Paginator->sort('no', 'No'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th class="text-center"><?php echo $this->Paginator->sort('format_id'); ?></th>
            <th class="text-center"><?php echo $this->Paginator->sort('company_id'); ?></th>
            <th class="text-center"><?php echo $this->Paginator->sort('catalog'); ?></th>
            <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
        </tr>
        
        <?php foreach ($recordings as $recording): ?>
        <tr>
            <?php
                $has_links = '';
                if( $recording['Recording']['recsong_count'] > 0 || $recording['Recording']['recsinger_count'] > 0 ) {
                    $has_links = 'has_links';
                }
            ?>

            <td class="text-center"><?php echo h($recording['Recording']['no']); ?></td>
            <td class="<?php echo $has_links; ?>"><?php echo h($recording['Recording']['name']); ?></td>
            <td class="text-center"><?php echo h($recording['Format']['format']); ?></td>
            <td class="text-center"><?php echo h($recording['Company']['company']); ?></td>
			<td class="text-center"><?php echo h($recording['Recording']['catalog']); ?></td>			
            <td class="actions">
                <?php echo $this->Html->link(__('Link'), array('action' => ($has_links == 'has_links' ? 'linkedit' : 'linkadd'), $recording['Recording']['id']), array('class' => ($has_links == 'has_links' ? 'btngreen' : ''))); ?>			
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $recording['Recording']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recording['Recording']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recording['Recording']['id']), null, __('Are you sure you want to delete # %s?', $recording['Recording']['id'])); ?>
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

<div id="view_dialog" style="display: none;"></div>

<?php
    echo $this->Html->css('jquery-ui', null, array('inline' => false));
    echo $this->Html->script('/js/jquery-ui.min');  
    echo $this->Html->script('/js/paging-functions');
    echo $this->Html->script('/js/recordings-index');      