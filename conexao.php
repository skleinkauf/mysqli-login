<?php
	// essas sao as variaveis de conexao, onde buscar(localhost), qual usuario esta buscando(root), a senha do usuario() e o banco de dados que deseja conexao(login)

	$servidor = "localhost";
	$usuario = "root";
	$usuarioSenha = "";
	$bancoDeDados = "login";

	// aqui ele checa usando o mysqli para ver se as informacoes conferem, caso esteja tudo ok, ele efetua a conexao, e ja podemos trabalhar com o banco
    $conexao = mysqli_connect($servidor, $usuario, $usuarioSenha, $bancoDeDados);

    //aqui se garante que todo envio, consulta e recepção de ficheiros esteja no formato utf8
    mysqli_query($conexao, "SET NAMES 'utf8'");
    mysqli_query($conexao, "SET character_set_connection=utf8");
    mysqli_query($conexao, "SET character_set_client=utf8");
    mysqli_query($conexao, "SET character_set_results=utf8");
    
    // aqui ele checa por erros, caso esteja errada a conexao, o echo vai mostrar minha mensagem, juntamente com o erro que foi gerado, ajuda bastante no debuggin
    if (mysqli_connect_errno())
    {
        echo "Falha na conexao com o MySQLi: " . mysqli_connect_error();
    }
?>
