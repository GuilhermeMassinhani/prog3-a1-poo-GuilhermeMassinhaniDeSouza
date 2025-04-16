<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();

if (!Sessao::get('logged_in')) {
    header('Location: login.php');
    exit;
}

$nome = Sessao::get('usuario_nome');
$emailSessao = Sessao::get('usuario_email');
$emailCookie = $_COOKIE['email'] ?? null;
$sucesso = $_GET['sucesso'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
    window.onload = function () {
        const sucesso = <?= json_encode($sucesso) ?>;
        if (sucesso) alert(sucesso);
    };
    </script>
</head>
<body>
<div class="container">
    <h1>Segue dados salvos do usuário <?= htmlspecialchars($nome) ?> : </h1>
    <strong>Email da sessão atual: </strong> <p> <?= htmlspecialchars($emailSessao) ?></p>
    <br>
    <?php if ($emailCookie): ?>
        <strong>Dado salvo em coockie:</strong> <br/> <p>  <?= htmlspecialchars($emailCookie) ?> </p>
    <?php endif; ?>
    <a href='logout.php'>Logout</a>
</div>
</body>
</html>