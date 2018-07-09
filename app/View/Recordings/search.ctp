<div>
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Search Recordings') . '</h2>';
    ?>
</div>

<div class="grid">
    <div class="homeSearch col-6">
        <form id="frmSearch" name="frmSearch" action="/Recordings/search" method="post">
            <div id="row_0" class="hrow grid">
                <div class="col-6">
                    <input type="text" id="searchTerm_0" name="row[0][searchTerm]" placeholder="Search term..." />
                </div>
                <div class="col-4">
                    <select id="searchTable_0" name="row[0][searchTable]">
                        <option value="0">All tables</option>
                        <option value="1">Choirs</option>
                        <option value="2">Composers</option>
                        <option value="3">Compositions</option>
                        <option value="4">Directors</option>
                        <option value="5">Recordings</option>
                    </select>
                </div>
                <div class="col-2">
                    <button type="button" id="searchAdd">+</button>
                </div>
            </div>
            <div class="hrow submit-row">
                <input type="submit" class="btn" id="searchSubmit" name="searchSubmit" value="Search">
            </div>
        </form>
    </div>
</div>

<hr>

<div class="inner">
    <?php
    echo '<pre>';
        print_r($postData);
    ?>
</div>

<?php
    echo $this->Html->css('home-search', null, array('inline' => false));
echo $this->Html->css('recordings-search', null, array('inline' => false));
    echo $this->Html->script('home-search', array('inline' => false));
?>