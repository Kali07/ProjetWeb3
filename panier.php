<!DOCTYPE html>
<html lang="en">
<head>
<?php
	
include("session.php");	
require("connexion.php");

//echo $_GET['taille'];
//echo $_GET['qte_article'];

//fonction Qui verifie que mon element se trouve bien dans le panier (pareil que mail)
//je verifie le produit mis en panier mais pour chaque client different
function verif_panier($produitp,$clientp)
{
	require("connexion.php");
	
	
	$req = $db->prepare('SELECT panier_produit FROM panier WHERE panier_produit = :panier_produit and panier_client = :panier_client');
	$req->execute(array(':panier_produit'=>$produitp,':panier_client'=>$clientp));
$double= $req->fetch();

if($double) //si le produit existe deja on envoi vrai 
{
	//echo 'Le produit existe existe deja';
	return true;
}

}
//print_r($_SESSION['id_client']);
//print_r($_GET['qte_panier']);
if(!empty($_GET['taille']) and !empty($_GET['qte_panier']) and isset($_SESSION['id_client']))
{

	$taille = $_GET['taille'];
	$qtproduit = $_GET['qte_panier'];
	/*on recupere l'id produit egalement qu'on a stoqué avant dans notre page produit
	ceci nous permet tout simplement de connaitre la variable sur laquelle nous travaillons dans notre session*/
	$_SESSION['produit_pan'];
	if(verif_panier($_SESSION['produit_pan'],$_SESSION['id_client'])==true)
	{
		$recup_col = $db->query('select * from panier where panier_client = '.$_SESSION['id_client'].' and panier_produit = '.$_SESSION['produit_pan'].' ');
		$value_rec = $recup_col->fetch();
		$_SESSION['quantiteup'] = $value_rec['quantite_panier'];
		$miseajour = $_SESSION['quantiteup'] + $qtproduit;
		
		//print_r($recup_col);
		//print_r($value_rec);
		$update = $db->query("UPDATE panier set quantite_panier =  '".$miseajour."' where panier_produit = '".$_SESSION['produit_pan']."'");
	}
	else
	{
		
	$total_price = $_SESSION['prixprod'] * $qtproduit;
	$insert_panier = $db->query("INSERT INTO panier (panier_produit,panier_client,panier_total,quantite_panier)VALUES('".$_SESSION['produit_pan']."','".$_SESSION['id_client']."'
	,'".$total_price."','".$qtproduit."')");			 		
	}
	}
if(isset($_SESSION['id_client']))
{
	
	$afpanier = $db->query('select * from panier p, produit pro, 
	client cl where p.panier_produit = pro.id_produit and p.panier_client = '.$_SESSION['id_client'].' and cl.id_client ='.$_SESSION['id_client'].'');
	
	//gere mon augmentation de prix kkk
	$onlyprice = $db->query('select * from panier p, produit pro, 
	client cl where p.panier_produit = pro.id_produit and p.panier_client = '.$_SESSION['id_client'].' and cl.id_client ='.$_SESSION['id_client'].'');
			$total_price =0;
			while ($pr = $onlyprice ->fetch())
			{
				//loquique de nuit mdr
			$total_price = $pr['prix'] * $pr['quantite_panier'] + $total_price;
			}
			$onlyprice->closeCursor();
			// mettre quantité dans la base de donnée ça serait mieux
			
		
}

?>
    <title>$Nom_Du_Produit</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/stylePanier.css">
</head>
<body>
<?php include("header.php"); ?>

<!-- ------------------------------debut page boutique----------------------------- -->
    <?php
	//panier que pour l'utilisateur
	if(isset($_SESSION['id_client']))
	{
		?>
		<section class="container-fluid">
        
        <div class="container">
            <h1 class="h1panier">Votre Panier</h1>
            <h2 class="h2panier">Total <span class="prixtotal"> <?=$total_price ?> €</span></h2>

            <table class="table">

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Produit</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Image</th>

                    <th scope="col">Qte</th>
                  <th scope="col" class="panier_centrer">Retirer</th>
                </tr>

                  
              </thead>

              <tbody class="tbodypanier">
			<?php
			while ($pan= $afpanier ->fetch())
            {
			?>				
			<tr>

                  <th scope="row"><?= $pan['titre_produit']?></th>
                  <td><?= $pan['prix'] * $pan['quantite_panier'] ?></td>

                  <td><img class="imgpanier" src="<?=$pan['img_produit']?> " ></td>
                  <td><?= $pan['quantite_panier']?></td>

                  <td class="panier_centrer">  
                    <form method="GET" action="delete_panier.php">
						<input type ="number" name ="delpa">
						<input type ="hidden" name ="id_element" value="<?=$pan['id_panier']?>">
                      <button type="submit"><img class="imgtrash" src="images/trash.png"></button> 
                    </form>     
                  </td>

                </tr>
				<?php
				      }
				$afpanier->closeCursor();
				?>

              </tbody>
            </table>
            <form action="paiement.php">
              <button class="btn btn-primary" type="submit">
                Passer au paiement
              </button>
            </form>

        </div>
    </section>
	<?php
	}
	else{
		?>
				<section class="container-fluid">
        
        <div class="container">
            <h1 class="h1panier">Votre Panier est vide cliquez <a href="login.php">ici</a> pour vous connecter </h1>
            <h2 class="h2panier">Total <span class="prixtotal"> 0 €</span></h2>

            <table class="table">

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Produit</th>
                  <th scope="col">Prix</th>
                  <th scope="col">Image</th>

                    <th scope="col">Qte</th>
                  <th scope="col" class="panier_centrer">Retirer</th>
                </tr>

                  
              </thead>

              <tbody class="tbodypanier">


              </tbody>
            </table>
        </div>
    </section>
		<?php
	}
	?>
</body>
</html>