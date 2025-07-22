<?php
    session_start();
    require_once "../model/Chamada.php";

    if(!isset($_SESSION['id'])){
        header("Location: ../view/login.html");
        exit;
    }

    $chamada = new Chamada();

    if($_SESSION['nivel'] === 'admin'){
        $busca = $chamada->buscarChamadasPorIdAdmin($_POST['busca_id']);

        if($busca){
            $_SESSION['chamada_buscada'] = $busca;
        }
        else{
            header('Location: ../view/chamadaAdmin.php?notfound=true');
            exit;
        }
        header("Location: ../view/chamadaAdmin.php");
        exit;
    }
    else{
        $busca = $chamada->buscarChamadasPorId($_POST['busca_id'], $_SESSION['id']);

        if($busca){
            $_SESSION['chamada_buscada'] = $busca;
        }
        else{
            header('Location: ../view/chamadaUser.php?notfound=true');
            exit;
        }
        header("Location: ../view/chamadaUser.php");
        exit;
    }
    
    
?>
