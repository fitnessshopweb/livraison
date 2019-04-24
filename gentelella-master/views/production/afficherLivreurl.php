<?PHP
include "../../core/livreurlC.php";
$livreurl1C=new LivreurlC();
$listeLivreurls=$livreurl1C->afficherLivreurls();                             //  ahhhhhhhhhhhhhhhhhhhhhhhhhhh;

//var_dump($listeLivreurs->fetchAll());
?>
<table border="1">
<tr>
<td>id</td>
<td>nom</td>
<td>prenom</td>
<td>adresse</td>
<td>salaire</td>
<td>numero telephone</td>
<td>etat</td>
<td>supprimer</td>
<td>modifier</td>

</tr>

<?PHP
foreach($listeLivreurls as $row){
	?>
	<tr>
	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['adresseL']; ?></td>
	<td><?PHP echo $row['salaireL']; ?></td>
	<td><?PHP echo $row['numeroT']; ?></td>
	<td><?PHP echo $row['etat']; ?></td>
	<td><form method="POST" action="supprimerLivreurl.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
	</form>
	</td>
	<td><a href="modifierLivreurl.php?id=<?PHP echo $row['id']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


