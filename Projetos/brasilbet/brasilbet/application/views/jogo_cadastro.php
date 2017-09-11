<div class="row">
	<div class="col-lg-12">
        <h2 class="page-header">Jogo - {ACAO}</h2>

<!--    <div class="pull-right">-->
<!--     <a type="button" href="{URL_METRICAS}" class="btn btn-primary" {DISABLE_METRICAS}>-->
<!--      <i class="glyphicon glyphicon-list-alt"></i> Metricas-->
<!--     </a>-->
<!--    </div>-->


    </div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<form action="{ACAO_FORM}" method="post" class="form-horizontal">
			<input type="hidden" id="id_jogo" name="id_jogo" value="{id_jogo}"/>
			
			<div class="form-group">	
				<div class="{ERRO_DATA_JOGO}">
					<label for="data_jogo" class="col-sm-1 control-label">Data</label>
					<div class="col-sm-3">
						<input type="date" data-date="" data-date-format="dd/mm/yyyy" class="form-control" id="data_jogo"  
							   name="data_jogo" value="{data_jogo}" maxlength="35" autocomplete="off" autofocus/>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-2">
					<label>
						<input type="checkbox" name="ativo_jogo" id="ativo_jogo" value="1" {ativo_jogo}> Ativo</input>
					</label>
				</div>								
			</div>	
			
			<div class="form-group {ERRO_IDCAMPEONATO_JOGO}">
				<label for="idcampeonato_jogo" class="col-sm-1 control-label">Campeonato</label>
				<div class="col-sm-3">
					<select class="form-control" id="idcampeonato_jogo" name="idcampeonato_jogo">
						<option value="">Selecione</option>
						{BLC_CAMPEONATO}
						<option value="{ID_CAMPEONATO}" {SEL_ID_CAMPEONATO}>{NOME_CAMPEONATO}</option>
						{/BLC_CAMPEONATO}
					</select>
				</div>
			</div>
			
			<div class="form-group {ERRO_IDEQUIPECASA_JOGO}">
				<label for="idequipecasa_jogo" class="col-sm-1 control-label">Equipe Casa</label>
				<div class="col-sm-3">
					<select class="form-control" id="idequipecasa_jogo" name="idequipecasa_jogo">
						<option value="">Selecione</option>
						{BLC_EQUIPECASA}
						<option value="{ID_EQUIPE}" {SEL_ID_EQUIPECASA}>{NOME_EQUIPE}</option>
						{/BLC_EQUIPECASA}
					</select>
				</div>
			</div>
			
			<div class="form-group {ERRO_IDEQUIPEFORA_JOGO}">
				<label for="idequipefora_jogo" class="col-sm-1 control-label">Equipe Fora</label>
				<div class="col-sm-3">
					<select class="form-control" id="idequipefora_jogo" name="idequipefora_jogo">
						<option value="">Selecione</option>
						{BLC_EQUIPEFORA}
						<option value="{ID_EQUIPE}" {SEL_ID_EQUIPEFORA}>{NOME_EQUIPE}</option>
						{/BLC_EQUIPEFORA}
					</select>
				</div>
			</div>
			
			<div class="form-group">
				
				<div class="{ERRO_GOLSEQUIPE1_JOGO} ">
					<label for="golsequipe1_jogo" class="col-sm-1 control-label">Casa</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="golsequipe1_jogo"  
							   style="text-align: right;" name="golsequipe1_jogo" value="{golsequipe1_jogo}" maxlength="20"/>
					</div>
				</div>
				
				<div class="{ERRO_GOLSEQUIPE2_JOGO}">
					<label for="goslsequipe2_jogo" class="col-sm-1 control-label">Fora</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="golsequipe2_jogo"  
							   style="text-align: right;" name="golesquipe2_jogo" value="{golsequipe2_jogo}" maxlength="20"/>
					</div>
				</div>
				
				
				
			</div>
			
			<div class="form-group">
				<div class="{ERRO_VALORCASA_JOGO} ">
					<label for="valorcasa_jogo" class="col-sm-1 control-label">Time da Casa</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valorcasa_jogo"  
							   style="text-align: right;" name="valorcasa_jogo" value="{valorcasa_jogo}" maxlength="20"/>
					</div>
				</div>
				
				<div class="{ERRO_VALORFORA_JOGO}">
					<label for="valorfora_jogo" class="col-sm-1 control-label">Time de Fora</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valorfora_jogo"  
							   style="text-align: right;" name="valorfora_jogo" value="{valorfora_jogo}" maxlength="20"/>
					</div>
				</div>
				
				
				
				<div class="{ERRO_VALORDUPLACASA_JOGO}">
					<label for="valorduplacasa_jogo" class="col-sm-1 control-label">Dupla Casa</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valorduplacasa_jogo"  
					   style="text-align: right;" name="valorduplacasa_jogo" value="{valorduplacasa_jogo}" maxlength="20"/>
					</div>
				</div>
				
				<div class="{ERRO_VALORDUPLAFORA_JOGO}">
					<label for="valorduplafora_jogo" class="col-sm-1 control-label">Dupla Fora</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valorduplafora_jogo"  
					   style="text-align: right;" name="valorduplafora_jogo" value="{valorduplafora_jogo}" maxlength="20"/>
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="{ERRO_VALORGOLMEIOCASA_JOGO} ">
					<label for="valorgolmeiocasa_jogo" class="col-sm-1 control-label">Gol e meio Casa</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valorgolmeiocasa_jogo"  
						   style="text-align: right;" name="valorgolmeiocasa_jogo" value="{valorgolmeiocasa_jogo}" maxlength="20"/>
					</div>
				</div>			
				
				<div class="{ERRO_VALORGOLMEIOFORA_JOGO} ">
					<label for="valorgolmeiofora_jogo" class="col-sm-1 control-label">Gol e meio Fora</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valorfolmeiofora_jogo"  
						   style="text-align: right;" name="valorgolmeiofora_jogo" value="{valorgolmeiofora_jogo}" maxlength="20"/>
					</div>
				</div>
			
				
				
				
				
				<div class="{ERRO_VALORMSAISDOISGOLSEMEIO_JOGO} ">
					<label for="valormaisdoisgolsemeio_jogo" class="col-sm-1 control-label">Mais 2 Gols e Meio</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valormaisdoisgolsemeio_jogo"  
				   style="text-align: right;" name="valormaisdoisgolsemeio_jogo" value="{valormaisdoisgolsemeio_jogo}" maxlength="20"/>
					</div>
				</div>
				
				<div class="{ERRO_VALORMENOSDOISGOLSEMEIO_JOGO}">
					<label for="valormenosdoisgolsemeio_jogo" class="col-sm-1 control-label">Menos 2 Gols e Meio</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valormenosdoisgolsemeio_jogo"  
				   style="text-align: right;" name="valormenosdoisgolsemeio_jogo" value="{valormenosdoisgolsemeio_jogo}" maxlength="20"/>
					</div>
				</div>
				
			</div>
			
			<div class="form-group">
				
				
				<div class="{ERRO_VALOREMPATE_JOGO} ">
					<label for="valorempate_jogo" class="col-sm-1 control-label">Empate</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valorempate_jogo"  
							   style="text-align: right;" name="valorempate_jogo" value="{valorempate_jogo}" maxlength="20"/>
					</div>
				</div>
				
				<div class="{ERRO_VALORAMBOSMARCAM_JOGO} ">
					<label for="valorambosmarcam_jogo" class="col-sm-1 control-label">Ambos Marcam</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valorambosmarcam_jogo"  
						   style="text-align: right;" name="valorambosmarcam_jogo" value="{valorambosmarcam_jogo}" maxlength="20"/>
					</div>
				</div>
				
				<div class="{ERRO_VALORNAOAMBOS_JOGO} ">
					<label for="valornaoambos_jogo" class="col-sm-1 control-label">Não Ambos</label>
					<div class="col-sm-2">
						<input type="text" class="form-control dinheiro" id="valornaoambos_jogo"  
						   style="text-align: right;" name="valornaoambos_jogo" value="{valornaoambos_jogo}" maxlength="20"/>
					</div>
				</div>
				
			</div>	
		
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-11">
					<button type="submit" name="salvar_jogo" class="btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Salvar</button>
		        	<a type="button" href="{CONSULTA_JOGO}" class="btn btn-default">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>		
