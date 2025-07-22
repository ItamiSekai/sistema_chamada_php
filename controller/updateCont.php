<?php
    session_start();
    $id = $_GET['id'] ?? null;
    if (!$id) {
        echo "ID inválido.";
        header("Location: ../view/chamadaAdmin.php");
        exit;
    }
    $_SESSION['id_update'] = $id;
    require_once '../model/Chamada.php';
    $chamada = new Chamada();
    $dados = $chamada->buscarChamadasPorIdAdmin($id);

    if (!$dados) {
        echo "Chamada não encontrada.";
        exit;
    }

    $_SESSION['chamada'] = $dados;
    header("Location: ../view/update.php");
?>