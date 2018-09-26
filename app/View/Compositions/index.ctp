<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Compositions') . '</h2>';
    ?>
    </div>
    <?php
        if (true === $isAdmin) {
    ?>
    <div class="actions-top grid-3-4 fleft" style="padding: 5px 0px;">
        <ul>
            <li><?php echo $this->Html->link(__('Add Composition'), array('action' => 'add')); ?></li>
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
				  'accept-charset' => 'UTF-8'
		));
		
        echo $this->Form->input('title', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-4 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'Title:',
			'value' => (isset($conditions['Composition.title']) ? $conditions['Composition.title'] : ''),
		));
		
		echo $this->Form->input('opening_text', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-4 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'Opening text:',
			'value' => (isset($conditions['Composition.opening_text']) ? $conditions['Composition.opening_text'] : ''),
		));
		
		echo $this->Form->input('genre_id', array(
		    'type'    => 'text',
			'div' => 'grup grid-1-6 fleft',
			'placeholder' => 'min. 4 chars',
            'required' => false,
			'label' => 'Genre:',
			'value' => (isset($conditions['Genre.genre']) ? $conditions['Genre.genre'] : ''),
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
            'id' => 'CompositionsReset'
			));
		echo '</div>';            
		
		echo $this->Form->end();
	?>
    </div>
</div>

<?php echo $this->element('goto', array("prefix" => "Compositions")); ?>

<div class="inner">
	<table cellpadding="0" cellspacing="0">
        <tr class="border-top">
                <th class="text-center"><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('title'); ?></th>
                <th><?php echo $this->Paginator->sort('opening_text', 'Opening text'); ?></th>
                <th class="text-center"><?php echo $this->Paginator->sort('genre_id'); ?></th>            
                <th class="text-center"><?php echo $this->Paginator->sort('version_id'); ?></th>
				<th class="text-center"><?php echo $this->Paginator->sort('collection_title', 'Collection title'); ?></th>
                <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
        </tr>
        
        <?php foreach ($compositions as $composition): ?>
        <tr>
            <td class="text-center"><?php echo h($composition['Composition']['id']); ?></td>
            <td><?php echo h($composition['Composition']['title']); ?></td>
            <td><?php echo h($composition['Composition']['opening_text']); ?></td>
            <td class="text-center"><?php echo h($composition['Genre']['genre']); ?></td>
			<td class="text-center"><?php echo h($composition['Version']['version']); ?></td>		
			<td class="text-center"><?php echo h($composition['Composition']['collection_title']); ?></td>		
            <td class="actions" style="width: 60px;">
				<?php
					if( true === $isAdmin && $this->Sessionplus->isSession('Songs') == true ) {
						if( !$this->Sessionplus->isLinked('composition_id', $composition['Composition']['id'], 'Songs') ) {
							echo $this->Html->link(__('Link'), array('action' => 'link', $composition['Composition']['id']));
						} else {
							echo $this->Html->link(__('Unlink'), array('action' => 'link', 'u' . $composition['Composition']['id']), array('class' => 'btngreen'));
						}
					}
				?>				
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $composition['Composition']['id'])); ?>
                <?php
                    if (true === $isAdmin) {
                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $composition['Composition']['id']));
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $composition['Composition']['id']), null, __('Are you sure you want to delete # %s?', $composition['Composition']['id']));
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