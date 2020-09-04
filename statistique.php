<!DOCTYPE html>
<html>
<head>
<?php

require("connexion.php");
if (!empty($_GET['player']))
{
    $nono=$_GET['player'];
    $doudou= $db->query('select * from joueurs jr, statistique st where jr.id_joueur = st.joueur_id and st.joueur_id="'.$nono.'"');
	//select * from joueurs jr, statistique st where jr.id_joueur = st.joueur_id and st.joueur_id = 27;
    $roro= $doudou->fetch();
}
?>
<link rel="stylesheet" href="css/bootstrap.css">
	<meta charset="UTF-8">
	

</head>
<body>

<?php
include("header.php");
?>
<?php
$poste = $roro['poste'];
if($poste == 1)
	$joue = 'Gardien de buts';
if($poste == 2)
	$joue = 'Defenseur';
if($poste == 3)
	$joue = 'Milieu de Terrain';
if($poste == 4 )
	$joue = 'Attaquant';
?>
<br><br>
<div class="card mb-3" style="max-width: 1590px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?=$roro['avatar_joeur']?>" class="card-img" alt="under.jpg">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"> <?=$roro['prenom']?> &nbsp <?=$roro['nom']?></h5>
        <p class="card-text">Club: <?=$roro['club']?> </p>
		<p class="card-text">Nationalité : <?=$roro['nationalite']?></p>
		<p class="card-text">Position : <?=$joue?></p>
		<p class="card-text">But : <?=$roro['buts']?></p>
		<p class="card-text">Match jouer : <?=$roro['apparition']?></p>
		<p class="card-text"> Numéro de Maillot: <?= rand(2,18)?></p>
      </div>
    </div>
  </div>
</div>



<br><br><br><br><br>
<?php
include("footer.php");
?>			


</body>
</html>