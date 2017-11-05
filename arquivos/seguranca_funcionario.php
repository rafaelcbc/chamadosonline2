<?php 
    if (session_status() != PHP_SESSION_ACTIVE):
        session_start();
    endif;

    if(!isset($_SESSION['logado_funcionario'])or $_SESSION['perfil'] != "funcionario"):
        unset($_SESSION['logado_admin'], $_SESSION['perfil']);
        $_SESSION['alerta_login'] = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Acesso negado.</div>";
        header("Location: login.php");
    endif;
?>