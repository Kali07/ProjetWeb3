<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>

  <?php
  include("connexion.php");
  include("session.php");
  
  if(!empty($_GET['cate']))
{
	$cat=$_GET['cate'];
	
	
			setcookie("tendance",$cat, time()+864000);
	$categorie = $db->query('SELECT * FROM produit WHERE id_categorie="'.$cat.'"');
		
}

?>

  <title>BOUTIQUE</title>
  <link rel="stylesheet" href="css/bootstrap.css">

<style 

  type="text/css">
    body
     {
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
 <?php include("header.php"); ?>

    <div class="article">

      <?php
      
      while ($catg = $categorie->fetch())
      { ?>

        <div class="block" >

            <a href="produit.php?produit=<?=$catg['id_produit']?>">
            <img src="<?=$catg['img_produit']?>" alt="pas pris en charge"
           width="250px"/></a>
           <p class="Prixx">Prix : <?=$catg['prix']?> €</p> 
                     


      </div>
            
<?php
      }

 $categorie->closeCursor();
      ?>
  </div>

<?php
include("footer.php");
?>

</body>
</html>
