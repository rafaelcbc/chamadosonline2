<?php 
session_start();

require "../arquivos/conexao.php";

if(isset($_POST['cadastrarusuario'])):

    //$perfil = addslashes(trim($_POST['tipousuario']));
    $cpf = addslashes(trim($_POST['cpf']));
    $nome = addslashes(trim($_POST['nome']));
    $login = addslashes(trim($_POST['login']));
    $email = addslashes(trim($_POST['email']));
    $senha = addslashes(trim($_POST['senha']));
    $repetirsenha = addslashes(trim($_POST['repetirsenha']));
    $perfil = addslashes(trim($_POST['tipoUsuario']));

    if ($senha != $repetirsenha):
        echo "<script>alert('A senha não confere.');</script>";
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

    echo "Usuário cadastro com sucesso";
    endif;
endif;

?>