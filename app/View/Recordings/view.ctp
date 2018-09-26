<div class="recordings view">
<h2><?php  echo __('Recording'); ?></h2>
<dl>
	<dt><?php echo __('Id'); ?></dt>
	<dd>
		<?php echo h($recording['Recording']['id']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Recording no.'); ?></dt>
	<dd>
		<?php echo h($recording['Recording']['no']); ?>
		&nbsp;
	</dd>	
	<dt><?php echo __('Name'); ?></dt>
	<dd>
		<?php echo h($recording['Recording']['name']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Format'); ?></dt>
	<dd>
		<?php echo $this->Html->link($recording['Format']['format'], array('controller' => 'formats', 'action' => 'view', $recording['Format']['id'])); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Company'); ?></dt>
	<dd>
		<?php echo $this->Html->link($recording['Company']['company'], array('controller' => 'companies', 'action' => 'view', $recording['Company']['id'])); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Catalog no.'); ?></dt>
	<dd>
		<?php echo h($recording['Recording']['catalog']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Recording note'); ?></dt>
	<dd>
		<?php echo $this->Html->link($recording['Comprecordingnote']['note'], array('controller' => 'comprecordingnotes', 'action' => 'view', $recording['Comprecordingnote']['id'])); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Ancillary music'); ?></dt>
	<dd>
		<?php echo $this->Html->link($recording['Ancillarymusic']['name'], array('controller' => 'ancillarymusics', 'action' => 'view', $recording['Ancillarymusic']['id'])); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Presentation'); ?></dt>
	<dd>
		<?php echo $this->Html->link($recording['Presentation']['presentation'], array('controller' => 'presentations', 'action' => 'view', $recording['Presentation']['id'])); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Recording date'); ?></dt>
	<dd>
		<?php echo h($recording['Recording']['recordingdate']); ?>
		&nbsp;
	</dd>
    <dt><?php echo __('Notes'); ?></dt>
    <dd>
        <?php echo h($recording['Recording']['notes']); ?>
        &nbsp;
    </dd>
</dl>

<?php
	// CHOIR - DIRECTORS
	echo '<div class="input text divider"><label for="Choir">Choirs-Directors</label></div>';
	
	if( count($recsingers)>0 ) {	
		$singers_display = '';

		foreach($recsingers as $i=>$elem) {		
			// Display
			$singers_display.= '<tr>';
            $singers_display.= '<td>' . $elem['Singer']['Choir']['choir'] . '</td>';
            $singers_display.= '<td>' . $elem['Singer']['Director']['name'] . '</td>';			
        	$singers_display.= '</tr>';
		}
?>
		<!-- Render Display -->
		<div class="inner">
			<table cellpadding="0" cellspacing="0" style="border-bottom: 2px solid #555;">
				<tr class="border-top">
            		<th>CHOIR(S)</th>
            		<th>DIRECTOR(S)</th>
        		</tr>
        		<?php echo $singers_display; ?>
        	</table>
        </div>
<?php
}

    /*
    echo '<pre>';
    print_r($recsongs);
    die;
    */

    // COMPOSITIONS - COMPOSERS
    echo '<div class="input text divider"><label for="Composition">Composers-Compositions</label></div>';

    if( count($recsongs)>0 ) {
        $songs_display = '';

        foreach($recsongs as $i=>$elem) {
            // Display
            $songs_display.= '<tr>';
            $songs_display.= '<td>' . $elem['Song']['Composer']['name'] . '</td>';
            $songs_display.= '<td>' . $elem['Song']['Composition']['title'] . '</td>';
            $songs_display.= '<td>' . $elem['Song']['Composition']['Genre']['genre'] . '</td>';
            $songs_display.= '</tr>';
        }
    ?>
    <!-- Render Display -->
    <div class="inner">
        <table cellpadding="0" cellspacing="0" style="border-bottom: 2px solid #555;">
            <tr class="border-top">
                <th>COMPOSER(S)</th>
                <th>COMPOSITION(S)</th>
                <th>GENRE</th>
            </tr>
            <?php echo $songs_display; ?>
        </table>
    </div>
<?php
    }
?>

</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
    <?php
		$this->Authorize->echoIfAdmin($this->Html->link(__('Edit Recording'), array('action' => 'edit', $recording['Recording']['id'])), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Form->postLink(__('Delete Recording'), array('action' => 'delete', $recording['Recording']['id']), null, __('Are you sure you want to delete # %s?', $recording['Recording']['id'])), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Html->link(__('List Recordings'), array('action' => 'index')), true);
		$this->Authorize->echoIfAdmin($this->Html->link(__('Add Recording'), array('action' => 'add')), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Html->link(__('List Formats'), array('controller' => 'formats', 'action' => 'index')), true);
		$this->Authorize->echoIfAdmin($this->Html->link(__('Add Format'), array('controller' => 'formats', 'action' => 'add')), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')), true);
		$this->Authorize->echoIfAdmin($this->Html->link(__('Add Company'), array('controller' => 'companies', 'action' => 'add')), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Html->link(__('List Recording Notes'), array('controller' => 'comprecordingnotes', 'action' => 'index')), true);
		$this->Authorize->echoIfAdmin($this->Html->link(__('Add Recording Note'), array('controller' => 'comprecordingnotes', 'action' => 'add')), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Html->link(__('List Ancillary Musics'), array('controller' => 'ancillarymusics', 'action' => 'index')), true);
		$this->Authorize->echoIfAdmin($this->Html->link(__('Add Ancillary Music'), array('controller' => 'ancillarymusics', 'action' => 'add')), $isAdmin);
		$this->Authorize->echoIfAdmin($this->Html->link(__('List Presentations'), array('controller' => 'presentations', 'action' => 'index')), true);
		$this->Authorize->echoIfAdmin($this->Html->link(__('Add Presentation'), array('controller' => 'presentations', 'action' => 'add')), $isAdmin);
    ?>
	</ul>
</div>
