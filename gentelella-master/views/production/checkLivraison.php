<?PHP
include "../../core/livraisonC.php";
$livraisonC=new LivraisonC();
if (isset($_POST["id"])){
	$livraisonC->checkLivraison($_POST["id"]);

	$to = 'hichem.dimassi@gmail.com';            //         mailsend
    $subject = 'Fitness Shop: Livraison';
    $message = 'Nous vous informons que votre commande a été acheminer à votre destination choisie. Si vous avez un problème ou des questions prière de nous contacter à partir de notre service clientele.';
    $headers = 'From: hichem.dimassi@gmail.com';
    if (mail($to, $subject, $message, $headers)) 
	echo("<p>Email successfully sent</p>");
    else echo("<p>Email delivery failed</p>");

	header('Location: Livreur.html');
}

?>