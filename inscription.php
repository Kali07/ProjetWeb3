<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html>
<head>
	<?php
	include("connexion.php");
	
	//verification si le mail existe deja
function MailDansBase($mail)
{
	require('connexion.php');
	$req = $db->prepare('SELECT email FROM client WHERE email = :email');
	$req->execute(array(':email'=>$mail));
$doublon= $req->fetch();

if($doublon) //si le mail existe deja on envoi vrai 
{
	//echo 'Le mail existe deja';
	return true;
}

}


	if(!empty($_POST['identifiant']) and !empty($_POST['confirmMail']) and !empty($_POST['mdp']) and !empty($_POST['mdpconfirm'])
		and !empty($_POST['genre']) and !empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['CP'])
		and !empty($_POST['ville']) and !empty($_POST['adresse']) and !empty($_POST['pays']) and !empty($_POST['tel']) )
		{
		$email=$_POST['identifiant'];
		$confmail = $_POST['confirmMail'];
		//$mp=$_POST['mp'];
		$mp=hash('sha256',$_POST['mdp']);
		$confmp=hash('sha256',$_POST['mdpconfirm']);
		$civilite=$_POST['genre'];
		$nomc=$_POST['nom'];
		$prenomc=$_POST['prenom'];
		$adresse=$_POST['adresse'];
		$codepostal=$_POST['CP'];
		$ville=$_POST['ville'];
		$pays=$_POST['pays'];
		$tel=$_POST['tel'];
			echo "On est inscrit ";
			//print_r($civilite);
			//print_r($mp);
		if(($mp==$confmp)and MailDansBase($email)!=true)
		{
			$client= $db->query("INSERT INTO client(email,mot_de_passe,civilite,nom,prenom,adresse,code_postal,ville,pays,telephone,avatar)
			VALUES('".$email."','".$mp."','".$civilite."','".$nomc."','".$prenomc."','".$adresse."','".$codepostal."','".$ville."','".$pays."','".$tel."','images/avatar.jpg')");
			header('Location:login.php');
			//var_dump($client);
		}
		else
		{
			echo"Mail déjà utilisé ou Mots de passes non identiques";
		}
		}

		
	

	?>

	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/PageConnexion.css">
	<script type="text/javascript" src="newscript.js" async></script>
	<title>Page Coordonnées</title>
</head>



<body>
<?php include("header.php");?>
<section class="section-Miracle">
	
	<div class="banniere">
	</div>

	<div class="formulaire">
	
		<h1 class="lesh1">Vos informations personnelles</h1>
	<p>Les champs précédés d'une * sont obligatoires</p>

	<form id="form1" method="post" action="inscription.php"> 
	<fieldset>
		<legend> Creation de compte </legend>
			
			<input type="checkbox" name="client" id="client"><label  class="dejaclient" for="client">Je suis deja client </label>
			
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
					<label for="confirmMail"> *Confirmez Votre Mail</label>
					<input required="" type="text" name="confirmMail" id="confirmMail" disabled>
				</p>
					<img class="intero confirmMail-intero" src="img/point_int.jpg" 
					alt="Les deux mails ne correspondent pas">
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
			
			<div class="div-form">
				<p>
					<label for="mdpconfirm"> *Confirmez Mot de passe</label>
					<input required="" type="password" name="mdpconfirm" id="mdpconfirm" disabled>
				</p>	
					<img class="intero intero-mdpconfirm" src="img/point_int.jpg" 
					alt="Les deux mots de passe ne correspondent pas">
			</div>

			
			
	</fieldset>

	<fieldset>
		<legend> Informations personnelles </legend>
			
			<div class="div-form">
				<p class="monsieurMadame">
					*<input type="radio" name="genre" id="monsieur" required>Monsieur
					<input type="radio" name="genre" id="madame">Madame
				</p>
			</div>

			<div class="div-form">
				<p>
					<label for="nom"> *Nom</label>
					<input placeholder="Jean"required="" type="text" name="nom" id="nom">
				</p>
				<img class="intero nom-intero" src="img/point_int.jpg" 
					alt="Votre nom doit contenir aumoins 2 caractere.">
			</div>

			<div class="div-form">
				<p>
					<label for="prenom"> *Prenom</label>
					<input placeholder="PAUL" required="" type="text" name="prenom" id="prenom">
				</p>
				<img class="intero prenom-intero" src="img/point_int.jpg" 
					alt="Votre prenom doit contenir aumoins 2 caractere.">
			</div>

			<div class="div-form">
				<p>
					<label for="CP"> *Code Postal</label>
					<input placeholder="75014" required type="number" name="CP" id="CP">
				</p>
				<img class="intero CP-intero" src="img/point_int.jpg" 
					alt="Le code postale doit être composé de 5 chiffres.">
			</div>

			<div class="div-form">
				<p>
					<label for="adresse"> *Adresse</label>
					<input placeholder="2 rue de la moutiche" required="" type="text" name="adresse" id="adresse">
				</p>
				<img class="intero adresse-intero" src="img/point_int.jpg" 
					alt="L'adresse doit contenir aumoins 2 caractere.">
			</div>

			<div class="div-form">
				<p>
					<label for="Ville"> *Ville</label>
					<input placeholder="Paris" required="" type="text" name="ville" id="Ville">
				</p>
				<img class="intero Ville-intero" src="img/point_int.jpg" 
					alt="La ville doit contenir aumoins 2 caractere.">
			</div>

			<div class="div-form">
				<p>
					<label for="pays">*Pays</label>
					<select required="" name="pays" id="pays">
						<option selected value="france">France</option>
						<option value="Belgique">Belgique</option>
						<option value="mc">Mon cul</option>
						<option value="Espagne">Espagne</option>
						<option value="BK">Burkina Faso</option>
					</select>
				</p>
			</div>

			<div class="div-form">
				<p>
					<label for="tel"> *Telephone</label>
					<input placeholder="06 45 89 31 20" required type="text" name="tel" id="tel">
				</p>
				<img class="intero tel-intero" src="img/point_int.jpg" 
					alt="Votre numero doit commencer soit par 06 / 07 / 01 ou 09 ">
			</div>
		
	</fieldset>

	<fieldset>
		<legend> Je souhaite recevoir  </legend>
			
		<div class="div-form">
			<p><label for="pub">Recevoir Pleins de pubs et me faire spam</label> 
				<input checked required="" type="checkbox" name="client" id="pub1"> </p>
		</div>

		<div class="div-form">
			<p><label for="pub">Revoir une New Letter que tu lira jamais</label> 
				<input checked required="" type="checkbox" name="client" id="pub1"> </p>
		</div>

		<div class="div-form">
			<p><label for="pub"> Recevoir des offres priviligiés par mail </label> 
				<input checked required="" type="checkbox" name="client" id="pub1"> </p>
		</div>
			
	</fieldset>
	<div class="droite"> <input class="button" type="submit" name="envoyer" id="envoyer" value="Suivant"> </div>
	</form>

	
	
	</div>

</section>
<?php include("footer.php");?>
</body>
</html>