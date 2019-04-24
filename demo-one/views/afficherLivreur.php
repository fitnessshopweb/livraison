<?PHP
include "../core/livreurC.php";
$livreur1C=new LivreurC();
$listeLivreurs=$livreur1C->afficherLivreurs();                             //  ahhhhhhhhhhhhhhhhhhhhhhhhhhh;

//var_dump($listeLivreurs->fetchAll());
?>
<table border="1">
<tr>
<td>date</td>
<td>methode</td>
<td>adresse</td>
<td>numero commande</td>
<td>Nom</td>
<td>etat</td>
<td>id</td>
<td>supprimer</td>
<td>modifier</td>

</tr>

<?PHP
foreach($listeLivreurs as $row){
	?>
	<tr>
	<td><?PHP echo $row['dateL']; ?></td>
	<td><?PHP echo $row['methodeL']; ?></td>
	<td><?PHP echo $row['adresseL']; ?></td>
	<td><?PHP echo $row['numeroC']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['etat']; ?></td>
	<td><?PHP echo $row['id']; ?></td>
	<td><form method="POST" action="supprimerLivreur.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierLivreur.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


