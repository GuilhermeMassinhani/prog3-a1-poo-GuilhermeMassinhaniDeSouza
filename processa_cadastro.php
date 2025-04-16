<?php
require_once 'classes/Sessao.php';
require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
Sessao::iniciar();

$name = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = $_POST['senha'] ?? '';

if (!$name || !$email || !$password) {
    header('Location: cadastro.php?erro=Para continuar preencha todos os campos corretamente.');
    exit;
}

if (Autenticador::registrar($name, $email, $password)) {
    header('Location: login.php?sucesso=Cadastro realizado com sucesso! Faça login.');
} else {
    header('Location: cadastro.php?erro=E-mail já cadastrado.');
}
exit;
?>