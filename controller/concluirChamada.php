<?php
    require_once "../model/Chamada.php";

    session_start();
    $id = $_GET['id'] ?? null;
    if (!$id) {
        echo "ID inválido.";
        header("Location: ../view/chamadaAdmin.php");
        exit;
    }

    $chamada = new Chamada();
    if($chamada->concluirChamada($id)){
        echo "<script>alert('Chamado concluido com sucesso!'); 
        window.location.href = 'chamadaPage.php';</script>";
    }
    else{
        echo "<script>alert('Erro ao concluir chamado'); 
        window.location.href = 'chamadaPage.php';</script>";
    }

?>