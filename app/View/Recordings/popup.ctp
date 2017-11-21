<div>
    <div class="grid-1-1 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 15px;">' . __('Link compositions, composers, choirs, directors') . '</h2>';
    ?>
    </div>
</div>

<br />

<div class="inner bg-lightgrey rounded grey-bordered" style="padding: 0px 15px 5px 15px; ">
	<table cellpadding="0" cellspacing="0" style="margin-bottom: 0;">
		<?php
			echo '<tr>';
			echo '<td class="grid-1-10">' . __('Id') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Recording']['id'] . '</strong></td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td class="grid-3-12">' . __('Recording name') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Recording']['name'] . '</strong></td>';
			echo '</tr>';
			
			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Format') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Format']['format'] . '</strong></td>';
			echo '</tr>';			

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Company') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Company']['company'] . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Catalog') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Recording']['catalog'] . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Presentation') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Presentation']['presentation'] . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Notes') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Recording']['notes'] . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Ancillary music') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Ancillarymusic']['name'] . '</strong></td>';
			echo '</tr>';

			echo '<tr class="extra hidden">';
			echo '<td class="grid-3-12">' . __('Notes') . '</td>';
			echo '<td class="grid-9-12"><strong>' . $recording['Recordingnote']['recording_note'] . '</strong></td>';
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
	// COMPOSITIONS - COMPOSERS
	echo '<div class="input text"><label for="Composition">Compositions - composers</label></div>';
	
	if( isset($recsongs) && count($recsongs)>0 ) {	
		$songs_display = '';

		foreach($recsongs as $i=>$elem) {
			// Display
			$songs_display.= '<tr>';
			$songs_display.= '<td class="text-center">' . $elem['song_id'] . '</td>';
            $songs_display.= '<td>' . $elem['composition_id'] . '. ' . $elem['composition'] . '</td>';
            $songs_display.= '<td>' . $elem['composer_id'] . '. ' . $elem['composer'] . '</td>';			
            $songs_display.= '<td class="actions">';
            $songs_display.= $this->Html->link(__('View'), array('controller'=>'Songs', 'action' => 'view', $elem['song_id']));
            $songs_display.= $this->Html->link(__('Delete'), array('action' => 'linkdel/Songs-' . $i), array('class'=>'delete'));
            $songs_display.= '</td>';
        	$songs_display.= '</tr>';
		}
?>
		<!-- Render Display -->
		<div class="inner">
			<table cellpadding="0" cellspacing="0" style="border-bottom: 2px solid #555;">
				<tr class="border-top">
					<th class="text-center">#</th>
            		<th>COMPOSITION(S)</th>
            		<th>COMPOSER(S)</th>
            		<th class="actions text-center grid-1-10">Actions</th>
        		</tr>
        		<?php echo $songs_display; ?>
        	</table>
        </div>
<?php
	}

	// CHOIR - DIRECTOR
	echo '<div class="input text"><label for="Choir">Choirs - directors</label></div>';
	
	if( isset($recsingers) && count(recsingers)>0 ) {	
		$singers_display = '';

		foreach($recsingers as $i=>$elem) {
			// Display
			$singers_display.= '<tr>';
			$singers_display.= '<td class="text-center">' . $elem['singer_id'] . '</td>';
            $singers_display.= '<td>' . $elem['choir_id'] . '. ' . $elem['choir'] . '</td>';
            $singers_display.= '<td>' . $elem['director_id'] . '. ' . $elem['director'] . '</td>';			
            $singers_display.= '<td class="actions">';
            $singers_display.= $this->Html->link(__('View'), array('controller'=>'Singers', 'action' => 'view', $elem['singer_id']));
            $singers_display.= $this->Html->link(__('Delete'), array('action' => 'linkdel/Singers-' . $i), array('class'=>'delete'));
            $singers_display.= '</td>';
        	$singers_display.= '</tr>';
		}
?>
		<!-- Render Display -->
		<div class="inner">
			<table cellpadding="0" cellspacing="0" style="border-bottom: 2px solid #555;">
				<tr class="border-top">
					<th class="text-center">#</th>
            		<th>CHOIR(S)</th>
            		<th>DIRECTOR(S)</th>
            		<th class="actions text-center grid-1-10">Actions</th>
        		</tr>
        		<?php echo $singers_display; ?>
        	</table>
        </div>
<?php
	}	
?>
</div>

<?php 
	echo $this->Html->css('jquery-ui', null, array('inline' => false));
	echo $this->Html->script('/js/jquery-ui.min');	
	echo $this->Html->script('/js/paging-functions');
	echo $this->Html->script('/js/links-ajax');
?>