<?php 

    require "../arquivos/seguranca_funcionario.php";

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

    <!-- arquivos css -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <?php

        include ("../menus/menu_funcionario.php");

        $pag[1] = "bem_vindo.php";
        $pag[2] = "setorchamados.php";
        $pag[3] = "setorconcluidos.php";
        $pag[4] = "chamadonovo.php";
        $pag[5] = "chamadospendentes.php";
        $pag[6] = "chamadosconcluidos.php";
        
        if (!empty($_GET["link"])):
            if (file_exists($pag[$_GET["link"]])): 
                include $pag[$_GET["link"]];
                
            else:
                include "bem_vindo.php";
            endif;
        else:
            include "bem_vindo.php";
        endif;
    ?>

    <!-- arquivos javascript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
