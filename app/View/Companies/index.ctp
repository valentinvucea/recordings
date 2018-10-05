<div class="companies index">
	<h2><?php echo __('Companies'); ?></h2>

    <div class="conditions horizontal-form row bg-grey rounded">
        <div class="inner recordings">
            <?php
            echo $this->Form->create(
                array('url' => '/Companies/index',
                      'type' => 'POST',
                      'style' => 'margin-bottom: 0px;',
                      //'action' => 'index',
                      'accept-charset' => 'UTF-8'
                ));

            echo $this->Form->input('company', array(
                'type'    => 'text',
                'div' => 'grup grid-1-3 fleft',
                'placeholder' => 'min. 4 chars',
                'required' => false,
                'label' => 'Name:',
                'value' => (isset($conditions['company']) ? $conditions['company'] : ''),
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
                'onclick' => 'location.href = \'/Companies/reset\';',
                'id' => 'CompaniesReset'
            ));


            echo '</div>';

            echo $this->Form->end();
            ?>
        </div>
    </div>

    <?php echo $this->element('goto', array("prefix" => "Companies")); ?>

	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('company'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($companies as $company): ?>
	<tr>
		<td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
		<td><?php echo h($company['Company']['company']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $company['Company']['id'])); ?>
            <?php
                if (true === $isAdmin) {
                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $company['Company']['id']]);
                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $company['Company']['id']], null, __('Are you sure you want to delete # %s?', $company['Company']['id']));
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
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
    <?php
        if (true === $isAdmin) {
    ?>
        <li><?php echo $this->Html->link(__('Add Company'), array('action' => 'add')); ?></li>
    <?php
        }
    ?>
	</ul>
</div>

<?php echo $this->Html->script('/js/paging-functions');