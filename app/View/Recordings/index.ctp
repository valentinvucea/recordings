<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Recordings') . '</h2>';
    ?>
    </div>
    <?php
        if (true === $isAdmin) {
    ?>
    <div class="actions-top grid-3-4 fleft" style="padding: 5px 0px;">
        <ul>
            <li><?php echo $this->Html->link(__('Add Recording'), ['action' => 'add']); ?></li>
        </ul>
    </div>
    <?php
        }
    ?>
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
            'type'    => 'text',
            'div' => 'grup grid-1-8 fleft',
            'placeholder' => '#',
            'required' => false,
            'label' => 'Rec. No:',
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
			'div' => 'grup grid-1-4 fleft',
			'empty' => 'All formats',
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

<?php echo $this->element('goto', array("prefix" => "Recordings")); ?>

<div class="inner">
	<table cellpadding="0" cellspacing="0">
        <tr class="border-top">
            <th class="text-center"><?php echo $this->Paginator->sort('no', 'Rec. No'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th class="text-center"><?php echo $this->Paginator->sort('format_id'); ?></th>
            <th class="text-center"><?php echo $this->Paginator->sort('Presentation.presentation', 'Presentation'); ?></th>
            <th class="text-center"><?php echo $this->Paginator->sort('notes'); ?></th>
            <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
        </tr>
        
        <?php foreach ($recordings as $recording): ?>
        <tr>
            <?php
                $has_links = '';
                if( $recording['Recording']['recsong_count'] > 0 && $recording['Recording']['recsinger_count'] > 0 ) {
                    $has_links = 'has_links';
                }
            ?>

            <td class="text-center"><?php echo h($recording['Recording']['no']); ?></td>
            <td class="<?php echo $has_links; ?>"><?php echo h($recording['Recording']['name']); ?></td>
            <td class="text-center"><?php echo h($recording['Format']['format']); ?></td>
			<td class="text-center"><?php echo h($recording['Presentation']['presentation']); ?></td>
            <td class="text-center"><?php echo h($recording['Recording']['notes']); ?></td>
            <td class="actions">
                <?php
                    if (true === $isAdmin) {
                        echo $this->Html->link(__('Link'), array('action' => ($has_links == 'has_links' ? 'linkedit' : 'linkadd'), $recording['Recording']['id']), array('class' => ($has_links == 'has_links' ? 'btngreen' : '')));
                    }
                    echo $this->Html->link(__('View'), array('action' => 'view', $recording['Recording']['id']));
                    if (true === $isAdmin) {
                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $recording['Recording']['id']]);
                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $recording['Recording']['id']], null, __('Are you sure you want to delete # %s?', $recording['Recording']['id']));
                    }
                ?>
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