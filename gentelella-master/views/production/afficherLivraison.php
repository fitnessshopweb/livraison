<?PHP
include "../../core/livraisonC.php";
$livraison1C=new LivraisonC();
$listeLivraisons=$livraison1C->afficherLivraisons();                             //  ahhhhhhhhhhhhhhhhhhhhhhhhhhh;

//var_dump($listeLivraisons->fetchAll());
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
foreach($listeLivraisons as $row){
	?>
	<tr>
	<td><?PHP echo $row['dateL']; ?></td>
	<td><?PHP echo $row['methodeL']; ?></td>
	<td><?PHP echo $row['adresseL']; ?></td>
	<td><?PHP echo $row['numeroC']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['etat']; ?></td>
	<td><?PHP echo $row['id']; ?></td>
	<td><form method="POST" action="supprimerLivraison.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierLivraison.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


