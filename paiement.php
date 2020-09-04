<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/PageConnexion.css">
	<title>Page Paiment</title>
</head>

<body>
<?php include("header.php"); ?>
	<section class="section-Miracle justepaiement">
		<div class="formulaire">
		<h1 class="lesh1"> Renseingez vos moyens de paiement </h1>
		<fieldset>
			<legend> Paiement </legend>
			<form>
				
				<div class="div-form">
					<p >Méthode paiement
						<input required="" type="radio" name="moyenpaiement" id="moyenpaiement1">
						<label class="labelisation" for="moyenpaiement1"> <img src="img/visa.png"> </label>
	
						<input required="" type="radio" name="moyenpaiement" id="moyenpaiement2">
						<label class="labelisation" for="moyenpaiement2"> <img src="img/mastercard.png"> </label>
	
						<input required="" type="radio" name="moyenpaiement" id="moyenpaiement3">
						<label class="labelisation" class="labelisation" for="moyenpaiement2"> <img src="img/cheque2.jpg"> </label>
					</p>
				</div>

				<div class="div-form">
					<p>
						<label for="Detenteur"> Détenteur </label>
						<input class="labelisation" placeholder="Jean CONORD" required="" type="text" name="Detenteur" id="Detenteur">
					</p>
				</div>
				

				<div class="div-form">
					<p> <label for="numerocarte">Numero Carte </label>
						<input class="labelisation" placeholder="0000 0000 0000 0000" required="" type="number" name="numerocarte"  >
					</p>
				</div>

				<div  class="div-form">
					<p>
						<label class="labelisation" for="expiration"> Date d'expiration </label>
						<input placeholder="02/25" required="" type="number" name="expiration" id="expiration">
					</p>
				</div>

				<div class="div-form">
					<p> <label class="labelisation" for="Cryptogramme"> Cryptogramme </label>
						<input placeholder="000" required="" type="number" name="Cryptogramme"  >
					</p>
				</div>
				
			</form>
		</fieldset>

		<div class="droite"> <input class="button" type="submit" name="envoyer" id="envoyer" value="Payer"> </div>
		</form>

		
	</section>

	<?php include("footer.php"); ?>
</body>
</html>