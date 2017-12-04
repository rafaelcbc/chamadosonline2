<?php 
session_start();

require "../arquivos/seguranca_funcionario.php";
require "../arquivos/conexao.php";

//Verifica o botão cadastrar usuário foi clicado.
if(isset($_POST['cadastrarchamado'])):
    
    //Caso sim, executa os códigos abaixo.

    $setordestino = addslashes(trim($_POST['setordestino']));
    $prioridade = addslashes(trim($_POST['prioridade']));
    $titulo = addslashes(trim($_POST['titulo']));
    $descricao = addslashes(trim($_POST['descricao']));

    $sqlsetordestino=$pdo->prepare("SELECT * FROM tb_setor WHERE nome = ?");
    $sqlsetordestino->bindValue(1,$setordestino);
    $sqlsetordestino->execute();

    $idsetordestino = $sqlsetordestino->fetch(PDO::FETCH_ASSOC);

    $sqlnovochamado=$pdo->prepare("INSERT INTO tb_chamado (id_UsuarioAutor, nome_UsuarioAutor, id_SetorAutor, id_SetorDestino, Descricao, titulo, status, prioridade) VALUES (?,?,?,?,?,?,?,?)");
    $sqlnovochamado->bindValue (1, $_SESSION['dadosusuario']['Id']);
    $sqlnovochamado->bindValue (2, $_SESSION['dadosusuario']['Nome']);
    $sqlnovochamado->bindValue (3, $_SESSION['dadosusuario']['Id_Setor']);
    $sqlnovochamado->bindValue (4, $idsetordestino['Id']);
    $sqlnovochamado->bindValue (5, $descricao);
    $sqlnovochamado->bindValue (6, $titulo);
    $sqlnovochamado->bindValue (7, "Aberto");
    $sqlnovochamado->bindValue (8, $prioridade);
    $sqlnovochamado->execute();

    $_SESSION['sucess'] = "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Chamado aberto com sucesso.</div>";
    header("Location: ../pages/index.php?link=4");
    
endif;


?>