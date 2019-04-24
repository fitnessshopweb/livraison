<HTML>
<head>
</head>
<body>
<?PHP
include "../../entities/livraison.php";
include "../../core/livraisonC.php";
if (isset($_GET['id'])){
	$livraisonC=new LivraisonC();
    $result=$livraisonC->recupererLivraison($_GET['id']);
	foreach($result as $row){
		
		$date=$row['dateL'];
		$methode=$row['methodeL'];
		$adresse=$row['adresseL'];
		$numero=$row['numeroC'];
		$region=$row['region'];
		$etat=$row['etat'];
		$id=$row['id'];
?>
<form method="POST">
<table>
<caption>Modifier Livraison</caption>
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
<td>region</td>
<td><input type="text" name="region" value="<?PHP echo $region ?>"></td>
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
	$livraison=new livraison($_POST['date'],$_POST['methode'],$_POST['adresse'],$_POST['numero'],$_POST['region'],$_POST['etat'],$_POST['id']);
	$livraisonC->modifierLivraison($livraison,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: tables.html');
}
?>
</body>
</HTMl>