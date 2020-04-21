<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>ECEbay</title>
	<meta charset="utf-8">






	<style type="text/css">
		body {
			padding: 0px;
			margin: 0px;
			background: #f2f6e9;
		}
		/*--- navigation bar ---*/
		.navbar {
			background:#33aaff;
		}
		.nav-link, .navbar-brand {
			color: #fff;
			cursor: pointer;
		}
		.nav-link {
			margin-right: 1em !important;
		}
		.nav-link:hover {
			color: #000;
		}
		.navbar-collapse {
			justify-content: center;
		}






		.row{
			background: #ffffff;
			position: center;
			padding: 10px 0 100px;
			border: 1px solid #333;
		}




		

		.header {
			/*background-image: url('background.jpg');
			background-size: cover;
			background-position: center;*/
			position: left;
			background: #CCD3D7;

		}
		/*overlay {
			position: absolute;
			min-height: 100%;
			min-width: 100%;
			left: 0px;
			top: 0px;
			background-color: rgba(0, 0, 0, 0.4);
		}*/
		.description {
			left: 50%;
			position: absolute;
			top: 45%;
			transform: translate(-50%, -55%);
			text-align: center;
		}
		.description h1 {
			color: #33aaff;
		}
		.description p {
			color: #fff;
			font-size: 1.3rem;
			line-height: 1.5;
		}
		.description button {
			border:1px solid #6ab446;
			background-color: #6ab446;
			border-radius: 0;
			color: #fff;
		}
		.description button:hover {
			border:1px solid #fff;
			background-color: #fff;
			color: #000;
		}
		.features {
			margin: 4em auto;
			padding: 1em;
			position: relative;
		}
		.feature-title {
			color: #333;
			font-size: 1.3rem;
			font-weight: 700;
			margin-bottom: 20px;
			text-transform: uppercase;
		}
		.features img {
			-webkit-box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
			-moz-box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
			box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.4);
			margin-bottom: 16px;
		}
		.features .form-control,
		.features input {
			border-radius: 0;
		}
		.features .btn {
			background-color: #589b37;
			border: 1px solid #589b37;
			color: #fff;
			margin-top: 20px;
		}
		.features .btn:hover {
			background-color: #333;
			border: 1px solid #333;
		}
		.page-footer {
			background-color: #CCD3D7;
			color: #CCD3D7;
			padding: 40px 0 30px;
		}
		.footer-copyright {
			color: #666;
			padding: 25px 0 ;
		}
	</style>







	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script
	src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script type="text/javascript">
	$(document).ready(function(){
	$('.header').height($(window).height());
	});
	</script>
</head>
<body>
	<nav class="navbar navbar-expand-md">
		<a class="navbar-brand" href="accueil.php">Logo</a>
		<button class="navbar-toggler navbar-dark" type="button"
			data-toggle="collapse" data-target="#main-navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="main-navigation">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" href="accueil.php">Accueil</a></li>
				<li class="nav-item"><a class="nav-link" href="categorie.html">Catégorie</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Achat</a></li>
				<li class="nav-item"><a class="nav-link" href="vendre.php">Vendre</a></li>
				<li class="nav-item"><a class="nav-link" href="moncompte.php">Votre Compte</a></li>
				<li class="nav-item"><a class="nav-link" href="panier.php">Panier</a></li>
				<li class="nav-item"><a class="nav-link" href="inscription.php">S'inscrire</a></li>
				<li class="nav-item"><a class="nav-link" href="connection.php">Se connecter</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Admin</a></li>
			</ul>
		</div>
	</nav>



	<header class="page-header header container-fluid">
		<div class="overlay"></div>
		<div class="description">
			<div class="row">
				<h1>Entrer vos coordonnées de livraison.</h1>
				<br>
				<table>
		            <tr>
		                <td>Nom:</td>
		                <td><input type="text" name="nom"></td>
		            </tr>
		            <tr>
		                <td>Prenom:</td>
		                <td><input type="text" name="prenom"></td>
		            </tr>
		            <tr>
		                <td>Adresse ligne 1:</td>
		                <td><input type="number" name="adresse"></td>
		            </tr>
		            <tr>
		            	<br>
		                <td colspan="2" align="center">
		                 	
							<input type="submit" name="adddelivery_button" value="Valider">
		             </td>
		            </tr>
		        </table>
		    </div>
		</div>
	</header>



	



	<footer class="page-footer">
		
		<div class="footer-copyright text-center">&copy; 2020 Copyright | Droit d'auteur: webDynamique.ece.fr</div>
		
	</footer>
</body>
</html>
