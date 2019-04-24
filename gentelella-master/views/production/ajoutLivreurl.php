<?PHP

session_start ();

if (isset($_SESSION['l'])) 
{

include "../../entities/Livreurl.php";
include "../../core/LivreurlC.php";

if (isset($_POST['nom'])  and isset($_POST['prenom']) and isset($_POST['adresse']) and isset($_POST['salaire']) and isset($_POST['numeroT']) and isset($_POST['etat'])){
$livreurl1=new livreurl($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['salaire'],$_POST['numeroT'],$_POST['etat']);
//Partie2
/*
var_dump($livraison1);
}
*/
//Partie3
$livreurl1C=new LivreurlC();
$livreurl1C->ajouterLivreurl($livreurl1);
header('Location: Livraison.html');
	
}else{
	echo "vérifier les champs";
}

}

else { 
      echo '<body onLoad="alert(\'Veuillez vous connectez pour pouvoir accéder au domaine de l administrateur.\')">';   
	  echo '<meta http-equiv="refresh" content="0;URL=login.html">'; 

     }    

?>