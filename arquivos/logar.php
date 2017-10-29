<?php

require "../arquivos/conexao.php";

if(isset($_POST['logar'])):

    $usuario = addslashes(trim($_POST['usuario']));
    $senha = addslashes(trim($_POST['senha']));

endif;

if(!empty($usuario) AND !empty($senha)):

    $login=$pdo->prepare ("SELECT * FROM tb_usuario WHERE login = ? AND senha = ?");
    $login->bindValue(1,$usuario);
    $login->bindValue(2,$senha);
    $login->execute();

    if($login->rowCount() == 1):

        echo "Logado com sucesso";

    else:

        echo "Usuário ou senha incorretos";

    endif;
    
else:
    echo "Todos os campos devem ser preenchidos";

endif;

?>