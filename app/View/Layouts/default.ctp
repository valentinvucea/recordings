<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Choirs recordings database');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');	
		echo $this->Html->css('font-awesome.min');			

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('custom');		
	?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="/js/custom.js"></script>
</head>
<body>
	<div id="container">
		
		<div id="header">
			<div style="float: right;">
				<h1 class="clean"><a href="#" id="clean-sessions">Clean</a></h1>
				<h1 class="logout"><?php echo $this->Html->link('Log out', '/Users/logout'); ?></h1>
			</div>
			
			<h1 class="title"><?php echo $this->Html->link('Music Catalog', '/'); ?></h1>
			
			<ul>		
				<li><a href="/Recordings/index">Recordings</a></li>
                <li><a href="/Choirs/index">Choirs</a></li>
                <li><a href="/Directors/index">Directors</a></li>
				<li><a href="/Composers/index">Composers</a></li>
                <li><a href="/Compositions/index">Compositions</a></li>
				<br/>
                <li><a href="/Singers/current">Choirs-Directors</a></li>
				<li><a href="/Songs/current">Composers-Compositions</a></li>
				<li><a href="/Recordings/current">Add/Confirm Links</a></li>				
			</ul>
		</div>
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
		
	<div id="popup" class="overlay">
		<a href="#" id="close-popup" class="closebtn">&times;</a>
		<div class="overlay-content"></div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>

    <script src="/js/custom.js"></script></body>
</html>
