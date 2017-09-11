<div class="row">
	<div class="col-lg-12">
        <h2 class="page-header">
        	Resultado da Aplicação do Método de Avaliação    
		    <div class="pull-right">
		    	<a href="{ATUALIZAR}" title="Atualizar" class="btn-link"><i class="glyphicon glyphicon-refresh"></i></a> 
		    </div>
	    </h2>	
    </div>    
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
            
            
            
            
                <div class="table-responsive">
                 
						<thead>
                           <center><h2> Organização classificada no Nível: {NIVEL} da Estratégia Incremental</h2></center>
                           <h3>A seguir apresentamos as áreas de processos da Estratégia Incremental com metas não satisfeitas.<br>E quadro com Resultados Esperados(RE) e Melhores Práticas(MP) juntamente com Produtos de Trabalho(PT) para cada meta não atingida durante a avaliação:</h3>
                           <hr>
                        </thead> 
                     <div class="table-responsive"> 
	                                <table class="table table-bordered">

                        	{BLC_DADOS}
                        		<tr>

	                               {H3_INICIO}{AREA}{H3_FIM}

	                                {TRINICIO}
	                                {CABECALHO_RESULTADO_ESPERADO}
	                                {CABECALHO_MELHORES_PRATICAS}
	                                {CABECALHO_EXEMPLOS_PRODUTO}
	                                {TRFIM}
	                                <tr>
	                                <td class="col-md-2" >{RESULTADO_ESPERADO}</td>
	                                <td class="col-md-3">{MELHORES_PRATICAS}</td>
	                                <td>{EXEMPLOS_PRODUTO}</td>
	                                </tr>
	                               
				     </div>	
	                            </tr>
                        	{/BLC_DADOS}
                                          
                    </table>
                </div>
                	

               
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="myModalLabel">Mundial Futebol</h3>
                </div>
                <div class="modal-body">
                    <h4>Deseja realmente apagar este cambista ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="apagar()">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N達o</button>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var idExclusao = "";

    function abrirConfirmacao(id){
        idExclusao = id;
        $('#myModal').modal('show');
    }

    function apagar(){
        $('#myModal').modal('hide');
        location.href = 'cambista/apagar/' + idExclusao;
    }
</script>

