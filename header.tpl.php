<!-- HEADER 2 -->
<header id="header-2">

	<nav class="main-nav navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<img src="images/brand/bskit-logo-nostrap.png" class="brand-img img-responsive">
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li <?php if(isset($indexActive)){ echo "class='nav-item active'"; }else{ echo "class='nav-item'";} ?> ><a href="index.php">Home</a></li>
					<li <?php if(isset($cardapioActive)){ echo "class='nav-item active'"; }else{ echo "class='nav-item'";} ?>><a href="cardapio.php">Cardápio</a></li>                     
					<li <?php if(isset($contatoActive)){ echo "class='nav-item active'"; }else{ echo "class='nav-item'";} ?>><a href="contato.php">Contato</a></li>
				</ul>
				<?php if(isset($_SESSION['name'])){ 
	                echo "
	                <p class='navbar-text' style='padding-top:20px;'>Logado como ".$_SESSION['name']." <a href='#' id='logout'>Sair</a></p>
	                ";
	            }else { 
	                echo "
	                <form class='navbar-form navbar-right' role='search' style='padding-top:5px;'>
				        <div class='form-group'>
				        	<input type='text' class='form-control' id='email' placeholder='Email'>
				        </div>
				        <div class='form-group'>
				        	<input type='password' class='form-control' id='password' placeholder='Senha'>
				        </div>
				        <button class='btn btn-default' id='try_login'>Entrar</button>
			    	</form>
			    	";
	            } ?> 
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

</header>
<!-- // End HEADER 2 -->