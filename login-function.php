<?php 
	// inicia a sessao
	session_start();
	// verifica a conexao
	require("conexao.php");
	// verifica os campos que foram preenchidos no login
	if (isset($_POST['efetuarLogin'])) 
	{
		// caso o campo esteja vazio, ele vai printar na tela usando o status, onde ele vai informar qual campo esta vazio, ele so da segmento se todos os campos forem devidamente preenchidos
		$emailLogin = $_POST['emailLogin'];
		if ($emailLogin == "") 
		{
			header("Location: login.php?status=faltaEmailLogin");
			exit();
		}
		$senhaLogin = $_POST['senhaLogin'];
		if ($senhaLogin == "") 
		{
			header("Location: login.php?status=faltaSenhaLogin");
			exit();
		}
		// ele esta recuperando a senha, e revertendo o incript dela, para conferir se esta ok
		$senha = md5($senhaLogin);

		// seleciona os dados do usuario no banco, caso esses dados estejam corretos
		$sqlLogar = mysqli_query($conexao, "SELECT * FROM login WHERE email = '$emailLogin' AND senha = '$senha'");

		// verifica se existe dados que conferem com o que foi digitado, eu poderia colocar maior que 0, porem, fica mais facil de hackear, e melhor colocar == a 1, ja que tem de ter apenas um registro com o mesmo email
		$numRows = mysqli_num_rows($sqlLogar);
		if ($numRows == 1) 
		{
			// estou salvando o id do usuario na sessao, eu posso resgatar essa sessao a qualquer momento no projeto
			$rowLogin = mysqli_fetch_array($sqlLogar);
			$_SESSION['id'] = $rowLogin['id'];
			header("Location: logado.php");	
		}
		else
		{
			header("Location: login.php?status=emailSenhaIncorretos");
			exit();
		}
	}
?>