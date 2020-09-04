<!DOCTYPE html>
<html lang="en">
<head>
<?php
require("connexion.php");
$categories= $db->query('SELECT * FROM CATEGORIE');
if (isset($_FILES['image']) and isset($_POST['description']) and isset($_POST['prix']) and isset($_POST['categorie']) and isset($_POST['titre']))
{
	
$erreur=$_FILES['image']['error'];
$titre = $_POST['titre'];
$categorie=$_POST['categorie'];
$description = $_POST['description'];
$prix=$_POST['prix'];
$image= $_FILES['image']['name'];
$tmp=$_FILES['image']['tmp_name'];
/*print_r($titre);
print_r($categorie);
print_r($description);
print_r($prix);
print_r($image);*/
//endroit qu'on mettra notre image
$chemin='/images ';
//pour aller verifier son existence 
$retour='images/'.$image;

if($erreur == UPLOAD_ERR_OK) //pas d'erreur lors du chargement
{
	move_uploaded_file($tmp, $_SERVER['DOCUMENT_ROOT'].'/Presentation_finale/'.$chemin.'/'.$image);
	$verif=$db->query('SELECT img_produit FROM Produit WHERE img_produit ="'.$retour.'"');
	if($verif->fetch())
	{
		$msg="Ce fichier que vous voulez charger existe deja dans la base";
		echo $msg;
	}
	elseif(!$verif->fetch())
	{
	
	$fichiers= $db->query("INSERT INTO Produit (id_categorie,detail_produit, prix, img_produit, titre_produit )
	VALUES('".$_POST['categorie']."','".$description."','".$prix."','".$retour."','".$titre."')");
	
	$msg="Votre enregistrement a bien été effectué";
	echo $msg;
	
	}
	
	
//var_dump($_POST['image']);	
}
}





?>
    <title>$Nom_Du_Produit</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/stylePanier.css">
</head>
<body>
<?php include("header.php");?>

<!-- ------------------------------debut page boutique----------------------------- -->
   
		
				<section class="container-fluid">
        
        <div class="container">
            <h1 class="h1panier"> Vous Pouvez ajouter un article </h1>
            

            <table class="table">
              <tbody class="tbodypanier">
				<form action="index.php" method="post" enctype="multipart/form-data"  >
				
				<tr><td>Catégorie</td><td><select name="categorie">
				<?php
				//on recupère les valeurs dans la table catégorie
				while($cate = $categories->fetch())
				{
				?>
				<option value="<?=$cate['id_categorie']?>"><?=$cate['nom']?></option>
				<?php
				}
				$categories->closeCursor();
				?>
				</select></td>
				</tr>
				<tr><td>Description</td><td><input name="description" typ="text"></td></tr>
				<tr><td>Prix </td><td><input name="prix" type="text"></td></tr>
				<tr><td>Titre </td><td><input name="titre" type="text"></td></tr>
				<tr><td>Image </td><td><input type="file" name="image" require="require"/></td></tr>
				
				<tr><td><input type="submit" value="envoyer"/>	</td></tr>

              </tbody>
            </table>
			
        </div>
    </section>

</body>
</html>