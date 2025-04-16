<?php
require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = $_POST['senha'] ?? '';
$lembrar = isset($_POST['lembrar']);

$usuarioLogado = Autenticador::login($email, $senha);

if ($usuarioLogado === false) {
    header('Location: login.php?erro=E-mail ou senha inválidos.');
    exit;
}

Sessao::set('usuario_nome', $usuarioLogado->getNome());
Sessao::set('usuario_email', $usuarioLogado->getEmail());
Sessao::set('logged_in', true);

if ($lembrar) {
    setcookie('email', $email, time() + (86400 * 10), "/");
}

header('Location: dashboard.php?sucesso=Login realizado com sucesso!');
exit;
?>