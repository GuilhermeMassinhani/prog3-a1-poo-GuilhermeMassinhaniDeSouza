<?php
require_once 'classes/Sessao.php';
Sessao::iniciar();
//me auxilia a remover os dados em "cache / coockie " 
Sessao::destruir();
header('Location: login.php?Sucesso = O logout foi realizado com sucesso! ');
exit;
?>