<?php
    session_start();
    require_once "../model/Chamada.php";

    $chamada = new Chamada;
    if($chamada->alterarChamada($_SESSION['id_update'], $_POST['cxdescricao'], $_POST['cxnome-update'])){
        echo "<script>alert('Chamado alterado com sucesso!'); 
        window.location.href = 'chamadaPage.php';</script>";
    }
    else{
        echo "<script>alert('Erro ao alterar chamado...'); 
        window.location.href = 'chamadaPage.php';</script>";
    }
    

?>