
<?php
	
include("session.php");	
require("connexion.php");

if(!empty($_GET['delpa']) and !empty($_GET['id_element']) and !empty($_SESSION['id_client']))
{
    
        $idpan = $_GET['id_element']; 
        $qtsup = $_GET['delpa'];

		$element = $db->query('select * from panier where panier_client = '.$_SESSION['id_client'].' and id_panier = '.$idpan.' ');
        $valeur = $element->fetch();
        $_SESSION['q_dans_la_base'] = $valeur['quantite_panier'];

        /*if($_SESSION['q_dans_la_base'] == 1 and $qtsup == 1 or $_SESSION['q_dans_la_base'] == $qtsup )
        {
            $supprimer = $db->query('DELETE FROM Panier WHERE id_panier="'.$idpan.'"');
            header('Location:panier.php'); // pas très optimale 

        }*/

        //Methode Enzo 
        $valeur_modif = $_SESSION['q_dans_la_base'] - $qtsup;
        
        if($valeur_modif == 0)
        {
            $supprimer = $db->query('DELETE FROM Panier WHERE id_panier="'.$idpan.'"');
            header('Location:panier.php');

        }
        else
        {

            $update = $db->query("UPDATE panier set quantite_panier =  '".$valeur_modif."' where id_panier = '".$idpan."'");
            header('Location:panier.php');
        }

}


?>
