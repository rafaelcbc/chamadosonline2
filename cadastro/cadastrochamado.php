<?php 
session_start();

require "../arquivos/conexao.php";

//Verifica o botão cadastrar usuário foi clicado.
if(isset($_POST['cadastrarchamado'])):
    
    //Caso sim, executa os códigos abaixo.

    $setordestino = addslashes(trim($_POST['setordestino']));
    $prioridade = addslashes(trim($_POST['prioridade']));
    $titulo = addslashes(trim($_POST['titulo']));
    $descricao = addslashes(trim($_POST['descricao']));

    $sqlnewcall=$pdo->prepare("INSERT INTO tb_chamado (descricao, titulo, prioridade) VALUES (?,?,?)");
    $sqlnewcall->bindValue (1, $descricao);
    $sqlnewcall->bindValue (2, $titulo);
    $sqlnewcall->bindValue (3, $prioridade);
    $sqlnewcall->execute();

    echo "Cadastro efetuado com sucesso.";
    
endif;


?>