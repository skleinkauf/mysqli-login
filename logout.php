<?php
//conexao com o banco de dados
require "conexao.php";
//inicia a sessao
session_start();
//termina a sessao
session_destroy();
//redireciona para a pagina de login
header("location: login.php");
?>