<?phpinclude("session.php");?>
    <header class="monheader">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          
          <!--Nom du site-->
            <a class="navbar-brand" href="index.php">KALICOKAMUVI</a>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                
                <!--CATEGORIES-->

				  <li class="nav-item">
                  <a class="nav-link" href="equipe.php">L'Equipe</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="vict/accueil.php"> Le club </a>
                </li>

                 <!--CONNEXION-->

				
				<li class="nav-item"> <?php if(isset($_SESSION['id_client'])){?>
				   <a class="nav-link" href="deconnexion.php" tabindex="-1"> Deconnexion</a></li>
				  <?php }
						else 
						{
							?>   
            <li class="nav-item">
                  <a class="nav-link" href="login.php" tabindex="-1"> Connexion</a>
            </li>

            <li class="nav-item">
                  <a class="nav-link" href="inscription.php">Inscription</a>
            </li>
            
            
            <?php }
            
            
						?> 

                <li class="nav-item">
                  <div style="color:black; text-decoration:underline" class="nav-link" tabindex="-1">  
				  <?php if(isset($_SESSION['id_client'])){
				  ?>
					  Bienvenu <?=$_SESSION['nom'];?>
					  <?php
				  }?>
				  </div>
                </li>

              </ul>


              <div class="float-right">
                <a class="" href="panier.php"><img src="img/panier.svg"
                  style="width: 2.4rem; margin: 0 2rem 0 1rem;"></a>
              </div>

              <!--BARRE DE RECHERCHE -->
              <!--action="rechercher.php"-->
              <form class="form-inline my-2 my-lg-0" >
                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher un Produit" aria-label="Search" name="rech">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go !</button>
              </form>

            </div>
          </nav>
    </header>
