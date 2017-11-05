<?php 

    require "../arquivos/seguranca_funcionario.php";

?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Novo Chamado</h1>
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<div class="col-lg-4">
				<div class="panel-body">
					<form role="form"action = "../cadastro/cadastrochamado.php" method = "POST">
						<fieldset>
							<div class="form-group">
								<select class="form-control" name="setordestino">
									<option hidden>Setor de Destino</option>
									<?php                                         
									 require "../arquivos/conexao.php";
								
									//Select - Listar todos setores cadastrados no banco de dados (tb_setor)
									$sqlbuscasetor=$pdo->prepare ("SELECT * FROM tb_setor");
									$sqlbuscasetor->execute();
								
									while($buscasetor=$sqlbuscasetor->fetch(PDO::FETCH_ASSOC)){
										echo "<option>".$buscasetor['nome']."</option>";
									}
								?> 
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" name="prioridade">
									<option hidden>Prioridade</option>
									<option>Mínima</option>
									<option>Normal</option>
									<option>Urgente</option>
									<option>Imediata</option>
								</select>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Título" name="titulo" type="text" autofocus>
							</div>
							<div class="form-group">
								<textarea name = "descricao" class="form-control" rows="5" placeholder="Descreva aqui a sua solicitação."></textarea>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<div class="col-lg-6">
								<input type = "submit" name = "cadastrarchamado" class="btn btn-lg btn-primary btn-block" value = "Cadastrar"></a>
							</div>
							<div class="col-lg-6">
								<a href="#" class="btn btn-lg btn-primary btn-block">Limpar</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div>
<!-- /#page-wrapper -->
