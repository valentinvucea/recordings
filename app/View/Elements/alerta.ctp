<?php
	switch(substr($message, 0, 1))
	{
		case '@': $alert = '-error'; $message = substr($message, 1); break;
		case '|': $alert = '-success'; $message = substr($message, 1); break;
		default: $alert = '-info'; break; 
	}
	
	echo '<div class="alert alert' . $alert . '">';
	echo '<a class="close" data-dismiss="alert" href="#">×</a>' . $message;
	echo '</div>';
?>
