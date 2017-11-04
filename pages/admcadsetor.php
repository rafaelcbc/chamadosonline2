<?php 
    require "../arquivos/seguranca_admin.php";
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cadastro de Setor</h1>
                </div>

                <div class="col-lg-4">
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nome do Setor" name="nome" type="text" autofocus>
                                </div>
                                <div class="form-group input-group">
                                    <input type="text" class="form-control" placeholder="Responsável do Setor" name="responsavel" type="text">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="admindex.php" class="btn btn-lg btn-primary btn-block disabled">Cadastrar</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                                    
            </div>
            <!-- /.col-lg-12 -->
            
        </div>
        <!-- /#page-wrapper -->
