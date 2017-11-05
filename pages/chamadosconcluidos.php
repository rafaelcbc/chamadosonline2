<?php 

    require "../arquivos/seguranca_funcionario.php";

?>

<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Chamados Concluídos</h1>
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
							<tr>
								<td>Rafael de Carvalho Brasileiro Cardoso</td>
								<td>24/10/2017 20:53</td>
								<td>Aberto</td>
								<td>Normal</td>
								<td>Troca de Equipamento</td>
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
														Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.
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
							<tr>
								<td>Igor Bernardo</td>
								<td>23/10/2017 20:02</td>
								<td>Em análise</td>
								<td>Urgente</td>
								<td>Troca de Equipamento</td>
								<td class="text-center">
									<a href="#" data-toggle="modal" data-target="#myModal">
										<i class="fa fa-eye fa-fw"></i> Ver mais
									</a>
								</td>
							</tr>
							<tr>
								<td>Judith Ribeiro</td>
								<td>22/10/2017 20:24</td>
								<td>Reaberto</td>
								<td>Alta</td>
								<td>Troca de Equipamento</td>
								<td class="text-center">
									<a href="#" data-toggle="modal" data-target="#myModal">
										<i class="fa fa-eye fa-fw"></i> Ver mais
									</a>
								</td>
							</tr>
						</tbody>
					</table>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
	</div>
	
</div>
<!-- /#page-wrapper -->