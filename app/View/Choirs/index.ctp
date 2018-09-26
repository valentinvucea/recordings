<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Choirs') . '</h2>';
    ?>
    </div>
    <?php
        if (true === $isAdmin) {
    ?>
        <div class="actions-top grid-3-4 fleft" style="padding: 5px 0px;">
            <ul>
                <li><?php echo $this->Html->link(__('Add Choir'), ['action' => 'add']); ?></li>
            </ul>
        </div>
    <?php
        }
    ?>
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

<?php echo $this->element('goto', array("prefix" => "Choirs")); ?>

<div class="inner">
	<table cellpadding="0" cellspacing="0">
        <tr class="border-top">
                <th class="text-center"><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('choir'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('city'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('State.state', 'State'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('Country.country', 'Country'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('Denomination.denomination', 'Denomination'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('Vocalformat.vocalformat', 'Voc. format'); ?></th>
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
                    if(true === $isAdmin && $this->Sessionplus->isSession('Singers') == true ) {
                        if( !$this->Sessionplus->isLinked('choir_id', $choir['Choir']['id'], 'Singers') ) {
                            echo $this->Html->link(__('Link'), array('action' => 'link', $choir['Choir']['id']));
                        } else {
                            echo $this->Html->link(__('Unlink'), array('action' => 'link', 'u' . $choir['Choir']['id']), array('class' => 'btngreen'));
                        }
                    }					
				?>			
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $choir['Choir']['id'])); ?>
                <?php
                    if (true === $isAdmin) {
                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $choir['Choir']['id']));
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $choir['Choir']['id']), null, __('Are you sure you want to delete # %s?', $choir['Choir']['id']));
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

<?php echo $this->Html->script('/js/paging-functions');