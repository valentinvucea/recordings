<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Choirs') . '</h2>';
    ?>
    </div>
    <div class="actions-top grid-3-4 fleft" style="padding: 5px 0px;">
        <ul>
            <li><?php echo $this->Html->link(__('Add Choir'), array('action' => 'add')); ?></li>
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

        echo $this->Form->input('id', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-12 fleft',      
			'label' => 'ID:',
			'value' => (isset($conditions['Choir.id']) ? $conditions['Choir.id'] : ''),
		));        
		
        echo $this->Form->input('choir', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-4 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'Name:',
			'value' => (isset($conditions['Choir.choir']) ? $conditions['Choir.choir'] : ''),
		));
		
		echo $this->Form->input('city', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-4 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'City:',
			'value' => (isset($conditions['Choir.city']) ? $conditions['Choir.city'] : ''),
		));
			
		echo '<div class="grup grid-5-12 submit fleft" style="padding-top: 27px;">';
		
        echo $this->Form->submit('SEARCH', array(
			'type' => 'submit',
            'div' => false,
			));

		echo $this->Form->submit('RESET', array(
			'type' => 'reset',
            'style' => 'margin-left: 10px;',
            'div' => false,
            'id' => 'ChoirsReset'
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
        <input type="button" id="ChoirsGoto" data-count="<?php echo $this->Paginator->counter(array('format' => __('{:pages}'))); ?>" class="btn" value="GO" style="min-width: 60px;">
    </div>
<div>

<div class="inner">
	<table cellpadding="0" cellspacing="0">
        <tr class="border-top">
                <th class="text-center"><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('choir'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('city'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('state'); ?></th>            
                <th class="text-center"><?php echo $this->Paginator->sort('country'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('denomination'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('vocalformats', 'Voc. format'); ?></th>
                <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
        </tr>
        
        <?php foreach ($choirs as $choir): ?>
        <tr>
            <td class="text-center"><?php echo h($choir['Choir']['id']); ?></td>
            <td><?php echo h($choir['Choir']['choir']); ?></td>
            <td class="text-center"><?php echo h($choir['Choir']['city']); ?></td>
            <td class="text-center"><?php echo h($choir['State']['state']); ?></td>        
            <td class="text-center"><?php echo h($choir['Country']['country']); ?></td>
            <td class="text-center"><?php echo h($choir['Denomination']['denomination']); ?></td>			
            <td class="text-center"><?php echo h($choir['Vocalformat']['vocalformat']); ?></td>
            <td class="actions">
				<?php
                    if( $this->Sessionplus->isSession('Singers') == true ) {
                        if( !$this->Sessionplus->isLinked('choir_id', $choir['Choir']['id'], 'Singers') ) {
                            echo $this->Html->link(__('Link'), array('action' => 'link', $choir['Choir']['id']));
                        } else {
                            echo $this->Html->link(__('Unlink'), array('action' => 'link', 'u' . $choir['Choir']['id']), array('class' => 'btngreen'));
                        }
                    }					
				?>			
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $choir['Choir']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $choir['Choir']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $choir['Choir']['id']), null, __('Are you sure you want to delete # %s?', $choir['Choir']['id'])); ?>
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