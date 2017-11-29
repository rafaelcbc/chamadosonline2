<?php 

require "../arquivos/seguranca_admin.php";
require "../arquivos/conexao.php";

//Verifica o botão cadastrar usuário foi clicado.
if(isset($_POST['cadastrarusuario'])):
    
    //Caso sim, executa os códigos abaixo.
    $nome = addslashes(trim($_POST['nome']));
    $login = addslashes(trim($_POST['login']));
    $email = addslashes(trim($_POST['email']));
    $senha = addslashes(trim($_POST['senha']));
    $repetirsenha = addslashes(trim($_POST['repetirsenha']));
    $perfil = addslashes(trim($_POST['tipodeacesso']));
    $setor = addslashes(trim($_POST['setores']));
    $telefone = addslashes(trim($_POST['telefone']));
    
    $perfil = strtolower($perfil); //Transforma a string em minuscula.

    //Verifica o perfil selecionado e informa o Id_Perfil da tabela tb_perfil.
    if ($perfil == "administrador"):

        $perfil = 1;

    else:

        $perfil = 2;
    
    endif; //id perfil

    //Descobrindo o id do setor
    $sqlidsetor=$pdo->prepare("SELECT id, nome FROM tb_setor WHERE nome = ? ");
    $sqlidsetor->bindValue(1, $setor);
    $sqlidsetor->execute();

    $idsetor = $sqlidsetor->fetch(PDO::FETCH_ASSOC);

    //Verifica se a senha digita foi repetida corretamente.
    if ($senha != $repetirsenha):
        
        //Caso seja diferente, exibe alerta de erro.
        $_SESSION['erro'] = "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>A senha não confere.</div>";
        header("Location: ../pages/admindex.php?link=2");

    else: 

        //Query INSERT - Dados do formulário.
        $sqlcadusuario=$pdo->prepare ("INSERT INTO tb_usuario (Nome, login, senha, telefone, email, id_Setor, id_perfil, primeiro_acesso) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
        $sqlcadusuario->bindValue(1,$nome);
        $sqlcadusuario->bindValue(2,$login);
        $sqlcadusuario->bindValue(3,md5($senha));
        $sqlcadusuario->bindValue(4,$telefone);
        $sqlcadusuario->bindValue(5,$email);
        $sqlcadusuario->bindValue(6,$idsetor['id']);
        $sqlcadusuario->bindValue(7,$perfil);
        $sqlcadusuario->bindValue(8,true);
        $sqlcadusuario->execute();

        //Mensagem de cadastro realizado com sucesso.
        $_SESSION['sucess'] = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Usuário cadastrado com sucesso.</div>";
        header("Location: ../pages/admindex.php?link=2");

    endif;
endif;

?>