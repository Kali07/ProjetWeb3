<!DOCTYPE html>
<html lang="en">
<head>
<?php
include("connexion.php");
include("session.php");

if(isset($_COOKIE['tendance']))
{
	$pref= $_COOKIE['tendance'];
	//var_dump($_COOKIE['tendance']);
	$cookie= $db->query('SELECT * FROM Produit WHERE id_categorie="'.$pref.'" ORDER BY RAND () LIMIT 3');
}
else
{
	$cookie= $db->query('SELECT * FROM Produit ORDER BY RAND () LIMIT 3');
	//pour eviter de planter lors du premier demarage car il n'ya pas de cookies apres un long moment hors ligne.
}
//tendance maillot 
  $maillot = $db->query('SELECT * FROM Produit where id_categorie = 1 ORDER BY RAND () LIMIT 5');
  // Produit p, Categorie c where p.id_categorie = c.id_categorie 
  //and p.id_categorie = 1
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleBout.css">

    <title>$Nom_Du_Produit</title>
</head>
<body>
<?php include("header.php"); ?>

<!-- ------------------------------debut page boutique----------------------------- -->
<div class="boutiquePage">

<!-- LA BANNIERE-->
    <section class="boutiqueBaniere">

      <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
          <h1 class="display-4"> <span>CHAUSSURES VOLANTES</span> ADINIKE</h1>
          <p class="lead font-weight-normal">Acces en avant première pour les membres IPSSI plus</p>
          <a class="btn btn-outline-secondary" href="produit.php?produit=94">Voir</a>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
      </div>

    </section>

    <!-- DEUXIEME BARRE DE NAVIGATION -->

    <nav class="nav d-flex justify-content-around navbarperso">
      <a class="p-2 text-muted" href="boutique.php">TOUT LE SHOP</a>
      <a class="p-2 text-muted" href="categorie.php?cate=1">MAILLOTS</a>
      <a class="p-2 text-muted" href="categorie.php?cate=2">BALLONS</a>
      <a class="p-2 text-muted" href="categorie.php?cate=4">SURVETEMENTS</a>
      <a class="p-2 text-muted" href="categorie.php?cate=5">CHAUSSURES</a>
      <a class="p-2 text-muted" href="categorie.php?cate=3">ACCESSOIRES</a>
    </nav>

<!-- LES TENDANCES -->

    <section class="sectiontendances container-fluid ">

      <h1 class="TitreSection">En tendance</h1>
          <div class="row ">
			<?php
      //$coucou = $katia->fetch();
	  
      while ($tendance = $cookie->fetch())
      { ?>	
              <a href="produit.php?produit=<?=$tendance['id_produit']?>" class="col">
                <img class="imgtendance" src="<?=$tendance['img_produit']?>">
                <h2 class="GROSproduit"> <?=$tendance['titre_produit']?></h2>
                <p class="GROSproduit"><?=$tendance['detail_produit']?></p>
                <p class="GROSproduit"> <?=$tendance['prix']?> €</p>
              </a>
			  <?php
				}
		$cookie->closeCursor();
			?>	
    <!--
              <a href="" class="col">
                <img class="imgtendance" src="img/tendance1.jpg">
                <h2 class="GROSproduit"> Titre du produit</h2>
                <p class="GROSproduit">En stock</p>
                <p class="GROSproduit">150 €</p>
              </a>
    
              <a href="" class="col">
                <img class="imgtendance" src="img/tendance3.jpg">
                <h2 class="GROSproduit"> Titre du produit</h2>
                <p class="GROSproduit">En stock</p>
                <p class="GROSproduit">230 €</p>
              </a>
			  -->

          </div>
    
    </section>

