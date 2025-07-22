<?php

    require_once "../model/User.php";

    $usuario = new User;

    if ($_POST['nivel_de_acesso'] != 'admin'){

        $usuario->cadastrar($_POST['cxnome'], $_POST['cxemail'], $_POST['cxsenha'], $_POST['nivel_de_acesso']);
        header('Location: ../view/login.html');
        exit;
    }
    elseif ($_POST['nivel_de_acesso'] == 'admin'){
    
        if($usuario->verificaLogin($_POST['email_admin'], $_POST['senha_admin'])){
            $usuario->cadastrar($_POST['cxnome'], $_POST['cxemail'], $_POST['cxsenha'], $_POST['nivel_de_acesso']);
            header('Location: ../index.html');
            exit;
        }else{
            echo "Erro ao verificar, tente novamente!";
        }

    }
    else{
        echo 'Erro ao inserir!';
    }
?>