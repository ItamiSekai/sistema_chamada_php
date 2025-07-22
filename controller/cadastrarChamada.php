<?php
    require_once "../model/Chamada.php";

    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: ../view/login.html');
        exit;
    }

    $chamada = new Chamada;

    if($chamada->cadastrarChamada($_SESSION['nome'], $_POST['cxdescricao'], $_SESSION['id'])){
        echo "<script>alert('Chamado cadastrado com sucesso!'); 
        window.location.href = 'chamadaPage.php';</script>";
    }
    else{
        echo "<script>alert('Erro ao inserir chamada... Tente novamente.');
        window.location.href = 'chamadaPage.php';</script>";
    }

?>