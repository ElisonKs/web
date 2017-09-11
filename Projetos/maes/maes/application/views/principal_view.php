<div class="row">
	<div class="col-lg-12">
		
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->



<!-- /.row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" align="center">
			
				<div class="panel-body">
				<h2 class="page-header">Bem vindo ao m&eacute;todo de avalia&ccedil;&atilde;o para Estrat&eacute;gia Incremental</h2>
					<div class="col-sm-12">
					  
					    Proposta por Felipe Furtado(2015) em sua tese de Doutorado para que organiza&ccedil;&otilde;es de desenvolvimento 
					       de software que buscam ader&ecirc;ncia ao CMMI-DEV possam implantar pr&aacute;ticas &aacute;geis de gest&atilde;o de projetos.
					   
					 </div>  <br>
					
					
				</div>
		</div>
	</div>
	
	<div class="col-lg-12">
	<h4 class="text-center">Regras para caracterização de graus de implementação</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed" id="tb_jogos">
						<thead>
                            <tr>
                             
                                
                                <th width="400" class="text-center">Caracterização</th>
				<th width="600" class="text-center">Requerimento</th>
				<th width="400" class="text-center">Porcentagem de implementa&ccedil;&atilde;o das metas</th>
                                
                                
                            </tr>
                        </thead> 
                        <tbody>

                        	
	                            <tr>
	                                <th class="text-center" >Concordo (C)<br>Concordo Plenamente(CP)</th>
	                          
              				<td width="80" class="text-center">Há uma evidência de uma abordagem completa e sistemática da meta e sua implementação integral, sem ou com fraquezas relevantes. </td>
	                                <td class="text-center">De 50% para 100%</td>
	                               
	                            </tr>
	                            <tr>
	                                <th class="text-center">Discordo (D)<br>Discordo Plenamente(DP)</th>
	                          
              				<td width="80" class="text-center">Há alguma ou nenhuma evidência de uma abordagem focada para a meta e algum grau de sua implementação. Há pontos fracos e alguns aspectos imprevisíveis da sua implementação. </td>
	                                <td class="text-center">De 0% para 49%</td>
	                               
	                            </tr>

                        </tbody>                   
                    </table>
                </div>
                
                <div>
	
	
	
</div>

<div class="modal fade" id="fechar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="myModalLabel">Encontre Delivery</h3>
                </div>
                <div class="modal-body">
                    <h4>Deseja realmente fechar?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="hideFechar()">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N達o</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="abrir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="myModalLabel">Encontre Delivery</h3>
                </div>
                <div class="modal-body">
                    <h4>Deseja realmente abrir?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="hideAbrir()">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">N達o</button>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    function showFechar(){
        $('#fechar').modal('show');
    }

    function hideFechar(){
        $('#fechar').modal('hide');
        location.href = 'index.php/principal/fechar';
    }

    function showAbrir(){
        $('#abrir').modal('show');
    }

    function hideAbrir(){
        $('#abrir').modal('hide');
        location.href = 'index.php/principal/abrir';
    }
    
	google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
    	var data = google.visualization.arrayToDataTable([
        	['Cambista', 'Valor'],
        	{GRAFICO_APOSTA_POR_CAMBISTA}
        	    ['{CAMBISTA}', {VALOR}],
			{/GRAFICO_APOSTA_POR_CAMBISTA}
        ]);

        var options = {
        	title: 'Apostas por Cambista '
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico_aposta_por_cambista'));
        chart.draw(data, options);

           
    }
</script>