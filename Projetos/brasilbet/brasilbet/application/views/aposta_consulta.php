<div class="row">
	<div class="col-lg-12">
        <h2 class="page-header">
        	Nova Aposta     
		   
	    </h2>	
    </div>    
</div>

<div class="panel panel-default">
<div class="panel-body">

				<div class="{JOGADOR_APOSTA} ">
					<label for="jogador_aposta" class="col-sm-1 control-label">Jogador</label>
					<div class="col-sm-4">
						<input type="text" class="form-control " id="jogador_aposta"  
							   style="text-align: right;" name="jogador_aposta" value="" maxlength="20"/>
					</div>
				</div>
				
				<div class="{ERRO_VALORCASA_JOGO} ">
					<label for="valorcasa_jogo" class="col-sm-1 control-label">Valor</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valor_aposta"  
							   style="text-align: right;" name="valor_aposta" value="0" maxlength="20"/>
					</div>
				</div>	
				
				<div class="{ERRO_VALORCASA_JOGO} ">
					<label for="valorcasa_jogo" class="col-sm-1 control-label ">Prêmio</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro disabled" id="premio"  
							   style="text-align: right;" name="premio" value="0" maxlength="20"/>
					</div>
				</div>	
				
				 <div>
                    			<a onclick="atualizarApostas()" title="Atualizar" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i> Atualizar</a>
		                </div>
	</div>

    <div class="panel-body">
        	    
        <div class="row">
			    			
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed" id="tb_jogos">
						<thead>
                            <tr>
                                <th>Data</th>
                                
                                <th width="750" class="text-center"></th>
				<th width="400" class="text-center">Opção</th>
                                
                                
                            </tr>
                        </thead> 
                        <tbody>
                        	{BLC_DADOS}
                        	
	                            <tr>
	                                <td>{DATA_JOGO}</td>
	                          
              				<th width="80" class="text-center"> {NOME_EQUIPECASA}   {GOLSEQUIPE1_JOGO}  X {GOLSEQUIPE2_JOGO}   {NOME_EQUIPEFORA}</th>
	                                <td class="dropdown">
	                                  
  						<select onchange="atualizarApostas()" class="form-control" id="sel{ID_JOGO}">
    							<option></option>
    							<option>{VALORCASA_JOGO}  - Vitória da Casa</option>
							<option>{VALORFORA_JOGO}  - Vitória do Visitante</option>
						        <option>{VALOREMPATE_JOGO}  - Empate</option>
							<option>{VALORDUPLACASA_JOGO}  - Dupla Casa</option>
							<option>{VALORDUPLAFORA_JOGO}  - Dupla Fora</option>
							<option>{VALORGOLMEIOCASA_JOGO}  - Gol e Meio Casa</option>
							<option>{VALORGOLMEIOFORA_JOGO}  - Gol e Meio Visitante</option>
							<option>{VALORAMBOSMARCAM_JOGO}  - Ambos Marcam</option>
							<option>{VALORNAOAMBOS_JOGO}  - Ninguém Marca</option>
							<option>{VALORMAISDOISGOLSEMEIO_JOGO}  - &plus; 2 Gols e Meio</option>
							<option>{VALORMENOSDOISGOLSEMEIO_JOGO}  - &minus; 2 Gols e Meio</option>
						 </select>
	                                </td>
	                               
	                            </tr>
                        	{/BLC_DADOS}
                        </tbody>                   
                    </table>
                </div>
                
                <div>
                    <a onclick="RegistrarApostas()" class="btn btn-primary"><i class="glyphicon glyphicon-saved"></i> Registrar</a>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="ativarJogoModal" tabindex="-1" role="dialog" aria-labelledby="ativarJogoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="ativarJogoModalLabel">Mundial Futebol</h3>
                </div>
                <div class="modal-body">
                    <h4>Deseja realmente ativar este jogo ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="ativarDesativar(1)">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N達o</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="desativarJogoModal" tabindex="-1" role="dialog" aria-labelledby="desativarJogoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="desativarJogoModalLabel">Mundial Futebol</h3>
                </div>
                <div class="modal-body">
                    <h4>Deseja realmente desativar este jogo ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="ativarDesativar(0)">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N達o</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAguarde" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Por favor, aguarde...</h3>                    
                </div>
                <div class="modal-body">
                    <div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>
                </div>
        </div>
    </div>
