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
			<!-- o action esta informando em qual arquivo esta o php que ira processar o formulario -->
				<form method="POST" action="criar-conta-function.php">
					<label>Nome:</label><br />
					<input type="text" name="nomeLogin" class="form-input-estilo">
					<br />
					<!-- o status esta verificando se o usuario digitou todas as informacoes, caso nao esteja digitado ele printa na tela o que falta -->
					<?php
						if(isset($_GET['status']) && $_GET['status'] == "faltaNome")
                		{
                    ?>
                        <div class="falta-info-criar-conta">Nome Obrigatorio.</div>        
                    <?php
                		}
					?>

					<br />

					<label>Idade:</label><br />
					<input type="number" name="idadeLogin" class="form-input-estilo">
					<br />
						<?php
							if(isset($_GET['status']) && $_GET['status'] == "faltaIdade")
							{ 
						?>
							<div class="falta-info-criar-conta">Idade obrigatoria</div>
						<?php
							}
						?>
					<br />

					<label>Email:</label><br />
					<input type="email" name="emailLogin" class="form-input-estilo">
                    <br />
                    <?php
                    	if(isset($_GET['status']) && $_GET['status'] == "faltaEmail")
                    	{ 
                    ?>
                    		<div class="falta-info-criar-conta">Email Obrigatorio</div>
                    <?php 
                    	}
                    ?>


                    <?php
                    	if(isset($_GET['status']) && $_GET['status'] == "emailExiste")
                    	{ 
                    ?>
                    		<div class="falta-info-criar-conta">Email ja cadastrado</div>
                    <?php 
                    	}
                    ?>
                    <br />

					<label>Senha:</label><br />
					<input type="password" name="senhaLogin" class="form-input-estilo">
					<br />
					<?php
						if(isset($_GET['status']) && $_GET['status'] == "faltaSenha")
						{ 
					?>
							<div class="falta-info-criar-conta">Senha Obrigatoria</div>
					<?php
						}
					?>
					<br />

					<label>Repita a Senha:</label><br />
					<input type="password" name="senhaLoginConfirmar" class="form-input-estilo">
					<br />
					<?php
						if(isset($_GET['status']) && $_GET['status'] == "faltaConfirmarSenha")
						{
					?>
							<div class="falta-info-criar-conta">Confirmacao da senha obrigatoria.</div>
					<?php
						}
					?>
					<?php
						if(isset($_GET['status']) && $_GET['status'] == "senhasDiferentes")
						{ 
					?>
							<div class="falta-info-criar-conta">As senhas digitadas precisam ser identicas</div>
					<?php
						}
					?>
					<br />
					<button type="submit" name="efetuarLogin" class="form-button">Logar no Sistema</button>
					
				</form>
		</section>
	</body>
</html>