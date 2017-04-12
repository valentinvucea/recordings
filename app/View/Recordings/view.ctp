<div class="recordings view">
<h2><?php  echo __('Recording'); ?></h2>
<dl>
	<dt><?php echo __('Id'); ?></dt>
	<dd>
		<?php echo h($recording['Recording']['id']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Rec. no'); ?></dt>
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
	<dt><?php echo __('Catalog'); ?></dt>
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
	<dt><?php echo __('Notes'); ?></dt>
	<dd>
		<?php echo h($recording['Recording']['notes']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Recording date'); ?></dt>
	<dd>
		<?php echo h($recording['Recording']['recordingdate']); ?>
		&nbsp;
	</dd>
</dl>

<?php
	
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
?>



</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recording'), array('action' => 'edit', $recording['Recording']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recording'), array('action' => 'delete', $recording['Recording']['id']), null, __('Are you sure you want to delete # %s?', $recording['Recording']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recordings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Formats'), array('controller' => 'formats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Format'), array('controller' => 'formats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recording Notes'), array('controller' => 'comprecordingnotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recording Note'), array('controller' => 'comprecordingnotes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ancillary Musics'), array('controller' => 'ancillarymusics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ancillary Music'), array('controller' => 'ancillarymusics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Presentations'), array('controller' => 'presentations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Presentation'), array('controller' => 'presentations', 'action' => 'add')); ?> </li>
	</ul>
</div>