</div>




<script src="<?php echo base_url('assets/js/jquery-1.11.0.js')?>"></script>	
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-datetimepicker.js')?>" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/locales/bootstrap-datetimepicker.pt-BR.js')?>" charset="UTF-8"></script>
<script type="text/javascript">
	
    var idExclusao        = "";
    var idAtivarDesativar = "";
    var jogos =[];
    var premio = 0;
    var valor = 0;
     var selecionados = 0;
    
    
    
    function abrirConfirmacao(id){
        idExclusao = id;
        $('#myModal').modal('show');
    }

    function apagar(){
        $('#myModal').modal('hide');
        location.href = 'jogo/apagar/' + idExclusao;
    }

    function ativarJogo(id){
    	idAtivarDesativar = id;
        $('#ativarJogoModal').modal('show');
    }

    function desativarJogo(id){
    	idAtivarDesativar = id;
        $('#desativarJogoModal').modal('show');
    }
    
    function atualizarApostas()
    {
      valor = document.getElementById('valor_aposta').value.substring(2,8);
      valor = valor.replace(',','.');
     
      
      jogos = [];
      selecionados = 0;
      
      for (i = 0; i < 1000; i++) 
      { 
         
       
    	if (document.getElementById('sel'+ i) )
    	 {
    	    jogos.push('sel'+ String(i));
    	   

	 }
      }
      
           
    if(jogos.length>0)
    {
    	
    		premio = Number(valor);
    	
    }
    
   
    
    for(i =0; i< jogos.length;i++)
    {	
    
       
        var yourSelect = document.getElementById(jogos[i]);
	if(yourSelect.selectedIndex!=0)
	{
                selecionados = 1;
	        var elemento = String(document.getElementById(jogos[i]).value); 
	        elemento = elemento.replace(',','.');
		
		if(Number(elemento.substring(0,5)) > 0)
		{

			premio = premio * Number(elemento.substring(0,5));
		}
		
		
		
	}
    }
    if(selecionados==1)
    {
    	document.getElementById('premio').value = String(premio);
    }
    else
    {
    	document.getElementById('premio').value = 0;
    }

   }
   
    
function RegistrarApostas()
    {
      valor = document.getElementById('valor_aposta').value.substring(2,8);
      valor = valor.replace(',','.');
     
      
      jogos = [];
      selecionados = 0;
      
      for (i = 0; i < 1000; i++) 
      { 
         
       
    	if (document.getElementById('sel'+ i) )
    	 {
    	    jogos.push('sel'+ String(i));
    	   

	 }
      }
      
           
    if(jogos.length>0)
    {
    	
    		premio = Number(valor);
    	
    }
    
     $.ajax({
				  url: '{URL_REGISTRAR}/' + document.getElementById('jogador_aposta').value  + '/' + premio,  
				  dataType : "json",
				  success: function(data) { 
				  }
			  });	
    
   
    
    for(i =0; i< jogos.length;i++)
    {	
    
       
        var yourSelect = document.getElementById(jogos[i]);
	if(yourSelect.selectedIndex!=0)
	{
                selecionados = 1;
	        var elemento = String(document.getElementById(jogos[i]).value); 
	        elemento = elemento.replace(',','.');
		
		if(Number(elemento.substring(0,5)) > 0)
		{
			

			
			//aqui vai gravar cada aposta
			 	 $.ajax({
				  url: '{URL_GRAVAR_APOSTA}/' + jogos[i].substring(3,8) + '/' + elemento.substring(0,5) + '/' + yourSelect.selectedIndex,  
				  dataType : "json",
				  success: function(data) { 
				  }
			  });		    	 
	
		}
		
		
		
	}
    }
   alert('Aposta gravada!');
   location.reload();

   }
   
    
	

	

	$('.form_date').datetimepicker({
        language:  'pt-BR',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });


</script>