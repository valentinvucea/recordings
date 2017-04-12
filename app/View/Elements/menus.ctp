<!-- Navbar
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="../">Rezidenti<strong>Manager</strong></a>
			
          	<div class="nav-collapse collapse">
			  <ul class="nav">
					<li><a href="/rezidentis/listare"><i class="icon-home icon-white"></i> Rezidenti</a></li>
					<li class="divider-vertical"></li>
					<!--
					<li><a href="/medicis/listare"><i class="icon-home icon-white"></i> Medici specialisti</a></li>
					<li class="divider-vertical"></li>
                  	<li class="dropdown" id="preview-menu">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-signal icon-white"></i> Utile <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/help/tutorial">Tutorial de utilizare</a></li>
							<li class="divider"></li>							
							<li><a href="#">Nomenclatoare</a></li>
							<li class="divider"></li>
							<li><a href="/help/specialitati">Specialitati</a></li>							
							<li><a href="/help/spitale">Spitale</a></li>							
						</ul>
					</li>
					<li class="divider-vertical"></li>					
					<li><a href="/messages/inbox"><i class="icon-envelope icon-white"></i> Mesaje</a></li>
					<li class="divider-vertical"></li>
					-->
				</ul>
                <div class="pull-right">
                    <ul class="nav pull-right">
	                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Logat ca <strong><?php echo $this->Session->read('Auth.User.realname'); ?></strong> <b class="caret"></b></a>
	                        <ul class="dropdown-menu">
	                            <li><a href="/settings/parola"><i class="icon-cog"></i> Setari</a></li>
								<!--
	                            <li><a href="/settings/contact"><i class="icon-envelope"></i> Contact</a></li>
								-->
	                            <li class="divider"></li>
	                            <li><a href="/users/logout"><i class="icon-off"></i> Logout</a></li>
	                        </ul>
	                    </li>
                	</ul>
              	</div>
            </div>
        </div>
    </div>
</div>

<?php
	echo $this->Sbmenu->getsbmenu($this->params['controller'], $this->action, $idrezident);
?>
