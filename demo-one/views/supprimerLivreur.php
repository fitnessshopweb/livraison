<?PHP
include "../core/livreurC.php";
$livreurC=new LivreurC();
if (isset($_POST["id"])){
	$livreurC->supprimerLivreur($_POST["id"]);
	header('Location: afficherLivreur.php');
}

?>