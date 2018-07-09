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

<div>
    Search form
</div>

<div class="inner">
    <?php
    echo '<pre>';
        print_r($postData);
    ?>
</div>