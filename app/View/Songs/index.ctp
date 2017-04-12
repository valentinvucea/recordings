<div>
    <div class="actions-top grid-1-2 fright" style="padding: 5px 0px;">
        <ul>
            <li><?php echo $this->Html->link(__('New Composer-Composition pair'), array('action' => 'add')); ?></li>
        </ul>
    </div>    

    <div class="grid-1-2 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 15px;">' . __('Composer-Composition List') . '</h2>';
    ?>
    </div>

</div>

<div class="conditions horizontal-form row bg-grey rounded">
    <div class="inner">
    <?php
		echo $this->Form->create(
			array('url' => '/Songs/index',
				  'type' => 'POST',
				  'style' => 'margin-bottom: 0px;',
				  //'action' => 'index',			  
				  'accept-charset' => 'UTF-8'
		));          
		
        echo $this->Form->input('Composer@name', array(
            'type'    => 'text',
            'div' => 'grup grid-1-3 fleft',
            'placeholder' => 'min. 4 chars',
            'required' => false,
            'label' => 'Composer Name:',
            'value' => (isset($conditions['Composer.name']) ? $conditions['Composer.name'] : ''),
        ));

        echo $this->Form->input('Composition@title', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-3 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'Composition Title:',
			'value' => (isset($conditions['Composition.title']) ? $conditions['Composition.title'] : ''),
		));        
			
		echo '<div class="grup grid-1-3 submit fleft" style="padding-top: 27px;">';
		
        echo $this->Form->submit('SEARCH', array(
			'type' => 'submit',
            'div' => false,
			));

		echo $this->Form->submit('RESET', array(
			'type' => 'reset',
            'style' => 'margin-left: 10px;',
            'div' => false,
            'id' => 'SongsReset'
			));

		echo '</div>';            
		
		echo $this->Form->end();
	?>
    </div>
</div>

<div class="inner" style="margin-top: 15px;">
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
        <input type="button" id="SongsGoto" data-count="<?php echo $this->Paginator->counter(array('format' => __('{:pages}'))); ?>" class="btn" value="GO" style="min-width: 60px;">
    </div>
<div>

<div class="inner">
	<table cellpadding="0" cellspacing="0">
        <tr class="border-top">
            <th class="text-center grid-1-20"><?php echo $this->Paginator->sort('id', 'ID'); ?></th>
            <th class="grid-1-4 no-a-block"><?php echo $this->Paginator->sort('name', 'Composer'); ?></th>                			
            <th class="grid-1-2 no-a-block"><?php echo $this->Paginator->sort('title', 'Composition'); ?></th>
            <th class="grid-1-6 no-a-block">Genre</th>            
            <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
        </tr>
        
        <?php foreach ($songs as $song): ?>
        <tr>
            <td class="text-center"><?php echo h($song['Song']['id']); ?></td>
            <td><?php echo h($song['Composer']['name']); ?></td>
            <td><?php echo h($song['Composition']['title']); ?></td> 
            <td><?php echo h($song['Composition']['Genre']['genre']); ?></td>                        			
            <td class="actions">
                <?php
                    if ($this->Session->check('links') === true) {
                        if( !$this->Sessionplus->isLinkedArr('Songs', 'song_id', $song['Song']['id'], 'links') ) {
                            echo $this->Html->link(__('Link'), array('action' => 'link', $song['Song']['id']));
                        } else {
                            echo $this->Html->link(__('Unlink'), array('action' => 'link', 'u' . $song['Song']['id']), array('class' => 'btngreen'));
                        }
                    }
                ?>
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $song['Song']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $song['Song']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $song['Song']['id']), null, __('Are you sure you want to delete # %s?', $song['Song']['id'])); ?>
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