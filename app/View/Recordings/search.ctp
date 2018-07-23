<div>
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Search Recordings') . '</h2>';
    ?>
</div>

<div class="grid">
    <div class="homeSearch col-6">
        <form id="frmSearch" name="frmSearch" action="/Recordings/search" method="post">
            <?php
                foreach($postData['row'] as $key=>$row) {
            ?>
                <div id="row_<?php echo $key; ?>" class="hrow grid">
                    <?php
                        if (0 !== $key) {
                    ?>
                        <div class="col-1">
                            <select id="searchOperator_<?php echo $key; ?>" name="row[<?php echo $key; ?>][searchOperator]">
                                <option <?php echo ('AND' === $row['searchTable'] ? 'selected' : ''); ?> value="AND">AND</option>
                                <option <?php echo ('OR' === $row['searchTable'] ? 'selected' : ''); ?> value="OR">OR</option>
                            </select>
                        </div>
                    <?php
                        }
                    ?>
                    <div class="col-<?php echo (0 === $key ? 6 : 5); ?>">
                        <input type="text" id="searchTerm_0" name="row[<?php echo $key; ?>][searchTerm]"
                               placeholder="Search term..." <?php echo $row['searchTerm']; ?>/>
                    </div>
                    <div class="col-4">
                        <select id="searchTable_0" name="row[0][searchTable]">
                            <option <?php echo (0 === $row['searchTable'] ? 'selected' : ''); ?> value="0">All tables</option>
                            <option <?php echo (1 === $row['searchTable'] ? 'selected' : ''); ?> value="1">Choirs</option>
                            <option <?php echo (2 === $row['searchTable'] ? 'selected' : ''); ?> value="2">Composers</option>
                            <option <?php echo (3 === $row['searchTable'] ? 'selected' : ''); ?> value="3">Compositions</option>
                            <option <?php echo (4 === $row['searchTable'] ? 'selected' : ''); ?> value="4">Directors</option>
                            <option <?php echo (5 === $row['searchTable'] ? 'selected' : ''); ?> value="5">Recordings</option>
                        </select>
                    </div>
                    <?php
                        if (0 === $key) {
                    ?>
                    <div class="col-2">
                        <button type="button" id="searchAdd">+</button>
                    </div>
                    <?php
                        } else {
                    ?>
                        <div class="col-2">
                            <button type="button" class="btn-remove" id="searchRemove_<?php echo $key; ?>">-</button>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            <?php
                }
            ?>
            <div class="hrow submit-row">
                <input type="submit" class="btn" id="searchSubmit" name="searchSubmit" value="Search">
            </div>
        </form>
    </div>
</div>

<hr>


<div class="inner">
    <div class="grid-1-2 fleft" style="line-height: 32px;">
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Found <strong>{:count}</strong> records, pag. <strong>{:page}/{:pages}</strong> ({:current} records/page)')
        ));
        ?>
    </div>
</div>

<div class="inner">
    <table cellpadding="0" cellspacing="0">
        <tr class="border-top">
            <th class="text-center"><?php echo $this->Paginator->sort('no', 'No'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th class="text-center"><?php echo $this->Paginator->sort('format_id'); ?></th>
            <!--            <th class="text-center">--><?php //echo $this->Paginator->sort('company_id'); ?><!--</th>-->
            <th class="text-center"><?php echo $this->Paginator->sort('notes'); ?></th>
            <th class="text-center"><?php echo $this->Paginator->sort('Presentation.presentation', 'Presentation'); ?></th>
            <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
        </tr>

        <?php foreach ($results as $recording): ?>
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
                <!--            <td class="text-center">--><?php //echo h($recording['Company']['company']); ?><!--</td>-->
                <td class="text-center"><?php echo h($recording['Recording']['notes']); ?></td>
                <td class="text-center"><?php echo h($recording['Presentation']['presentation']); ?></td>
                <td class="actions text-center">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $recording['Recording']['id'])); ?>
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

<?php
    echo $this->Html->css('home-search', null, array('inline' => false));
    echo $this->Html->css('recordings-search', null, array('inline' => false));
    echo $this->Html->script('home-search', array('inline' => false));
?>