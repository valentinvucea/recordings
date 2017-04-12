<div>
    <div class="grid-1-4 fleft">
    <?php 
        echo '<h2 style="margin-bottom: 5px;">' . __('Records') . '</h2>';
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
			
			echo '<tr>';
			echo '<td class="grid-3-12">' . __('Format') . '</td>';
			echo '<td class="grid-9-12"><strong>' . h($recording['Format']['format']) . '</strong></td>';
			echo '</tr>';			

			echo '<tr>';
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
		<li style="margin: 0px; "><?php echo $this->Html->link(__('Add new record'), array('action' => 'add', $recording['Recording']['id']), array('id' => 'btnAddRecord', 'title' => $add_title)); ?></li>
	</ul>
</div>

<div class="inner">
	<table cellpadding="0" cellspacing="0" class="recs">
        <tr class="border-top">
                <th class="text-center">NR.</th>
                <th>COMPOSITION</th>
                <th>COMPOSER(S)</th>
                <th>CHOIR(S)</th>            
                <th>DIRECTOR(S)</th>			
                <th class="actions text-center grid-1-10"><?php echo __('Actions'); ?></th>
        </tr>
        
        <?php
			$no = 1;
			
			foreach ($records as $record) { 
				echo '<tr>';
				echo '<td class="text-center">' . h($no) . '</td>';
				echo '<td><em>' . h($record['Composition']['title']) . '</em></td>';
				
				echo '<td>';
					echo '<ul>';
					foreach(h($record['Reccomposer']) as $key=>$composer) {
						echo '<li>' . $composer['Composer']['name'] . '</li>';
					}
					echo '</ul>';
				echo '</td>';
				
				echo '<td>';
					echo '<ul>';
					foreach($record['Recchoir'] as $key=>$choir) {
						echo '<li>' . $choir['Choir']['choir'];
						if( !empty($choir['Choir']['city']) )
							echo ', ' . $choir['Choir']['city'];
						if( $choir['Choir']['State']['id'] != 'XX' )
							echo ', ' . $choir['Choir']['State']['id'];						
						echo '</li>';
					}
					echo '</ul>';
				echo '</td>';				
				
				echo '<td>';
					echo '<ul>';
					foreach($record['Recdirector'] as $key=>$director) {
						echo '<li>' . $director['Director']['name'];
						if( $director['Director']['Position']['position'] != '' )
							echo '<br/>(' . $director['Director']['Position']['position'] . ')';	
						echo '</li>';
					}
					echo '</ul>';
				echo '</td>';
				
				echo '<td class="actions">';					
					echo $this->Html->link(__('Edit'), array('action' => 'edit', $record['Record']['id'], 'db'), array('class' => 'btnEditRecord', 'title' => $edit_title . '|' . $record['Record']['id'] ));
					echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $record['Record']['id'], $record['Record']['recording_id'] ), null, __('Are you sure you want to delete # %s?', $record['Record']['id']));		
				echo '</td>';
				echo '</tr>';
				$no++;
			}
		?>
	</table>
</div>

<?php
	echo $this->Html->css('jquery-ui', null, array('inline' => false));
	echo $this->Html->script('/js/jquery-ui.min');	
	echo $this->Html->script('/js/paging-functions');
	echo $this->Html->script('/js/records-index');	