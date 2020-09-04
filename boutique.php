<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>

  <?php
  include("connexion.php");
  include("session.php");
 
  
  $katia=$db->query('SELECT * FROM Produit ORDER BY RAND ()');
  
  ?>

  <title>BOUTIQUE</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style 

  type="text/css">
    body
     {
      background-color:white;
      }

    
.article
    {
  display: flex;
  flex-direction : row;
  justify-content: center;
  flex-wrap: wrap;
    }

.block
{
  margin : 1%;
}

.Prixx
{
  text-align: center;
}

</style>

</head>

<body>
<?php
include("header.php");
?>
    <div class="article">

      <?php
      
      while ($coucou = $katia->fetch())
      { ?>
        <div class="block" >

           <a href="produit.php?produit=<?=$coucou['id_produit']?>">
           <img src="<?=$coucou['img_produit']?>" alt="pas pris en charge"
           width="250px"/></a>
           <p class="Prixx">Prix : <?=$coucou['prix']?> €</p> 
                     


      </div>
            
<?php
      }

 $katia->closeCursor();
      ?>
  </div>

<?php
include("footer.php");
?>

</body>
</html>
