<?php 
session_start();

require "../arquivos/conexao.php";

if(isset($_POST['logar'])):

    $usuario = addslashes(trim($_POST['usuario']));
    $senha = addslashes(trim($_POST['senha']));

    //Descobrindo o perfil do usuário
    $sqlperfil=$pdo->prepare ("SELECT tb_perfil.id, tb_perfil.nome FROM tb_usuario INNER JOIN tb_perfil ON tb_usuario.login = ? AND tb_usuario.senha = ? AND tb_usuario.id_perfil = tb_perfil.id");
    $sqlperfil->bindValue(1,$usuario);
    $sqlperfil->bindValue(2,md5($senha));
    $sqlperfil->execute();

    $perfil = $sqlperfil->fetch(PDO::FETCH_ASSOC);

endif;

if(!empty($usuario) AND !empty($senha)):

    $login=$pdo->prepare ("SELECT * FROM tb_usuario WHERE login = ? AND senha = ? AND id_perfil = ?");
    $login->bindValue(1,$usuario);
    $login->bindValue(2,md5($senha));
    $login->bindValue(3,$perfil['id']);
    $login->execute();

    //$_SESSION['nome'] = $login['nome'];
    $_SESSION['perfil'] = $perfil['nome'];
    echo $_SESSION['perfil'];

    if($login->rowCount() == 1):

        switch($perfil['nome']):
            case "administrador":
                $_SESSION['logado_admin'] = true;
                header("Location: ../pages/admindex.php");
                break;
            case "funcionario":
                $_SESSION['logado_funcionario'] = true;
                header("Location: ../pages/index.php");
                break;
        endswitch;
    else:
        $_SESSION['alerta_login'] = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Usuário ou senha inválidos</div>";
        header("Location: ../pages/login.php");
        endif;

else:
         $_SESSION['alerta_login'] = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Todos os campos devem ser preenchidos</div>";
         header("Location: ../pages/login.php");
endif;
?>