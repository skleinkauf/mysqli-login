<?php 
	
	// esse e o arquivo que contem a conexao com o banco de dados
	require("conexao.php");

	// o isset e utlizadado para verificar se a variavel existe, caso seja verdadeiro, ele executa, caso seja falso, ele nao executa
	if (isset($_POST['efetuarLogin'])) 
	{
			// addslashes esta sendo usado como uma medida de precaucao, para tentar impedir injecoes, lembrando que esse codigo e mais funcional, entao a seguranca nao esta 100%
		$nome = addslashes($_POST['nomeLogin']);
		if ($nome == "") 
		{
				// esse header e acionado caso o usuario nao digite o que e pedido no campo, evitando assim de dar segmento a algo 	incompleto
        	header("Location: criar-conta.php?status=faltaNome");
        		// usei o exit ao inves do retorn, pois o return permite que o script continue caso necessario, e o exit termina, eu quero terminar, caso nao esteja completo
        	exit();
		}
			// o post esta buscando as informacoes da pagina criar conta
		$idade = addslashes($_POST['idadeLogin']);
		if ($idade == "") 
		{
			header("Location: criar-conta.php?status=faltaIdade");
			exit();
		}
		$email = addslashes($_POST['emailLogin']);
		if ($email == "") 
		{
			header("Location: criar-conta.php?status=faltaEmail");
			exit();
		}
		$senha = addslashes($_POST['senhaLogin']);
		if ($senha == "") 
		{
			header("Location: criar-conta.php?status=faltaSenha");
			exit();
		}
		$senhaConfirmar = addslashes($_POST['senhaLoginConfirmar']);
		if ($senhaConfirmar == "") 
		{
			header("Location: criar-conta.php?status=faltaConfirmarSenha");
			exit();
		}
			// aqui estou verificando se a senha e a confirmacao de senha sao identicas, caso nao seja, ele avisa na tela
		if ($senha != $senhaConfirmar) 
		{
			header("Location: criar-conta.php?status=senhasDiferentes");
			exit();
		}
			// aqui ele esta incriptando a senha para maior seguranca
		$senhaCript = md5($senha);
			// aqui ele esta verificando se o email ja esta cadastrado, caso esteja, ele nao permitira um novo cadastro, caso nao exista este email no banco de dados, ele deixa cadastrar normalmente
		$sqlVerificaEmail = mysqli_query($conexao, "SELECT email FROM login WHERE email = '$email'");

		$numRowsVerifica = mysqli_num_rows($sqlVerificaEmail);
		if ($numRowsVerifica > 0) 
		{
			header("Location: criar-conta.php?status=emailExiste");
			exit();
		}
		else
		{ 

				// aqui estou salvando as informacoes usando o mysqli, depois de verificar todas as etapas a cima, caso esteja tudo ok, ele registra no banco de dados
			$sqlCriarConta = mysqli_query($conexao, "INSERT INTO login (nome, idade, email, senha) VALUES ('$nome', '$idade', '$email', '$senhaCript')");
				// esse header esta indicando para onde ir, apos a conta criada
			header("Location: login.php");
		}
	}

?>