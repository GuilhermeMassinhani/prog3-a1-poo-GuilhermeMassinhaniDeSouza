<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Cadastro e login de usuários</title>

</head>
<body>
<body>
    <div class="container_principal">
        <div class="container_desc">
            <h1>Preencha o seguinte formulário para roubarmos os seus dados: </h1>
        </div>
        <div class="container">
            <h2>Cadastro de novo usuário no sistema em PHP</h2>
                <form method="POST" action="processa_cadastro.php">
                    <input type="text" name="nome" placeholder="Nome" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="senha" placeholder="Senha" required>
            
                    <button type="submit">Cadastrar</button>
                </form>
            <a href="login.php">Já possui conta? Realize login clicando aqui</a>
        </div>
    </div>
</body>

</body>
</html>