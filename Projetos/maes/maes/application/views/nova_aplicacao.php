<div class="row">
	<div class="col-lg-12">
        <div class="page-header">
                <h2>{AREA_DESC}({AREA})</h2>
                <h4>Meta {AREA}.{META}</h4>
        	
		    
		   
	    </h2>	
	</div>    
    </div>
</div>

<div class="panel panel-default">

    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed" id="tb_cambio">
						<thead>
                            <tr>

                                <th></th>
                               
                            </tr>
                        </thead> 
                        <tbody>
                        	{BLC_DADOS}
	                            <tr>

	                                <td>{QUESCQES}
	                                <form>
    						<div class="radio">
						      <label><input type="radio" id="DP{CODGIQES}" name="radio{CODGIQES}">Discordo Plenamente</label>
						 </div>
						 <div class="radio">
						      <label><input type="radio" id="D{CODGIQES}" name="radio{CODGIQES}">Discordo</label>
						 </div>
						 <div class="radio">
						      <label><input type="radio" id="DD{CODGIQES}" name="radio{CODGIQES}">Não concordo nem discordo</label>
						 </div>
						 <div class="radio">
						      <label><input type="radio" id="C{CODGIQES}" name="radio{CODGIQES}">Concordo</label>
						 </div>

						 <div class="radio">
						      <label><input type="radio" id="CP{CODGIQES}" name="radio{CODGIQES}">Concordo plenamente</label>
						 </div>

  					</form>
  					</td>
	                            </tr>
                        	{/BLC_DADOS}
                        </tbody>                   
                    </table>
                </div>
                	

                <div>
                    <a onclick="ConferirRespostas()" class="btn btn-primary">PRÓXIMO</a>
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
                    <h3 class="modal-title" id="myModalLabel">Autos do  Vale</h3>
                </div>
                <div class="modal-body">
                    <h4>Deseja realmente apagar este câmbio ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="apagar()">Sim</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="melhorespraticasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="myModalLabel"></h3>
                </div>
                <div class="modal-body">
                    <h5>{MELHORES_PRATICAS}</h5>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="travarTelaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="myModalLabel"></h3>
                </div>
                <div class="modal-body">
                    <h5>ALERTA: A escolha por uma opção neutra infelizmente não atende aos padrões da Estratégia Incremental, impossibilitando assim a aplicação do Método de Avaliação. <br> Por isso pedimos que consulte seu superior ou um gerente de projetos da organização para que seja possível sanar as duvidas sobre essa meta especifica.</h5>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="desmarcadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="myModalLabel"></h3>
                </div>
                <div class="modal-body">
                    <h4>Deve ser escolhida uma opção para cada questão!</h4>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exemplosprodutosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                    <h3 class="modal-title" id="myModalLabel"></h3>
                </div>
                <div class="modal-body">
                    <h5>{EXEMPLOS_PRODUTOS}</h5>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var idExclusao = "";

    function ConferirRespostas()
    {
    	
        var desmarcado = 0;
    	var travarTela = 0;
    	questoes = [] ;

	     for(i =0; i< 100;i++)
	     {	
	     	         if (document.getElementById('DD'+ i))
	     	         {
	     	                questoes.push( String(i));
	     	                if (document.getElementById('DD'+ i).checked)
	     	         	travarTela=1;

	     	         }
	     }		

     if(travarTela==0)
     {    
     	for(i =0; i< questoes.length;i++)
     	{	
        	var opcao ='N';
        	
        
 	         if(document.getElementById('DP' + questoes[i]).checked)
        	     	opcao = 'DP'
                	else if (document.getElementById('D'+questoes[i]).checked)
                        	 opcao = 'D'
                                    else if (document.getElementById('C'+questoes[i]).checked)
                                             opcao = 'C'
                                             else if (document.getElementById('CP'+questoes[i]).checked)
                                                      opcao = 'CP';
                                                      
                                                
                        if(opcao=='N')
                        {
                        	desmarcado = 1;

                        } 


			
		
	}//for
	if(desmarcado==1)
	{
		abrirDesmarcado();
	}
	else
	{
	      for(i =0; i< questoes.length;i++)
     	      {
     		var opcao;
        	
 	         if(document.getElementById('DP' + questoes[i]).checked)
        	     	opcao = 1
                	else if (document.getElementById('D'+questoes[i]).checked)
                        	 opcao = 2
                                    else if (document.getElementById('C'+questoes[i]).checked)
                                             opcao = 4
                                             else if (document.getElementById('CP'+questoes[i]).checked)
                                                      opcao = 5;
                                                      
                                                      
                     
			//alert('Questao'+questoes[i]+'opcao'+opcao);

			
			//aqui vai gravar cada questao
			 	 $.ajax({
				  url: '{URL_GRAVAR_QUESTAO}/' + '{COD_APLICACAO}/' + questoes[i] + '/' +opcao,  
				  dataType : "json",
				  async: false,
				  success: function(data) { 
				  }
			  });		    	 
	
 			window.location = "{PROXIMO}";
		
		
		
	}//for
	}
     }
     else
     {
	     abrirtravarTela();
	     
       
     }
    
    }
  
     function abrirMelhoresPraticas(){

        $('#melhorespraticasModal').modal('show');
    }
    
     function abrirtravarTela(){

        $('#travarTelaModal').modal('show');
    }
    
      function abrirDesmarcado(){

        $('#desmarcadoModal').modal('show');
    }
    function abrirExemplosProdutos(){

        $('#exemplosprodutosModal').modal('show');
    }

    
</script>

