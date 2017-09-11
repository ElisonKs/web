<!DOCTYPE html>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #ff2600;
}

li {
    float: left;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:visited {
    text-decoration: none;
}

li a:hover {
    background-color: #ff0000;
    color: white;
    text-decoration: none;
}


</style>
<html lang="pt" class="full">
<head>
	<meta charset="utf-8">
	<title>Mundial Futebol</title>
	
	<link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/metisMenu/metisMenu.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/timeline.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jasny-bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/full.css')?>" rel="stylesheet">



</head>
<body>
<ul>
  <li><a href="login">Login</a></li>
  <li><a href="tabela">Tabela</a></li>
  <li><a href="#contact">Conferir Aposta</a></li>
  
</ul>

	<form action="{ACAO_FORM}" role="form" method="post" class="form-horizontal">
		<div class="container-fluid" style="background:transparent;">
		
			<div class="row">
			
			
				{MENSAGEM_LOGIN_ERRO}
				<div class="col-md-4 col-md-offset-4">
				
					<div class="login-panel panel panel-default">
						
						<div class="panel-body">
								<div class="panel-heading">
							<h3 class="panel-title" align="center">
								<img src="../assets/images/logo.png">
							</h3>
						</div>
								
							
								
								<hr />	
								
								<div class="form-group {ERRO_LOGIN_CAMBISTA}">							
									<div class="col-sm-offset-1 col-sm-10">
										<input type="text" class="form-control" id="login_cambista" placeholder="Login"
											   name="login_cambista" value="" maxlength="15"/>
									</div>
								</div>
								
								<div class="form-group {ERRO_SENHA_CAMBISTA}">
									<div class="col-sm-offset-1 col-sm-10">
										<input class="form-control" placeholder="Senha" name="senha_cambista" type="password" value="" maxlength="8">
									</div>	
								</div>
								
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10">
										<button name="entrar" type="submit" class="btn btn-lg btn-primary btn-block"> <i class="fa fa-lock"></i> Entrar</button>
									</div>
								</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	
	<script src="<?php echo base_url('assets/js/jquery-1.11.0.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jasny-bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/metisMenu/metisMenu.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/sb-admin-2.js')?>"></script>
	
</body>
</html>
