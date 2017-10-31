<?php 
session_start();

require "../arquivos/conexao.php";

//Verifica o botão cadastrar usuário foi clicado.
if(isset($_POST['cadastrarusuario'])):
    
    //Caso sim, executa os códigos abaixo.

    $cpf = addslashes(trim($_POST['cpf']));
    $nome = addslashes(trim($_POST['nome']));
    $login = addslashes(trim($_POST['login']));
    $email = addslashes(trim($_POST['email']));
    $senha = addslashes(trim($_POST['senha']));
    $repetirsenha = addslashes(trim($_POST['repetirsenha']));
    $perfil = addslashes(trim($_POST['perfil']));

    //Verifica o perfil selecionado e informa o Id_Perfil da tabela tb_perfil.
    if ($perfil == "administrador"):

        $perfil = 1;

    else:

        $perfil = 2;
    
    endif;

    //Verifica se a senha digita foi repetida corretamente.
    if ($senha != $repetirsenha):

        //Caso seja diferente, exibe alerta de erro.
        $_SESSION['erro'] = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>A senha não confere.</div>";
        header("Location: ../pages/admcadusuario.php");

        
    else: 

        //Query INSERT - Dados do formulário.
        $sqlcadusuario=$pdo->prepare ("INSERT INTO tb_usuario (Nome, cpf, login, senha, email, id_perfil, primeiro_acesso) VALUES (?, ?, ?, ?, ?, ?, ?);");
        $sqlcadusuario->bindValue(1,$nome);
        $sqlcadusuario->bindValue(2,$cpf);
        $sqlcadusuario->bindValue(3,$login);
        $sqlcadusuario->bindValue(4,md5($senha));
        $sqlcadusuario->bindValue(5,$email);
        $sqlcadusuario->bindValue(6,$perfil);
        $sqlcadusuario->bindValue(7,true);
        $sqlcadusuario->execute();

        //Mensagem de cadastro realizado com sucesso.
        $_SESSION['sucess'] = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Usuário cadastrado com sucesso.</div>";
        header("Location: ../pages/admcadusuario.php");

    endif;
endif;

?>