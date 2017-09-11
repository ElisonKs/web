<div class="row">
	<div class="col-lg-12">
        <h2 class="page-header">
        	Tabela de Jogos        
		    <div class="pull-right">
		    	<a onclick="atualizarTabela()" title="Atualizar" class="btn-link"><i class="glyphicon glyphicon-refresh"></i></a> 
		    </div>
	    </h2>	
    </div>    
</div>

<div class="panel panel-default">
<div class="panel-body">
		<form action="{ACAO_FORM}" method="post" class="form-horizontal">
			<div class="{ERRO_IDCAMPEONATO_JOGO}">
				<label for="idcampeonato_jogo" class="col-sm-1 control-label">Campeonato</label>
				<div class="col-sm-4">
					<select class="form-control" id="idcampeonato_jogo" name="idcampeonato_jogo">
						<option value="0">Selecione</option>
						{BLC_CAMPEONATO}
							<option value="{ID_CAMPEONATO}" {SEL_ID_CAMPEONATO}>{NOME_CAMPEONATO}</option>
						{/BLC_CAMPEONATO}
					</select>
				</div>
			</div>
			<div class="col-sm-2">
            	<select class="form-control" id="opcao_status" name="opcao_status"  autofocus>
					<option value="1" {SEL_OPCAO_STATUS_1}>Ativos</option>
					<option value="0" {SEL_OPCAO_STATUS_0}>Inativos</option>
					<option value="2" {SEL_OPCAO_STATUS_2}>Todos</option>					
				</select>
			</div>
			<div class="">
				<button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-search"></i> Pesquisar</button>
			</div>
		</form>
	</div>

    <div class="panel-body">
        	    
        <div class="row">
			    			
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed" id="tb_jogos">
						<thead>
                            <tr>
                                <th>Data</th>
                               
                                <th width="80" class="text-center">Equipe Fora</th>
                                <th width="80" class="text-center">Equipe Casa</th>
                                <td></td>
                                <td></td>
                                
                            </tr>
                        </thead> 
                        <tbody>
                        	{BLC_DADOS}
	                            <tr>
	                                <td>{DATA_JOGO}</td>
	                                <td>{NOME_EQUIPECASA}</td>
	                                <td>{NOME_EQUIPEFORA}</td>
	                                <td class="text-center">
	                                    <a onclick="{ATIVAR_JOGO}" style="display:{DISPLAY_ATIVAR};" class="btn btn-success btn-xs">Ativar</a>
	                                    <a onclick="{DESATIVAR_JOGO}" style="display:{DISPLAY_DESATIVAR};" class="btn btn-danger btn-xs">Desativar</a>
	                                </td>
	                                
	                                <td class="text-center"><a href="{EDITAR_JOGO}" class="btn-link" title="Editar"><i class="glyphicon glyphicon-pencil"></i></a></td>
	                                <td class="text-center"><a onclick="{APAGAR_JOGO}" class="btn-link" title="Apagar"><i class="glyphicon glyphicon-trash"></i></a></td>
	                            </tr>
                        	{/BLC_DADOS}
                        </tbody>                   
                    </table>
                </div>
                
                <div>
                    <a href="{NOVO_JOGO}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Novo</a>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
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

    function ativarDesativar(opcao){
    	$('#ativarJogoModal').modal('hide');
    	$('#desativarJogoModal').modal('hide');
    	$('#modalAguarde').modal('show');
    	
    	$.ajax({
  		  url: '{URL_ATIVAR_DESATIVAR}/' + idAtivarDesativar + '/' + opcao,  
  		  dataType : "json",
  		  success: function(data) {
  	    	$('#modalAguarde').modal('hide');
  		  	location.reload();  		  
  		  }
  		});        
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