<!-- CATEGORIE T-SHIRT -->
    <section class="container-fluid">
      <h1 class="TitreSection">Dans la catégorie maillots</h1>
       <article class="container sliderarticle row">
      <?php
      //$coucou = $katia->fetch();
	  
      while ($coucou = $maillot->fetch())
      { ?>
	<a href="produit.php?produit=<?=$coucou['id_produit']?>" class="divproduit">
          <img class="imgproduit" src="<?=$coucou['img_produit']?>">
          <h2 class="titreproduit"> <?=$coucou['titre_produit']?></h2>
          <p class="stockBoutique">En stock</p>
          <p class="description"> <?=$coucou['detail_produit']?></p>
          <p class="prixBoutique"><?=$coucou['prix']?> €</p>
         </a>
        
<?php

      }

 $maillot->closeCursor();
      ?>
         
		<!--
         <a href="" class="divproduit">
          <img class="imgproduit" src="img/blanc.jpg">
          <h2 class="titreproduit"> Titre du produit</h2>
          <p class="stockBoutique">En stock</p>
          <p class="description"> Description du produit Lorem ipsum dolor sit amet, conuaerat deserunt.</p>
          <p class="prixBoutique">200 €</p>
         </a >

         <a href=""  class="divproduit">
          <img class="imgproduit" src="img/rose.jpg">
          <h2 class="titreproduit"> Titre du produit</h2>
          <p class="stockBoutique">En stock</p>
          <p class="description"> Description du produit Lorem ipsum dolor sit amet, conuaerat deserunt.</p>
          <p class="prixBoutique">200 €</p>
         </a>

         <a href="" class="divproduit">
          <img class="imgproduit" src="img/noir.jpg">
          <h2 class="titreproduit"> Titre du produit</h2>
          <p class="stockBoutique">En stock</p>
          <p class="description"> Description du produit Lorem ipsum dolor sit amet, conuaerat deserunt.</p>
          <p class="prixBoutique">200 €</p>
         </a>

         <a href="" class="divproduit">
          <img class="imgproduit" src="img/rouge.jpg">
          <h2 class="titreproduit"> Titre du produit</h2>
          <p class="stockBoutique">En stock</p>
          <p class="description"> Description du produit Lorem ipsum dolor sit amet, conuaerat deserunt.</p>
          <p class="prixBoutique">200 €</p>
         </a>-->

       </article>     
    </section>
    
    <!-- LE MEILLEUR DE LA BOUTIQUE -->   
    <section class="sectionmeilleur ">

      <h1 class="TitreSection">Le meilleur de Kalishop</h1>

          <div class="DivPrinc ">
    
                <div class="meillSolo ">
                    <a href="produit.php?produit=84"><img class="imgSolo" src="img/lemeilleur3.jpg"></a>
                    <div class="textimgSolo">Veste Est-Eagle</div>
                </div>
                
  
                <div class="meilleur_colone ">

                  <div class="relativposition">
                    <a href="produit.php?produit=67"><img class="imgMultiple" src="images/6.jpg"></a>
                    <div class="textimgSolo2">Orange Nuclear</div>
                  </div>

                  <div class="relativposition">
                    <a href="produit.php?produit=89"><img class="imgMultiple" src="images/28.jpg"></a>
                    <div class="textimgSolo2">Pink-Xalion</div>
                  </div>
                      
                </div>

          </div>
    
    </section>

    <div class="newletter container-fluid">

      <div class="row d-flex justify-content-center divnews align-items-center">

        <p class="col-6 ">
          INSCRIVEZ-VOUS POUR RECEVOIR LES NOUVELLES ET UNE REMISE DE 15 %
         </p>
          <div class="col-6">
            <a href="">S'INSCIRE A LA NEW LETTER</a>
          </div>
              
      </div>

    </div>

  <aside class="assidefinal">
      <div class="  container">
        <div class="row ">

          <div class="col">
            <h6 > KALICOKAMUVI : DES TENUES DE SPORT, DU STYLE ET DE NOMBREUSES HISTOIRES DEPUIS 1949 </h6 >
            <p>
              Lorem ipsum dolor sisectetur adipisicing elit. Ipsa voltetur adipisicing elit. Ipsa voluptatum commodi ea eum itaque nesciunt sunt quasi architecto quidem, hic fugit pariatur alias error minus deleniti dolorem nemo, maxime dolor.
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. At maiores explicabo quibusdam, reiciendis minus harum similique itaque molestiae voluptatem doloremque sequi accusamus voluptatibus quia nam et, quas non earum. Similique?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam praesentium dignissimos, aperiam eos hic atque est aliquam obcaecati? Aperiam facere ex alias debitis voluptates officiis delectus nesciunt praesentium, nihil quaerat.
            </p>
          </div>
    
          <div class="col">
            <h6 >DES TENUES POUR TOUS LES SPORTS</h6 >
            <p>
              Lorem ipsum dolor sisectetur adipisicing elit. Ipsa voltetur adipisicing elit. Ipsa voluptatum commodi ea eum itaque nesciunt sunt quasi architecto quidem, hic fugit pariatur alias error minus deleniti dolorem nemo, maxime dolor.
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. At maiores explicabo quibusdam, reiciendis minus harum similique itaque molestiae voluptatem doloremque sequi accusamus voluptatibus quia nam et, quas non earum. Similique?
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam praesentium dignissimos, aperiam eos hic atque est aliquam obcaecati? Aperiam facere ex alias debitis voluptates officiis delectus nesciunt praesentium, nihil quaerat.
            </p>
          </div>
          
        </div>
      </div>
    </aside>
</div>

<?php include("footer.php"); ?>
</body>
</html>