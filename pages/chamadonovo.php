<?php session_start();

    //Controle de acesso as página, conforme sessão ativa.
    if(!isset($_SESSION['logado_funcionario'])or $_SESSION['perfil'] != "funcionario"):
        unset($_SESSION['logado_admin'], $_SESSION['perfil']);
        $_SESSION['alerta_login'] = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Acesso negado.</div>";
        header("Location: login.php");
    endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Chamados</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="index.html">Sistema de Chamados</a>
                
                <ul class="nav navbar-top-links navbar-right text-right">
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="../arquivos/sair.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->

            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Principal</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope fa-fw"></i> Caixa do Setor<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="setorchamados.php"><i class="fa fa-table fa-fw"></i> Ver Chamados</a>
                                </li>
                                <li>
                                    <a href="setorconcluidos.php"><i class="fa fa-check fa-fw"></i> Chamados Concluídos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Abrir Chamado<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="chamadonovo.php"><i class="fa fa-file fa-fw"></i> Novo Chamado</a>
                            </li>
                            <li>
                                <a href="chamadospendentes.php"><i class="fa fa-clock-o fa-fw"></i> Chamados Pendentes</a>
                            </li>
                            <li>
                                <a href="chamadosconcluidos.php"><i class="fa fa-check fa-fw"></i> Chamados Concluídos</a>
                            </li>
                        </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

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

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
