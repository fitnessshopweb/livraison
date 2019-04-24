<HTML>
<head>
</head>
<body>
<?PHP
include "../../entities/livreurl.php";
include "../../core/livreurlC.php";
if (isset($_GET['id'])){
	$livreurlC=new LivreurlC();
    $result=$livreurlC->recupererLivreurl($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$adresse=$row['adresseL'];
		$salaire=$row['salaireL'];
		$numero=$row['numeroT'];
		$etat=$row['etat'];
?>
<form method="POST">
<table>
<caption>Modifier livreur</caption>
<tr>
<td>id</td>
<td><input type="number" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td>Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td>prenom</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td>adresse</td>
<td><input type="text" name="adresse" value="<?PHP echo $adresse ?>"></td>
</tr>
<tr>
<td>salaire</td>
<td><input type="number" name="salaire" value="<?PHP echo $salaire ?>"></td>
</tr>
<tr>
<td>numero telephone</td>
<td><input type="number" name="numeroT" value="<?PHP echo $numero ?>"></td>
</tr>
<tr>
<td>etat</td>
<td><input type="text" name="etat" value="<?PHP echo $etat ?>"></td>
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
	$livreurl=new livreurl($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['salaire'],$_POST['numeroT'],$_POST['etat']);
	$livreurlC->modifierLivreurl($livreurl,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: Livraison.html');
}
?>
</body>
</HTMl>