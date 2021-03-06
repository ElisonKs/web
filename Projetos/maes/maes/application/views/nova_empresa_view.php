</style>
<html lang="pt">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	
	<title>Maes - Cadastrar Nova Empresa</title>
	
	<link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/metisMenu/metisMenu.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/timeline.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome-4.1.0/css/font-awesome.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/jasny-bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/full.css')?>" rel="stylesheet">



</head>
<body>


	<form action="{ACAO_FORM}" role="form" method="post" class="form-horizontal">
		<div class="container-fluid" style="background:transparent;">
		
			<div class="row">
			
			
				
				<div class="col-md-4 col-md-offset-4">
				
					<div class="login-panel panel panel-default">
						
						
								
							
								
								<hr />	
								<div class="form-group {ERRO_RAZSCEMP}">							
									<div class="col-sm-offset-1 col-sm-10">
										<input type="text" class="form-control" id="razscemp" placeholder="Raz���o Social"
											   name="razscemp" value="" maxlength="40"/>
									</div>
								</div>
								<div class="form-group {ERRO_CNPJCEMP}">							
									<div class="col-sm-offset-1 col-sm-10">
										<input type="text" class="form-control" id="cnpjcemp" placeholder="CPNJ"
											   name="cnpjcemp" value="" maxlength="40"/>
									</div>
								</div>
								<div class="form-group {ERRO_MAILCEMP}">							
									<div class="col-sm-offset-1 col-sm-10">
										<input type="text" class="form-control" id="mailcemp" placeholder="Email"
											   name="mailcemp" value="" maxlength="40"/>
									</div>
								</div>
								
								<div class="form-group {ERRO_CHAVCEMP}">
									<div class="col-sm-offset-1 col-sm-10">
										<input class="form-control" placeholder="Senha" name="chavcemp" type="password" value="" maxlength="8">
									</div>	
								</div>
								
								<div class="form-group">
									<div class="col-sm-offset-1 col-sm-10">
										<button name="entrar" type="submit" class="btn btn-lg btn-primary btn-block"> <i class="fa fa-lock"></i> Salvar</button>
										<button name="entrar" href="login" class="btn btn-lg  btn-block">  Cancelar</button>

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
