<?PHP
session_start ();

if (isset($_SESSION['l'])) 
{

      include "../entities/Livraison.php";
      include "../core/LivraisonC.php";


      if (isset($_POST['region']) and isset($_POST['methode']) and isset($_POST['adresse']) and isset($_POST['dateLivraison']) and isset($_POST['numeroCommande'])){
      $livraison1=new livraison($_POST['region'],$_POST['methode'],$_POST['adresse'],$_POST['dateLivraison'],$_POST['numeroCommande'],"non delivre",$_SESSION['i']);



      $livraison1C=new LivraisonC();
      $livraison1C->ajouterLivraison($livraison1);
      header('Location: Livraison.html');
	
      }else{
	      echo "vérifier les champs";
           }


}

else { 
      echo '<body onLoad="alert(\'Veuillez vous connectez pour béneficier du service de livraison.\')">';   
	  echo '<meta http-equiv="refresh" content="0;URL=Livraison.html">'; 

     }    



?>