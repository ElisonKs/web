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
.row-tabela{
background: rgba(76, 175, 80, 0.5)
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

<div align="center>	
<div class="panel panel-default" align="center">
    <div class="panel-body" >
        <div class="row-tabela">
            <div class="col-lg-20">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed" id="tb_jogo">
						<thead>
                           
                        </thead> 
                        <tbody>
                        
                       
                        
                        	{BLC_DADOS}
	                            <tr>
	                           
	                              
        <div class="col-md-12" align="center">
         <span class="badge">{NOME_CAMPEONATO}</span>
            <div class='col-md-12 card bordered'>
                <div class="col-md-12 text-center">
                    <h4>{NOME_EQUIPECASA} X {NOME_EQUIPEFORA}</h4>
                </div>
                  <div class="col-md-12 text-center">
                    <h4>{HORA_JOGO}</h4>
                </div>
                 <div class="col-md-12 text-center">
                    <h4>{GOLSEQUIPE1_JOGO}   x   {GOLSEQUIPE2_JOGO}</h4>
                </div>
                
                <div class="row bottom">
                 
                       
                       <div class="lbl-group" data-toggle="labels">
			   <button type="button" class="btn btn-primary">XC <span class="badge">{VALORCASA_JOGO}</span></button> 
			   <button type="button" class="btn btn-primary">XF <span class="badge">{VALORFORA_JOGO}</span></button> 			      
			   <button type="button" class="btn btn-primary">Emp. <span class="badge">{VALOREMPATE_JOGO}</span></button> 			 
			   <button type="button" class="btn btn-primary">DPC <span class="badge">{VALORDUPLACASA_JOGO}</span></button> 
			   <button type="button" class="btn btn-primary">DPF <span class="badge">{VALORDUPLAFORA_JOGO}</span></button> 
			   <button type="button" class="btn btn-primary">GMC <span class="badge">{VALORGOLMEIOCASA_JOGO}</span></button>
			   <button type="button" class="btn btn-primary">GMF <span class="badge">{VALORGOLMEIOFORA_JOGO}</span></button> 		    		   		   
	  		   <button type="button" class="btn btn-primary">Amb. <span class="badge">{VALORAMBOSMARCAM_JOGO}</span></button> 
			   <button type="button" class="btn btn-primary">NA <span class="badge">{VALORNAOAMBOS_JOGO}</span></button> 
			   <button type="button" class="btn btn-primary"> &plus;2.5 <span class="badge">{VALORMAISDOISGOLSEMEIO_JOGO}</span></button> 		     		   
			   <button type="button" class="btn btn-primary"> &minus;2.5 <span class="badge">{VALORMENOSDOISGOLSEMEIO_JOGO}</span></button> 		   
			
			
		 	
		 	</div>

               </div>
                
               
              
               </div>
               
                <div class="col-md-8">
                   
                    
                    <div class="row bottom">
                       
                    </div>
                </div>
            </div>
        </div>
	                            </tr>
                        	{/BLC_DADOS}
                        	
                        	
                        </tbody>                   
                    </table>
                </div>

               

            </div>
        </div>
    </div>
</div>
</div>

	
	<script src="<?php echo base_url('assets/js/jquery-1.11.0.js')?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/jasny-bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/plugins/metisMenu/metisMenu.min.js')?>"></script>
	<script src="<?php echo base_url('assets/js/sb-admin-2.js')?>"></script>
	
</body>
</html>



