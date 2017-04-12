<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Edit record') . '</h2>';
    ?>
    </div>
</div>

<br />

<div class="inner bg-lightgrey rounded grey-bordered" style="padding: 0px 15px 5px 15px; ">
	<table cellpadding="0" cellspacing="0" style="margin-bottom: 0;">
		<?php
			echo '<tr>';
			echo '<td class="grid-1-10">' . __('Id') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Recording']['id']) . '</strong></td>';
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
			echo '<td class="grid-3-12">' . __('Catalog') . '</td>';
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
			echo '<td class="grid-9-12"><strong>' . h($recording['Recordingnote']['recording_note']) . '</strong></td>';
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
	echo $this->Form->create('Record');	

	echo $this->Form->input('id', array('type' => 'hidden', 'value' => $recs['Record']['id']));	
	echo $this->Form->input('recording_id', array('type' => 'hidden', 'value' => $recording['Recording']['id']));
	
	// COMPOSITION
	echo '<div class="input text"><label for="Composition">Composition</label></div>';
	
	
	
	if( isset($recs['Composition']) ) {
		// Hidden
		echo $this->Form->input('composition_id', array('type' => 'hidden', 'value' => $recs['Composition'][0]['id']));
		// Display
		$after_icons = $this->Icon->trash('Composition', $recs['Composition'][0]['id'], '/Records/trash/Composition/' . $recs['Composition'][0]['id']) . ' ' . $this->Icon->pencil('Composition', $recs['Composition'][0]['id'], '/Compositions/edit/' . $recs['Composition'][0]['id']);
		echo $this->Form->input('x_composition_id', array('type' => 'text', 'readonly' => 'readonly', 'label' => false, 'value' => $recs['Composition'][0]['name'], 'after' => $after_icons));
	} else {
		echo $this->Html->link('Add composition', '/Records/jump/Compositions', array('class' => 'jump first'));
	}
	
	// COMPOSER(S)
	echo '<div class="input text"><label for="Composer">Composer(s)</label></div>';
	
	if( isset($recs['Composer']) ) {
		$reccomposers = $recs['Composer'];
		$no = 0;
	
		foreach($reccomposers as $key=>$val) {
			// Hidden
			echo $this->Form->input('Composer.' . $no . '.composer_id', array('type' => 'hidden', 'value' => $val['id']));
			// Display
			$after_icons = $this->Icon->trash('Composer', $val['id'], '/Records/trash/Composer/' . $val['id']) . ' ' . $this->Icon->pencil('Composer', $val['id'], '/Composers/edit/' . $val['id']);
			echo $this->Form->input('x_composer_id_.' . $no, array('type' => 'text', 'label' => false, 'value' => $val['name'], 'after' => $after_icons));
			$no++;
		}
	}
	
	echo $this->Html->link('Add composer', '/Records/jump/Composers', array('class' => 'jump first'));
	
	// CHOIR(S)
	echo '<div class="input text"><label for="Choir">Choir(s)</label></div>';
	
	if( isset($recs['Choir']) ) {
		$recchoirs = $recs['Choir'];
		$no = 0;
		
		foreach($recchoirs as $key=>$val) {
			// Hidden
			echo $this->Form->input('Choir.' . $no . '.choir_id', array('type' => 'hidden', 'value' => $val['id']));
			// Display
			$after_icons = $this->Icon->trash('Choir', $val['id'], '/Records/trash/Choir/' . $val['id']) . ' ' . $this->Icon->pencil('Choir', $val['id'], '/Choirs/edit/' . $val['id']);			
			echo $this->Form->input('x_choir_id_.' . $no, array('type' => 'text', 'label' => false, 'value' => $val['name'], 'after' => $after_icons));
			$no++;
		}
	}
	
	echo $this->Html->link('Add choir', '/Records/jump/Choirs', array('class' => 'jump first'));

	// DIRECTOR(S)
	echo '<div class="input text"><label for="Director">Director(s)</label></div>';
	
	if( isset($recs['Director']) ) {	
		$recdirectors = $recs['Director'];
		$no = 0;
		
		foreach($recdirectors as $key=>$val) {
			// Hidden
			echo $this->Form->input('Director.' . $no . '.director_id', array('type' => 'hidden', 'value' => $val['id']));
			// Display
			$after_icons = $this->Icon->trash('Director', $val['id'], '/Records/trash/Directors/' . $val['id']) . ' ' . $this->Icon->pencil('Director', $val['id'], '/Directors/edit/' . $val['id']);
			echo $this->Form->input('x_director_id_.' . $no, array('type' => 'text', 'label' => false, 'value' => $val['name'], 'after' => $after_icons));
			$no++;
		}
	}
	
	echo $this->Html->link('Add director', '/Records/jump/Directors', array('class' => 'jump first'));
	/*
	echo $this->Form->input('order', array('type' => 'text', 'label' => 'Order', 'style' => 'width: 100px; '));

	*/
	
	echo $this->Form->end(__('Submit')); 
?>
</div>


<?php 
	echo $this->Html->css('jquery-ui', null, array('inline' => false));
	echo $this->Html->script('/js/jquery-ui.min');	
	echo $this->Html->script('/js/paging-functions');
	echo $this->Html->script('/js/records-ajax');
?>