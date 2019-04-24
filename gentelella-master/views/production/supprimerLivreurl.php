<?PHP
session_start ();

if (isset($_SESSION['l'])) 
{

include "../../core/livreurlC.php";
$livreurlC=new LivreurlC();
if (isset($_POST["id"])){
	$livreurlC->supprimerLivreurl($_POST["id"]);
	header('Location: Livraison.html');
}

}

else { 
      echo '<body onLoad="alert(\'Veuillez vous connectez pour pouvoir accéder au domaine de l administrateur.\')">';   
	  echo '<meta http-equiv="refresh" content="0;URL=login.html">'; 

     }    

?>