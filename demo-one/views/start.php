<?PHP
include "../entities/livraison.php";
include "../core/livraisonC.php";
$livraison=new Livraison(75757575,'BEN Ahmed','Salah',50,20);
$livraisonC=new LivraisonC();
$livraisonC->afficherLivraison($livraison);
echo "****************";
echo "<br>";
echo "id:".$livraison->getId();
echo "<br>";
echo "nom:".$livraison->getNom();
echo "<br>";
echo "methode:".$livraison->getMethode();
echo "<br>";
echo "adresse:".$livraison->getAdresse();
echo "<br>";
echo "date:".$livraison->getDateL();
echo "<br>";

echo "<br>";
echo "<br>";


?>