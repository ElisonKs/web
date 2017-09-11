<div class="row">
	<div class="col-lg-12">
        <h2 class="page-header">Cambista - {ACAO}</h2>
    </div>
</div>

<div class="panel panel-default">
	<div class="panel-body">
		<form action="{ACAO_FORM}" method="post" class="form-horizontal">
			<input type="hidden" id="id_cambista" name="id_cambista" value="{id_cambista}"/>
			<div class="form-group {ERRO_LOGIN_CAMBISTA}">
				<label for="login_cambista" class="col-sm-1 control-label">Login</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="login_cambista" 
						   name="login_cambista" value="{login_cambista}" maxlength="8" autofocus autocomplete="off"/>
				</div>
			</div>
			
						
			<div class="form-group {DIV_SENHAS}">
				<div class="{ERRO_SENHA_CAMBISTA}">
					<label for="senha_cambista" class="col-sm-1 control-label">Senha</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="senha_cambista" 
							   name="senha_cambista" value="{senha_cambista}" maxlength="8" autofocus autocomplete="off"/>
					</div>
				</div>
				
				<div class="{ERRO_SENHA_CAMBISTA_CONFIRMAR}">
					<label for="senha_cambista_confirmar" class="col-sm-2 control-label">Confirmar senha</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="senha_cambista_confirmar" 
							   name="senha_cambista_confirmar" value="{senha_cambista_confirmar}" maxlength="8" autofocus autocomplete="off"/>
					</div>
				</div>
			</div>
			
			<div class="form-group {DIV_PIN}">
				<div class="{ERRO_PIN_CAMBISTA}">
					<label for="pin_cambista" class="col-sm-1 control-label">Pin</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="pin_cambista" 
							   name="pin_cambista" value="{pin_cambista}" maxlength="8" autofocus autocomplete="off"/>
					</div>
				</div>
				
				<div class="{ERRO_SPIN_CAMBISTA_CONFIRMAR}">
					<label for="pin_cambista_confirmar" class="col-sm-2 control-label">Confirmar pin</label>
					<div class="col-sm-3">
						<input type="password" class="form-control" id="pin_cambista_confirmar" 
							   name="pin_cambista_confirmar" value="{pin_cambista_confirmar}" maxlength="8" autofocus autocomplete="off"/>
					</div>
				</div>
			</div>
							
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-2">
					<label>
						<input type="checkbox" name="ativo_cambista" id="ativo_cambista" value="1" {ativo_cambista}> Ativo</input>
					</label>
				</div>								
			</div>	
			
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-11">
					<button type="submit" name="salvar_cambista" class="btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Salvar</button>
		        	<a type="button" href="{CONSULTA_CAMBISTA}" class="btn btn-default">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>		
