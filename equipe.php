<!DOCTYPE html>
<html lang="en">
    <head>
	<?php

include("connexion.php");
include("session.php");
$bmurat = $db->query('SELECT * FROM Joueurs WHERE poste=1');
$bmurat2 = $db->query('SELECT * FROM Joueurs WHERE poste=2');
$bmurat3 = $db->query('SELECT * FROM Joueurs WHERE poste=3');
$bmurat4 = $db->query('SELECT * FROM Joueurs WHERE poste=4');
?>
	
        <title>Hover Effect Style</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/pageequipe.css">
    </head>

<body>
<!------------------------------------------------------------------------>
<?php include("header.php");?>
<h1 style=" text-align : center"> Gardiens <h1>
        <div class="container">
            <div class="row">
            
<?php
$titre = 0;
			while($joueur = $bmurat->fetch())
			{
				?>
                <div class="col-md-4 mb-5 col-sm-6">
                    <div class="box9">
			
															
                        <img src="<?=$joueur['avatar_joeur']?>">
                        <div class="box-content">
						
                            <h3 class="title"><?=$joueur['prenom']?>  <?=$joueur['nom']?></h3>
                            <ul class="icon">
                                <li><a href="statistique.php?player=<?=$joueur['id_joueur']?>"><i class="fa fa-search"></i></a></li>
                            </ul>
	
                        </div>				
                    </div>
                    
            </div>
            <?php
            }
			$bmurat->closeCursor();
				?>
           
 <!------------------------------------------------------------------------------->               

        <div class="container">
        <h1 style=" text-align : center"> Defenseurs<h1>
            <div class="row">
            
<?php
$titre = 0;
			while($joueur2 = $bmurat2->fetch())
			{
				?>
                <div class="col-md-4 mb-5 col-sm-6">
                    <div class="box9">
			
															
                        <img src="<?=$joueur2['avatar_joeur']?>">
                        <div class="box-content">
						
                            <h3 class="title"><?=$joueur2['prenom']?>  <?=$joueur2['nom']?></h3>
                            <ul class="icon">
                                <li><a href="statistique.php?player=<?=$joueur2['id_joueur']?>"><i class="fa fa-search"></i></a></li>
                            </ul>
	
                        </div>				
                    </div>
            </div>
            

            <?php
            }
			$bmurat2->closeCursor();
				?>
 

 <div class="container">
        <h1 style=" text-align : center"> Milieux<h1>
            <div class="row">
            
<?php
$titre = 0;
			while($joueur3 = $bmurat3->fetch())
			{
				?>
                <div class="col-md-4 mb-5 col-sm-6">
                    <div class="box9">
			
															
                        <img src="<?=$joueur3['avatar_joeur']?>">
                        <div class="box-content">
						
                            <h3 class="title"><?=$joueur3['prenom']?>  <?=$joueur3['nom']?></h3>
                            <ul class="icon">
                                <li><a href="statistique.php?player=<?=$joueur3['id_joueur']?>"><i class="fa fa-search"></i></a></li>
                            </ul>
	
                        </div>				
                    </div>
            </div>
            

            <?php
            }
			$bmurat3->closeCursor();
                ?>
 
 <div class="container">
        <h1 style=" text-align : center"> Attaquants<h1>
            <div class="row">
            
<?php
$titre = 0;
			while($joueur4 = $bmurat4->fetch())
			{
				?>
                <div class="col-md-4 mb-5 col-sm-6">
                    <div class="box9">
			
															
                        <img src="<?=$joueur4['avatar_joeur']?>">
                        <div class="box-content">
						
                            <h3 class="title"><?=$joueur4['prenom']?>  <?=$joueur4['nom']?></h3>
                            <ul class="icon">
                                <li><a href="statistique.php?player=<?=$joueur4['id_joueur']?>"><i class="fa fa-search"></i></a></li>
                            </ul>
	
                        </div>				
                    </div>
            </div>
            

            <?php
            }
			$bmurat4->closeCursor();
				?>
                <!-- on a enlever ici --> 
        </div>
    </div>	


</body>

</html>