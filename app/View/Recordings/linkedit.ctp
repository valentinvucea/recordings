<div>
    <div class="grid-1-1 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 15px;">' . __('Link choirs, directors, composers, compositions') . '</h2>';
    ?>
    </div>
</div>

<br />

<div class="inner bg-lightgrey rounded grey-bordered" style="padding: 0px 15px 5px 15px; ">
	<table cellpadding="0" cellspacing="0" style="margin-bottom: 0;">
		<?php
			echo '<tr>';
			echo '<td class="grid-1-10">ID</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Recording']['id']) . '</strong></td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td class="grid-1-10">Recording no.</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Recording']['no']) . '</strong></td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td class="grid-3-12">' . __('Recording name') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Recording']['name']) . '</strong></td>';
			echo '</tr>';
			
			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Format') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Format']['format']) . '</strong></td>';
			echo '</tr>';			

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Company') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Company']['company']) . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">Catalog no.</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Recording']['catalog']) . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Presentation') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Presentation']['presentation']) . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Notes') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Recording']['notes']) . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Ancillary music') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Ancillarymusic']['name']) . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Notes') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Comprecordingnote']['note']) . '</strong></td>';
			echo '</tr>';			
		?>
	</table>
</div>

<div class="actions-top fright" style="padding: 15px 0px;">
	<ul style="margin: 0px; ">
		<li style="margin: 0px; "><?php echo $this->Html->link(__('Show more'), array('controller' => '#'), array('class' => 'show-more')); ?></li>
	</ul>
</div>

<div class="actions-top" style="padding: 15px 0px;">
	<ul style="margin: 0px; ">
		<li style="margin: 0px; "><?php echo $this->Html->link(__('Back to list'), array('action' => 'index', $recording['Recording']['id'])); ?></li>
	</ul>
</div>

<hr style="border: 0; border-top: 2px solid black; margin-top: 8px; margin-bottom: 15px;" />

<div class="records">
<?php 
	echo $this->Form->create('Recording');	
	
	echo $this->Form->input('recording_id', array('type' => 'hidden', 'value' => $recording['Recording']['id']));

    // CHOIR - DIRECTOR
    echo '<div class="input text"><label for="Choir">Choirs - Directors</label></div>';

    if( isset($links['Singers']) && count($links['Singers'])>0 ) {
        $recsingers = $links['Singers'];
        $singers_display = '';

        foreach($recsingers as $i=>$elem) {
            // Hidden
            echo $this->Form->input('Recsinger.' . $i . '.singer_id', array('type' => 'hidden', 'value' => $elem['singer_id']));
            echo $this->Form->input('Recsinger.' . $i . '.id', array('type' => 'hidden', 'value' => $elem['id']));

            // Display
            $singers_display.= '<tr>';
            $singers_display.= '<td>' . $elem['choir'] . '</td>';
            $singers_display.= '<td>' . $elem['city'] . '</td>';
            $singers_display.= '<td>' . $elem['director'] . '</td>';
            $singers_display.= '<td class="actions">';
            $singers_display.= $this->Html->link(__('View'), array('controller'=>'Singers', 'action' => 'view', $elem['singer_id']));
            $singers_display.= $this->Html->link(__('Unlink'), array('action' => 'linkdel/Singers-' . $i), array('class'=>'delete'));
            $singers_display.= '</td>';
            $singers_display.= '</tr>';
        }
        ?>
        <!-- Render Display -->
        <div class="inner">
            <table cellpadding="0" cellspacing="0" style="border-bottom: 2px solid #555;">
                <tr class="border-top">
                    <th>CHOIR(S)</th>
                    <th>CITY</th>
                    <th>DIRECTOR(S)</th>
                    <th class="actions text-center grid-1-10">Actions</th>
                </tr>
                <?php echo $singers_display; ?>
            </table>
        </div>
        <?php
    }
    echo $this->Html->link('Link Choir - Director', '/Singers/index', array('class' => 'jump first'));

	// COMPOSITIONS - COMPOSERS
	echo '<div class="input text"><label for="Composition">Composers - Compositions</label></div>';
	
	if( isset($links['Songs']) && count($links['Songs'])>0 ) {	
		$recsongs = $links['Songs'];
		$songs_display = '';

		foreach($recsongs as $i=>$elem) {
			// Hidden
			echo $this->Form->input('Recsong.' . $i . '.song_id', array('type' => 'hidden', 'value' => $elem['song_id']));
			echo $this->Form->input('Recsong.' . $i . '.id', array('type' => 'hidden', 'value' => $elem['id']));
			
			// Display
			$songs_display.= '<tr>';
            $songs_display.= '<td>' . $elem['composer'] . '</td>';
            $songs_display.= '<td>' . $elem['composition'] . '</td>';
            $songs_display.= '<td>' . $elem['genre'] . '</td>';            
            $songs_display.= '<td class="actions">';
            $songs_display.= $this->Html->link(__('View'), array('controller'=>'Songs', 'action' => 'view', $elem['song_id']));
            $songs_display.= $this->Html->link(__('Unlink'), array('action' => 'linkdel/Songs-' . $i), array('class'=>'delete'));
            $songs_display.= '</td>';
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
            		<th class="actions text-center grid-1-10">Actions</th>
        		</tr>
        		<?php echo $songs_display; ?>
        	</table>
        </div>
<?php
	}
	echo $this->Html->link('Link Composer - Composition', '/Songs/index', array('class' => 'jump first'));
	
	echo $this->Form->end(__('Submit')); 
?>
</div>


<?php 
	echo $this->Html->css('jquery-ui', null, array('inline' => false));
	echo $this->Html->script('/js/jquery-ui.min');	
	echo $this->Html->script('/js/paging-functions');
	echo $this->Html->script('/js/links-ajax');
?>