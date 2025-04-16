<?php
require_once 'Usuario.php';

class Autenticador {
    private static array $usuarios = [];

    public static function carregarCliente(): void {
        if (isset($_SESSION['usuarios'])) {
            self::$usuarios = $_SESSION['usuarios'];
        }
    }

    public static function salvarCliente(): void {
        $_SESSION['usuarios'] = self::$usuarios;
    }

    public static function registrar(string $nome, string $email, string $senha): bool {
        self::carregarCliente();
        foreach(self::$usuarios as $user) {
            if ($user->getEmail() === $email) return false;
        }
        $novoUsuario = new Usuario($nome, $email, $senha);
        self::$usuarios[] = $novoUsuario;
        self::salvarCliente();
        return true;
    }

    public static function login(string $email, string $senha) {
        self::carregarCliente();
        foreach(self::$usuarios as $user) {
            if ($user->getEmail() === $email && $user->autenticar($senha)) {
                return $user;
            }
        }
        return false;
    }
}
?>