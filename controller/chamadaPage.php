<?php
    session_start();

    require_once "../model/User.php";

    if (!isset($_SESSION['id'])) {
        header("Location: ../view/login.html");
        exit;
    }

    if ($_SESSION['nivel'] === 'admin') {
        header("Location: ../view/chamadaAdmin.php");
        exit;
    } elseif ($_SESSION['nivel'] === 'user') {
        header("Location: ../view/chamadaUser.php");
        exit;
    } else {
        echo "Nível de acesso desconhecido.";
    }
?>