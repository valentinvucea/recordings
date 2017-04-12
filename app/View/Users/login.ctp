<?php
echo $this->Session->flash();

echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));
?>
	<input type="text" id="UserUsername" class="span4" name="data[User][username]" placeholder="Username">
	<input type="password" id="password" class="span4" name="data[User][password]" placeholder="Password">
	<input id="RememberMe" name="RememberMe" type="hidden" value="true">
	<button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
</form>
