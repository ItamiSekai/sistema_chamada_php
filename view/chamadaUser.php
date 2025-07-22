<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: login.html");
        exit;
    }
    if (isset($_SESSION['chamada_buscada'])) {
        $chamadoBuscado = $_SESSION['chamada_buscada'];
        unset($_SESSION['chamada_buscada']);
    }

    require_once '../model/Chamada.php';

    $chamada = new Chamada();
    $chamadasUsuario = $chamada->buscarChamadas($_SESSION['id']);

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
    <title>ShiNekkoNET - Chamados</title>
  
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
            <div class="busca-chamada">
                <form method="post" action="../controller/buscaChamada.php">
                    <label for="busca_id">Buscar chamado por ID:</label>
                    <input type="number" name="busca_id" id="busca_id" required>
                    <button type="submit">Buscar</button>
                </form>
            </div>

            <?php if (!empty($chamadoBuscado)): ?>
                <div class="chamadas-pesquisadas">
                    <h3>Resultado da busca:</h3>
                    <table border="1" cellpadding="10" cellspacing="0">
                        <tr>
                            <th>ID</th>
                            <th>Cliente</th>
                            <th>Descrição</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td><?= htmlspecialchars($chamadoBuscado['id']) ?></td>
                            <td><?= htmlspecialchars($chamadoBuscado['nome_cliente']) ?></td>
                            <td><?= htmlspecialchars($chamadoBuscado['descricao']) ?></td>
                            <td><?= htmlspecialchars($chamadoBuscado['estado']) ?></td>
                        </tr>
                    </table>
                </div>
            <?php elseif (isset($_GET['notfound'])): ?>
                <div class="chamadas-pesquisadas">
                    <p>Chamado não encontrado ou não pertence a você.</p>
                </div>
            <?php endif; ?>

            <?php if (!empty($chamadasUsuario)): ?>
                <div class="chamadas-feitas">
                    <h3>Seus Chamados</h3>
                    <table border="1" cellpadding="10" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Cliente</th>
                                <th>Descrição</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($chamadasUsuario as $c): ?>
                                <tr>
                                    <td><?= htmlspecialchars($c['id']) ?></td>
                                    <td><?= htmlspecialchars($c['nome_cliente']) ?></td>
                                    <td><?= htmlspecialchars($c['descricao']) ?></td>
                                    <td><?= htmlspecialchars($c['estado']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="chamadas-feitas">
                    <p>Você ainda não tem chamadas registradas.</p>
                </div>
            <?php endif; ?>

            <div class="botoes">
                <a href="novoChamado.php"><button class="botao">Novo Chamado</button></a>
                <a href="../controller/logout.php"><button class="botao">Sair</button></a>
            </div>
        </main>

        <footer>

            <div class="fale-conosco">
                <p>Ligue: 119000-0000</p>
            </div>

            <div class="email">
                <p>Email: admin@gmail.com</p>
            </div>

        </footer>
    </div>
</body>
</html>