<?PHP
session_start ();

if (isset($_SESSION['l'])) 
{

include "../../core/livraisonC.php";
$livraisonC=new LivraisonC();
if (isset($_POST["id"])){
	$livraisonC->supprimerLivraison($_POST["id"]);
	header('Location: Livraison.html');
}

}

else { 
      echo '<body onLoad="alert(\'Veuillez vous connectez pour pouvoir accéder au domaine de l administrateur.\')">';   
	  echo '<meta http-equiv="refresh" content="0;URL=login.html">'; 

     }    

?>