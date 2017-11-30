<?php 
	require "../arquivos/seguranca_admin.php";
?>

<div id="page-wrapper">
	<div class="row">
		<!-- Title -->
		<div class="col-lg-12">
			<h1 class="page-header">Cadastro de Usuário</h1>
		</div>
		
		<div class="col-lg-12">


		<div class="col-lg-4">
			<div class="panel-body">
				<form role="form" action="../cadastro/cadastrousuario.php" method="post">
					<fieldset>
						<?php
							if (isset($_SESSION['erro'])):
								echo $_SESSION['erro'];
								unset ($_SESSION['erro']);
							endif;
						?>
						<?php    
							if (isset($_SESSION['sucess'])):
								echo $_SESSION['sucess'];
								unset ($_SESSION['sucess']);
							endif;
						?>
						<div class="form-group">
							<select class="form-control" name=" tipodeacesso">
								<option hidden class="testecor">Tipo de Acesso</option>
								<option>Funcionario</option>
								<option>Administrador</option>
							</select>
						</div>
						<div class="form-group">
							<select class="form-control" name="setores">
								<option  hidden>Setor</option>
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
							<input class="form-control" placeholder="Nome Completo" name="nome" type="text" autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Telefone" name="telefone" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" type="text" autofocus>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Login" name="login" type="text">
						</div>
						<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" value="login">
							</div>
						<div class="form-group">
							<input class="form-control" placeholder="Senha" name="senha" type="password" value="">
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Repetir Senha" name="repetirsenha" type="password" value="">
						</div>
						
						<!-- Change this to a button or input when using this as a form -->
						<input class="btn btn-lg btn-primary btn-block" type="submit" name="cadastrarusuario" >
						<br>
						<?php    
							if (isset($_SESSION['sucess'])):
								echo $_SESSION['sucess'];
								unset ($_SESSION['sucess']);
							endif;
						?>
					</fieldset>
				</form>
			</div>
		</div>

	</div>
	<!-- /.col-lg-12 -->
	
</div>
<!-- /#page-wrapper -->