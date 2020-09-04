<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>

  <?php
  include("connexion.php");
  include("session.php");
  include("header.php");
  
  $katia=$db->query('SELECT * FROM Produit');

  if(!empty($_GET['supp']))
{
	$numAr=$_GET['supp'];
	
  $supprimer = $db->query('DELETE FROM Produit WHERE id_produit="'.$numAr.'"');
  //header('Location : index.php');
	
}
  
  ?>

  <title>BOUTIQUE</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style 

  type="text/css">
    body
     {
      font-family: Georgia;
      color: #023B64;
      background-color:white;
      }
      p 
      {

      }
    ul.navbar 
    {
      list-style-type: none;
      padding: 0;
      margin: 0;
      width: 9em 
    }
    
    ul.navbar li 
    {
      background:#E7BB83;
      margin: 0.9em 0;
      padding: 0.3em;
      border-right: 1em solid white 
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


    <div class="article">

      <?php
      
      while ($coucou = $katia->fetch())
      { ?>
        <div class="block" >

           
           <img src="<?=$coucou['img_produit']?>" alt="pas pris en charge"
           width="250px"/></a>
           <p class="Prixx">Produit : <?=$coucou['titre_produit']?></p> 
           <p class="Prixx"><a href="supprimer.php?supp=<?=$coucou['id_produit']?>">Supprimer ce produit</a></p>
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
