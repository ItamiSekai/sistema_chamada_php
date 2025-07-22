<?php

session_start();
require_once '../model/Chamada.php';

if (!isset($_SESSION['id']) || $_SESSION['nivel'] !== 'admin') {
    header('Location: ../view/login.html');
    exit;
}

if (!isset($_POST['filtro'])) {
    echo "Nenhum filtro selecionado.";
    exit;
}

$status = $_POST['filtro']; 

$chamada = new Chamada();
$chamadosFiltrados = $chamada->buscarChamadasAdmin($status);

$_SESSION['filtro_resultado'] = $chamadosFiltrados;
$_SESSION['status_filtro'] = $status;

header('Location: ../view/chamadaAdmin.php');
exit;

?>