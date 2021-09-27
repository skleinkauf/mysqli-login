<?php
	session_start(); 
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
		<section class="form-mysqli">
			<!-- o action aqui, esta buscando onde esta o codigo php, que vai processar os dados do formulario -->
				<form method="POST" action="login-function.php">

					<label>Email:</label><br />

					<input type="email" name="emailLogin" class="form-input-estilo">
                    <br />
                    <!-- aqui eu uso o php para verificar atraves do status, caso o status esteja vazio, na verificacao do php, ele vai voltar e printar na tela o valor do status vazio, caso contrario, ele ignora -->
                    <?php
                    	if (isset($_GET['status']) && $_GET['status'] == "faltaEmailLogin") 
                    	{ 
                    ?>
                    		<div class="falta-info-criar-conta">Email Obrigatorio</div>
                    <?php 
                		} 
                	?>
                    <br />
					<label>Senha:</label><br />
					<input type="password" name="senhaLogin" class="form-input-estilo">
					<br />
					<?php 
						if (isset($_GET['status']) && $_GET['status'] == "faltaSenhaLogin") 
						{
					?>
							<div class="falta-info-criar-conta"> Senha Obrigatoria</div>
					<?php
						}
					?>
					<br />
					<button type="submit" name="efetuarLogin" class="form-button">Logar no Sistema</button>
					<?php
						if (isset($_GET['status']) && $_GET['status'] == "emailSenhaIncorretos") 
						{
					?>
							<div class="falta-info-criar-conta"> Email ou Senha incorretos</div>
					<?php
						}
					?>
					
				</form>
		</section>
	</body>
</html>