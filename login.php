<?php
$email_cookie = $_COOKIE['email'] ?? '';
$erro = $_GET['erro'] ?? '';
$sucesso = $_GET['sucesso'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
    window.onload = function () {
        const sucesso = <?= json_encode($sucesso) ?>;
        const erro = <?= json_encode($erro) ?>;
        if (sucesso) alert(sucesso);
        if (erro) alert(erro);
    };
    </script>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="POST" action="processa_login.php">
        <input type="email" name="email" value="<?= htmlspecialchars($email_cookie) ?>" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        
        <label>
            <input type="checkbox" name="remember"> 
                Lembrar e-mail
        </label>

        <button type="submit">Login</button>
    </form>
    <a href="cadastro.php">Criar conta</a>
</div>
</body>
</html>