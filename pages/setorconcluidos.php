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
								<th>Autor</th>
								<th>Data e Hora de Abertura</th>
								<th>Estado</th>
								<th>Prioridade</th>
								<th>Título</th>
								<th>Descrição</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Rafael Cardoso</td>
								<td>24/10/2017 20:53</td>
								<td>Aberto</td>
								<td>Normal</td>
								<td>Troca de Equipamento</td>
								<td><a href="#">Ver mais</a></td>
							</tr>
							<tr>
								<td>Igor Bernardo</td>
								<td>23/10/2017 20:02</td>
								<td>Em análise</td>
								<td>Urgente</td>
								<td>Troca de Equipamento</td>
								<td><a href="#">Ver mais</a></td>
							</tr>
							<tr>
								<td>Judith Ribeiro</td>
								<td>22/10/2017 20:24</td>
								<td>Reaberto</td>
								<td>Alta</td>
								<td>Troca de Equipamento</td>
								<td><a href="#">Ver mais</a></td>
							</tr>
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