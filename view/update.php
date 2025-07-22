<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.html");
        exit;
    }
    if ($_SESSION['nivel'] !== 'admin') {
        header("Location: login.html");
        exit;
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <title>ShiNekkoNET - Alterando Chamados</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo-area">
                <a href="../index.html">
                    <img id="logo-nekko" src="../imagens/Logo minimalista ShiNekkoNET.png" alt="Foto da empresa ShiNekkoNET">
                </a>
                <h1>ShiNekkoNET</h1>
            </div>
            <nav>
                <a href="login.html">Login</a>
                <a href="cadastro.html">Cadastro</a>
                <a href="../controller/chamadaPage.php">Chamadas</a>
            </nav>
        </header>
        <main>
            <form class="formulario-edicao" method="POST" action="../controller/updateDB.php">
                <label for="cxnome-update">Nome:</label>
                <input type="text" name="cxnome-update" value="<?= htmlspecialchars($_SESSION['chamada']['nome_cliente']) ?>"> <br>
                <label for="cxdescricao">Nova descrição:</label><br>
                <textarea name="cxdescricao" id="descricao" rows="4" required><?= htmlspecialchars($_SESSION['chamada']['descricao']) ?></textarea><br><br>
                <button type="submit">Salvar Alterações</button>
            </form>
        </main>
        <footer>
            <div class="fale-conosco">
                    <p>Ligue: 119000-0000</p>
                </div>

                <div class="email">
                    <p>Email: admin@gmail.com</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>