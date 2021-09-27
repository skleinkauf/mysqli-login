<?php 
	/* essa sessao esta verificando se o id esta vazio ou nao, ou seja, se o usuario efetuou login, caso o usuario nao tenha efetuado login, vai sempre encaminhar para a pagina de login, conforme especificado no final do arquivo */

	session_start();
	if(isset($_SESSION['id']) && !empty($_SESSION['id']))
	{
 		require("conexao.php");

 		$idUsuario = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="pt">

	<head>
  		<meta charset="utf-8">
  		<meta content="width=device-width, initial-scale=1.0" name="viewport">

  		<title>LOGIN MYSQLI</title>
  		<meta content="" name="description">
  		<meta content="" name="keywords">

  		<!-- Google Fonts -->
  		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  		<!-- link CSS -->
  		<link href="style.css" rel="stylesheet">

	</head>

	<body>
		<section class="logado-sucesso">
			<!-- aqui ele seleciona as informacoes do banco de dados, de acordo com o id do usuario logado, e vai printar na tela algumas informacoes, como o nome e a idade -->
			<?php
				$sqlUsuario = mysqli_query($conexao, "SELECT * FROM login WHERE id = '$idUsuario'");

				foreach ($sqlUsuario as $key => $value) { ?>

			<h1> Ola, <?php echo $value['nome']; ?>  parabens voce logou com sucesso!</h1>
			<h1>Sua idade e de : <?php echo $value['idade']; ?></h1>
			<?php 
				} 
			?>
			<a href="logout.php">Clique aqui para deslogar</a>
		</section>
	</body>
</html>

<?php 
	/* caso o usuario nao esteja logado e tente acessar essa pagina, ele sera redirecionado para o login */
	} 
	else 
	{ 
		header("Location: login.php"); 
	}
?>