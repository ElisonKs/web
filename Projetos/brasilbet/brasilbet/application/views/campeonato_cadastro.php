<div class="row">
	<div class="col-lg-12">
        <h2 class="page-header">Campeonato - {ACAO}</h2>
    </div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<form action="{ACAO_FORM}" method="post" class="form-horizontal">
			<input type="hidden" id="id_campeonato" name="id_campeonato" value="{id_campeonato}"/>
			<div class="form-group {ERRO_NOME_CAMPEONATO}">
				<label for="nome_campeonato" class="col-sm-1 control-label">Nome</label>
				<div class="col-sm-11">
					<input type="text" class="form-control" id="nome_campeonato"
						   name="nome_campeonato" value="{nome_campeonato}" maxlength="75" autofocus autocomplete="off"/>
				</div>
			</div>
		
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-11">
					<button type="submit" name="salvar_campeonato" class="btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Salvar</button>
		        	<a type="button" href="{CONSULTA_CAMPEONATO}" class="btn btn-default">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>		
