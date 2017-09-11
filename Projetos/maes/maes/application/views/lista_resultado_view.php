<div class="row">
	<div class="col-lg-12">
        <h2 class="page-header">
        	Aplicações       
		  
	    </h2>	
    </div>    
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed" id="tb_cambista">
						<thead>
                            <tr>
                                <th>Data</th>
                                <th>N&iacute;vel Alcan&ccedil;ado</th>
                               


                                <th class="coluna-acao"></th>
                            </tr>
                        </thead> 
                        <tbody>
                        	{BLC_DADOS}
	                            <tr>
	                                <td>{DATA}</td>
    	                                <td>{NIVEL}</td>
	                               
	                             
	                            <td> <a href="{VER_RESULTADO}/{COD_APLICACAO}" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Ver Resultado</a> </td>

	                            </tr>
                        	{/BLC_DADOS}
                        </tbody>                   
                    </table>
                </div>
                	

                <div>
                    <a href="{URL_NOVA}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Nova</a>
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

