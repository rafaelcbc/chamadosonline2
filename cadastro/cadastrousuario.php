<?php 
session_start();

require "../arquivos/conexao.php";

if(isset($_POST['cadastrarusuario'])):

    $cpf = addslashes(trim($_POST['cpf']));
    $nome = addslashes(trim($_POST['nome']));
    $login = addslashes(trim($_POST['login']));
    $email = addslashes(trim($_POST['email']));
    $senha = addslashes(trim($_POST['senha']));
    $repetirsenha = addslashes(trim($_POST['repetirsenha']));
    $perfil = addslashes(trim($_POST['perfil']));

    if ($perfil == "administrador"):

        $perfil = 1;

    else:

        $perfil = 2;
    
    endif;

    if ($senha != $repetirsenha):
        $_SESSION['erro'] = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>A senha não confere.</div>";
        header("Location: ../pages/admcadusuario.php");

        
    else: 

    //Inserindo dados no bd
        $sqlcadusuario=$pdo->prepare ("INSERT INTO tb_usuario (Nome, cpf, login, senha, email, id_perfil) VALUES (?, ?, ?, ?, ?, ?);");
        $sqlcadusuario->bindValue(1,$nome);
        $sqlcadusuario->bindValue(2,$cpf);
        $sqlcadusuario->bindValue(3,$login);
        $sqlcadusuario->bindValue(4,$senha);
        $sqlcadusuario->bindValue(5,$email);
        $sqlcadusuario->bindValue(6,$perfil);
        $sqlcadusuario->execute();

        $_SESSION['erro'] = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Usuário cadastrado com sucesso.</div>";
        header("Location: ../pages/admcadusuario.php");

    endif;
endif;

?>