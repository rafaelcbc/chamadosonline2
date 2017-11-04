<?php 
    if (session_status() != PHP_SESSION_ACTIVE):
        session_start();
    endif;

    if(!isset($_SESSION['logado_admin']) or $_SESSION['perfil'] != "administrador"):
        unset($_SESSION['logado_funcionario'], $_SESSION['perfil']);
        $_SESSION['alerta_login'] = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Acesso negado.</div>";
        header("Location: login.php");
    endif;
?>