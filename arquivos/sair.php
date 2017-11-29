<?php 
            
    if (session_status() != PHP_SESSION_ACTIVE):
        session_start();
    endif;

    if(isset($_SESSION['logado_admin']) or $_SESSION['perfil'] != "administrador"):
     unset($_SESSION['logado_admin'], $_SESSION['perfil']);
    endif;

    if(isset($_SESSION['logado_funcionario'])or $_SESSION['perfil'] != "funcionario"):
        unset($_SESSION['logado_funcionario'], $_SESSION['perfil']);
    endif;

    $_SESSION['alerta_login'] = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Sessão encerrada com sucesso.</div>";
    header("Location: ../pages/login.php");
    
?>