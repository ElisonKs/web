<html lang="pt-BR">
<head>
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Maes | Painel Administrativo</title>
	
	<link href="<?php echo base_url('assets/css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/metisMenu/metisMenu.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/timeline.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/dataTables.bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/social-buttons.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/sb-admin-2.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/css/dashboard.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/fileinput/fileinput.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/file_upload/jquery.fileupload.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/plugins/file_upload/jquery.fileupload-ui.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet" media="screen">

	</head>
<body>
<!--	<audio id="som">-->
<!--    	<source src="assets/sounds/alerta.mp3"/>-->
<!--	</audio>-->

	<div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo site_url('')?>">Método de Avaliação para Estratégia Incremental (MAES)</a>
			</div>
		
			<ul class="nav navbar-top-links navbar-right">
			
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>
							{RAZSCEMP}
						<i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						
						
						<li>
							<a  href="<?php echo site_url('login')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
			</ul>
		
			<div class="navbar sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">                        
						<li>
							<a class="active" href="<?php echo site_url('')?>"><i class="fa fa-dashboard fa-fw"></i> <strong>Principal</strong></a>
						</li>
						<li>
							<a  href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Avaliações<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								
                               

								
								
								<li>
									<a style="{DISPLAY_CAMBISTA}" href="<?php echo site_url('aplicacao')?>">Nova Avaliação</a>
								</li>
								
								<li>
									<a style="{DISPLAY_CAMBISTA}" href="<?php echo site_url('lista_resultado')?>">Resultados</a>
								</li>
								
								
								
								
								
								
								
								



<!-- 								                                -->


								<li>
									<hr style="{DISPLAY_VALLESOFT_C}" />  
								</li>  
								                             


								
							</ul>
						</li>
						
						
					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
		</nav>
	</div>
	
	<div id="page-wrapper">
		{MENSAGEM_SISTEMA_ERRO}
		{MENSAGEM_SISTEMA_SUCESSO}
		{CONTEUDO}
	</div>
	
	
	<script src="<?php echo base_url('assets/js/jquery-1.11.0.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.maskedinput.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.fileupload.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.fileupload-process.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.fileupload-image.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.fileupload-validate.js')?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.fileupload-ui.js')?>"></script>	
    <script src="<?php echo base_url('assets/js/plugins/fileinput/fileinput.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/fileinput/fileinput.js')?>"></script>	
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>		
	<script src="<?php echo base_url('assets/js/plugins/metisMenu/metisMenu.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/sb-admin-2.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jasny-bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/dataTables/jquery.dataTables.js')?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.alphanumeric.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.maskMoney.js')?>"></script>
	
	<script>
	    $(document).ready(function() {
	        $('#tb_segmento').dataTable({"order": [[ 1, "asc" ]]});
            $('#tb_plano').dataTable({"order": [[ 1, "asc" ]]});
	        $('#tb_cambio').dataTable({"order": [[ 1, "asc" ]]});
	        $('#tb_cargo').dataTable({"order": [[ 1, "asc" ]]});
	        $('#tb_rede_social').dataTable({"order": [[ 1, "asc" ]]});
	        $('#tb_forma_pagamento').dataTable({"order": [[ 1, "asc" ]]});
	        $('#tb_responsavel').dataTable({"order": [[ 1, "asc" ]]});
	        $('#tb_empresa').dataTable({"order": [[ 1, "asc" ]]});
	        $('#tb_empresa_segmento').dataTable({"order": [[ 1, "asc" ]]});
	        $('#tb_perfil').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_usuario').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_telefone').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_tamanho').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_adicional').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_categoria').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_horario').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_empresa_forma_pagamento').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_empresa_rede_social').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_area_entrega').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_area_nao_entrega').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_categoria_tamanho').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_categoria_adicional').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_produto').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_produto_adicional').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_produto_tamanho').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_produto_produto').dataTable({"order": [[ 0, "asc" ]]});
	        $('#tb_entregador').dataTable({"order": [[ 0, "asc" ]]});
            $('input.numero').numeric();
	        $("input.dinheiro").maskMoney({showSymbol:true, symbol:"R$ ", decimal:",", thousands:"."});
		});
	</script>
    <script type="text/javascript">


  </script>	
  

</body>		
</html>
