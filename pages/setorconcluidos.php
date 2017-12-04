<?php 

    require "../arquivos/seguranca_funcionario.php";

?>
<?php 

    require "../arquivos/seguranca_funcionario.php";

?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"> Chamados Concluídos do Setor</h1>
		</div>
		<!-- /.col-lg-12 -->
		<div class="col-lg-12">
			<!-- /.table-responsive -->
			<div class="panel panel-default">
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th class="text-center">Autor</th>
								<th class="text-center">Data e Hora de Abertura</th>
								<th class="text-center">Estado</th>
								<th class="text-center">Prioridade</th>
								<th class="text-center">Título</th>
								<th class="text-center">Descrição</th>
							</tr>
						</thead>
						<tbody>
							<?php
							require "../arquivos/conexao.php";

								$sqlchamadossetor=$pdo->prepare("SELECT * FROM tb_chamado WHERE id_SetorDestino = ? AND status = 'Concluído'");
								$sqlchamadossetor->bindValue (1, $_SESSION['dadosusuario']['Id_Setor']);
								$sqlchamadossetor->execute();

								while($chamadossetor = $sqlchamadossetor->fetch(PDO::FETCH_ASSOC)):
							?>
							<tr>
								<td><?php echo $chamadossetor['nome_UsuarioAutor'];?></td>
								<td><?php echo $chamadossetor['data_hora_abertura'];?></td>
								<td><?php echo $chamadossetor['status'];?></td>
								<td><?php echo $chamadossetor['prioridade'];?></td>
								<td><?php echo $chamadossetor['titulo'];?></td>
								<td class="text-center">
								<a href="#" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-eye fa-fw"></i> Ver mais
								</a>
								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">Descrição</h4>
											</div>
											<div class="modal-body">
												<p class="text-justify">
													<?php echo $chamadossetor['Descricao'];?>
												</p>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
											</div>
										</div>
										<!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								</div>
								<!-- /.modal -->
							</td>					
						</tr>
							<?php
								endwhile;
							?>
						</tbody>
					</table>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	
</div>
<!-- /#page-wrapper -->