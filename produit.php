<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleProd.css">
	<?php
include("session.php");
require("connexion.php");
if (!empty($_GET['produit']))
{
    $nono=$_GET['produit'];
	
    $doudou= $db->query('SELECT * FROM Produit where id_produit="'.$nono.'"');
	//pour stocker l'identifiant produit afin de l'utiliser dans le panier
		$_SESSION['produit_pan']=$_GET['produit'];
	
    $roro= $doudou->fetch();
	$_SESSION['prixprod'] = $roro['prix'];


}
?>

    <title>$Nom_Du_Produit</title>
</head>
<body>
<?php include("header.php");?>
<!-- ------------------------------debut page boutique----------------------------- -->
    <section class="container-fluid" style="margin: 0 0 5% 0;">
        <div class="container-fluid">
            <div class="row">
                
                <div class="imgprincipal row col-lg-9 img align-items-center">
                    
                  <div class="col-lg-2">
                        <aside class="col test">
        <!--Les miniatures : METTRE UN FOREACH POUR PLACER CHAQUES img AUTOMATIQUEMENT -->
                     <?php
        $i=0;
        while($i<5)
        {
            ?>
        
                    <a href="#"><img class="img-thumbnail minia " src="<?=$roro['img_produit']?>"></a>
                <?php
                $i=$i+1;

                }
                ?>                        </aside>
                   </div>
        <!-- L'image Principale -->
                   <aside class="cont_img_princ col-lg-10">
                        <img class="imgPrincipale img-fluid " src="<?=$roro['img_produit']?>">
                   </aside>

                </div>
        <!-- Description + Prix a droite de l'image -->
                <article class="descriptionCourte col-lg-3">
                    <p class="anotation">Catégorie/T-shirt</p>
                    <h1><?=$roro['titre_produit']?></h1>
                    <p class="anotationpara"><?=$roro['detail_produit']?></p>
                    <h3 class="prix"><?=$roro['prix']?> €</h3>

                    <div>
                          <a href="#"><img class="couleur" src="<?=$roro['img_produit']?>"></a>
                          <a href="#"><img class="couleur" src="<?=$roro['img_produit']?>"></a>
                    </div>

                    <div class="container">
                        <div class="row">
        <!-- Formulaire Pour choix de Taille + Quantitée -->
                            <form method="get" action="panier.php">
                                
                                <label for="taille">Choisir une taille  </label><br>

                                <select name="taille" id="taille">
                                    <option selected value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
									<option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>

                                <input value="1" type="number" name="qte_panier" class="qte">
                                <button type="submit" class="boutonAjoutPanier"> AJOUTER AU PANNIER <img class='fleche' src="img/fleche.png"></button>

                            </form>

                            <p><a  class="anotation" href='#'><img class="fleche" src="img/livraison.png">Livraison gratuite sur les commandes à partir de 50€</a></p>
                            <p><a class="anotation" href="#"><img class="iconshop" src="img/shop.png">Vous n'êtes pas chez vous ? Récupérez votre commande en magasin ou dans un point de retrait</a></p>

                        </div>
                    </div>

                </article>

            </div>

        </div>

        <div class="container">
            <article class="row">
                <div class="col-lg-6">
                    <h2>DESCRIPTION</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur accusantium cumque officiis harum quod quam, exercitationem molestiae ut, reiciendis architecto sed sint dignissimos praesentium possimus, porro commodi error blanditiis delectus.</p>
                </div>

                <div class="col-lg-6">
                    <h2>CARACTERISTIQUES</h2>
                    <ul>
                        <li>Lorem ipsum dolor sit amet consectetur, adipisi</li>
                        <li>Ltium cumque officiis harum qu</li>
                        <li>r accusantium cumque officiis harum quod quam, exercitationem molestiae ut, reiciendis architecto sed sint dignissimos praesent</li>
                        <li>olor sit amet consectetur, adipisicing elit. Consequatur acet consectetur, adipisi</li>
                    </ul>
                </div>

            </article>

        </div>

    </section>
	<?php include("footer.php");?>
</body>
</html>