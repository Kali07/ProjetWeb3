<!DOCTYPE html>
<html>
<head>
<?php
include("connexion.php");
include("session.php");
if(isset($_POST['identifiant']) and isset($_POST['mdp']))
{
	//$req=$db->query('SELECT * FROM client WHERE email="'.$login.'" AND mot_de_passe="'.$login.'"');
	$login=$_POST['identifiant'];
	$pwd=hash('sha256',$_POST['mdp']);
	
	if(!empty($login) and !empty($pwd))
	{
		$req=$db->prepare("SELECT * FROM client WHERE email=:email AND mot_de_passe=:mot_de_passe");
			$req->execute(array(':email'=>$login,'mot_de_passe'=>$pwd));
			$exist=$req->fetch();
			if($exist)
			{
				echo'correct';
				session_start();
				$_SESSION['id_client']=$exist['id_client'];
				$_SESSION['nom']=$exist['nom'];
				$_SESSION['prenom']=$exist['prenom'];
				$_SESSION['civilite']=$exist['civilite'];
				header('Location:index.php');
				
			}
			else
			{
				echo'incorrect';
			}
}
}
?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/PageConnexion.css">
	<title>Page Coordonnées</title>
</head>



<body>
<?php include("header.php");?>
<section class="section-Miracle">
	
	<div class="banniere">
	</div>

	<div class="formulaire">
	
		<h1 class="lesh1">Vos informations personnelles</h1>
	<p>Veuillez renseigner vos informations personnelles</p>

	<form id="form1" method="POST" action=""> 
	<fieldset>
		<legend> Creation de compte </legend>
				
			<div class="div-form">
				<p>
					<label for="mail"> *Votre Mail</label>
					<input placeholder="jean@gmail.com" required="" type="email" name="identifiant" id="mail" autofocus>
				</p>
				<img class="intero mail-intero" src="img/point_int.jpg" 
				alt="Votre mail doit contenir aumoins 3 caractères suivis d'une @. 
				Les caractères spéciaux ne sont pas acceptés.">
			</div>

			
			<div class="div-form">
				<p>
					<label for="mdp"> *Entrez Mot de Passe</label>
					<input required="" type="password" name="mdp" id="mdp">
				</p>
					<img class="intero mdp-intero" src="img/point_int.jpg"
					alt="Le mot de passe doit faire 8 caractères minimum et Contenir 
					aumoins : 1 Majuscule, 1 Minucule, 1 chiffre et 1 caractère spécial">
			</div>

	</fieldset>

	<div class="droite"> <input class="button" type="submit" name="envoyer" id="envoyer" value="Suivant"> </div>
	</form>

	
	
	</div>

</section>
<?php include("footer.php");?>
</body>
</html>