<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/livreur.php";
include "../core/livreurC.php";
if (isset($_GET['id'])){
	$livreurC=new LivreurC();
    $result=$livreurC->recupererLivreur($_GET['id']);
	foreach($result as $row){
		
		$date=$row['dateL'];
		$methode=$row['methodeL'];
		$adresse=$row['adresseL'];
		$numero=$row['numeroC'];
		$nom=$row['nom'];
		$etat=$row['etat'];
		$id=$row['id'];
?>
<form method="POST">
<table>
<caption>Modifier Livreur</caption>
<tr>
<td>date livraison</td>
<td><input type="date" name="date" value="<?PHP echo $date ?>"></td>
</tr>
<tr>
<td>methode livraison</td>
<td><input type="text" name="methode" value="<?PHP echo $methode ?>"></td>
</tr>
<tr>
<td>adresse livraison</td>
<td><input type="text" name="adresse" value="<?PHP echo $adresse ?>"></td>
</tr>
<tr>
<td>numero commande</td>
<td><input type="text" name="numero" value="<?PHP echo $numero ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>etat</td>
<td><input type="text" name="etat" value="<?PHP echo $etat ?>"></td>
</tr>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$livreur=new livreur($_POST['date'],$_POST['methode'],$_POST['adresse'],$_POST['numero'],$_POST['nom'],$_POST['etat'],$_POST['id']);
	$livreurC->modifierLivreur($livreur,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherLivreur.php');
}
?>
</body>
</HTMl>