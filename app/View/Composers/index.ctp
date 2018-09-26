<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Composers') . '</h2>';
    ?>
    </div>
    <?php
        if (true === $isAdmin) {
    ?>
    <div class="actions-top grid-3-4 fleft" style="padding: 5px 0px;">
        <ul>
            <li><?php echo $this->Html->link(__('Add Composer'), array('action' => 'add')); ?></li>
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
		
        echo $this->Form->input('name', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-3 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'Name:',
			'value' => (isset($conditions['Composer.name']) ? $conditions['Composer.name'] : ''),
		));
			
		echo '<div class="grup grid-7-12 submit fleft" style="padding-top: 27px;">';
		
        echo $this->Form->submit('SEARCH', array(
			'type' => 'submit',
            'div' => false,
			));

		echo $this->Form->submit('RESET', array(
			'type' => 'reset',
            'style' => 'margin-left: 10px;',
            'div' => false,
            'id' => 'ComposersReset'
			));
		echo '</div>';            
		
		echo $this->Form->end();
	?>
    </div>
</div>

<?php echo $this->element('goto', array("prefix" => "Composers")); ?>

<div class="inner">
	<table cellpadding="0" cellspacing="0">
        <tr class="border-top">
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('alt_name', 'Alt. name'); ?></th>
                <th><?php echo $this->Paginator->sort('dates'); ?></th>                        
                <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
        </tr>
        
        <?php foreach ($composers as $composer): ?>
        <tr>
            <td><?php echo h($composer['Composer']['id']); ?>&nbsp;</td>
            <td><?php echo h($composer['Composer']['name']); ?>&nbsp;</td>
            <td><?php echo h($composer['Composer']['alt_name']); ?>&nbsp;</td>
            <td><?php echo h($composer['Composer']['dates']); ?>&nbsp;</td>                   
            <td class="actions">
                <?php
                    if (true === $isAdmin && $this->Sessionplus->isSession('Songs') == true ) {
                        if( !$this->Sessionplus->isLinked('composer_id', $composer['Composer']['id'], 'Songs') ) {
                            echo $this->Html->link(__('Link'), array('action' => 'link', $composer['Composer']['id']));
                        } else {
                            echo $this->Html->link(__('Unlink'), array('action' => 'link', 'u' . $composer['Composer']['id']), array('class' => 'btngreen'));
                        }
                    }
                ?> 		
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $composer['Composer']['id'])); ?>
                <?php
                    if (true === $isAdmin) {
                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $composer['Composer']['id']]);
                        echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $composer['Composer']['id']], null, __('Are you sure you want to delete # %s?', $composer['Composer']['id']));
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