<div class="row">
	<div class="col-lg-12">
        <h2 class="page-header">Equipe - {ACAO}</h2>
    </div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<form action="{ACAO_FORM}" method="post" class="form-horizontal">
			<input type="hidden" id="id_equipe" name="id_equipe" value="{id_equipe}"/>
			<div class="form-group {ERRO_NOME_EQUIPE}">
				<label for="nome_equipe" class="col-sm-1 control-label">Nome</label>
				<div class="col-sm-11">
					<input type="text" class="form-control" id="nome_equipe"
						   name="nome_equipe" value="{nome_equipe}" maxlength="25" autofocus autocomplete="off"/>
				</div>
			</div>
		
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-11">
					<button type="submit" name="salvar_equipe" class="btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Salvar</button>
		        	<a type="button" href="{CONSULTA_EQUIPE}" class="btn btn-default">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>		
