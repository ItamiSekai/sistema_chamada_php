<?php

    require_once "../model/User.php";

    $usuario = new User;

    if($usuario->verificaLogin($_POST['cxemail'], $_POST['cxsenha'])){
        $user = $usuario->buscaUsandoEmail($_POST['cxemail']);
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['nivel'] = $user['nivel_de_acesso'];
        header('Location: chamadaPage.php');
        exit;
    }
    else{
        echo "
            <script>
                alert('Erro ao fazer login.');
                window.location.href = '../view/login.html';
            </script>
        ";
    }


?>