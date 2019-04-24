<?PHP
include "../../config.php";
class LivraisonC {
function afficherLivraison ($livraison){
		echo "id: ".$livraison->getId()."<br>";
		echo "Region: ".$livraison->getRegion()."<br>";
		echo "méthode livraison: ".$livraison->getMethode()."<br>";
		echo "adresse livraison: ".$livraison->getAdresse()."<br>";
		echo "date livraison: ".$livraison->getDateL()."<br>";
		echo "numero commande: ".$livraison->getNumero()."<br>";
		echo "etat: ".$livraison->getEtat()."<br>";
	}

	
	function ajouterLivraison($livraison){
		$sql="insert into livraison (region,methodeL,adresseL,dateL,numeroC,etat) values( :region,:methode,:adresse,:dateLivraison,:numeroCommande,:etat)";
		$sql2="UPDATE livraison SET id_livreur=(select id from livreurl ORDER BY RAND() limit 1) ORDER BY id DESC limit 1";
		$sql3="UPDATE livreurl SET nombreL=nombreL+1 WHERE id=(SElECT id_livreur from livraison ORDER BY id DESC limit 1)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
     
		
		//$liste=$db->query($sql2);
		//$idd = $liste->fetch(PDO::FETCH_ASSOC);
        
        $region=$livraison->getRegion();
        $methode=$livraison->getMethode();
        $adr=$livraison->getAdresse();
        $date=$livraison->getDateL();
		$num=$livraison->getNumero();
		$etat=$livraison->getEtat();
		
		$req->bindValue(':region',$region);
		$req->bindValue(':methode',$methode);
		$req->bindValue(':adresse',$adr);
		$req->bindValue(':dateLivraison',$date);
		$req->bindValue(':numeroCommande',$num);
		$req->bindValue(':etat',$etat);
		//$req->bindValue(':idd',$idd);
		
            $req->execute();
            $req2=$db->prepare($sql2);
 
            $req2->execute();
            $req3=$db->prepare($sql3);
 
            $req3->execute();
			
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function checkLivraison($id){
		$sql="update livraison set etat='delivre' where id= :id";
		$sql2="UPDATE livreurl set nombreL=nombreL-1 where id=(SElECT id_livreur from livraison where id=:id)";
		$db = config::getConnexion();
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

        $req2=$db->prepare($sql2);
		$req2->bindValue(':id',$id);
		try{
            $req2->execute();
           // header('Location: index.php');
        }

        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		
	}
	
	
	
	function afficherLivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.id= a.id";
		$sql="SElECT * From livraison order by dateL";//where dateL=CURDATE()
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	function afficherLivraisons2(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.id= a.id";
		$sql="SElECT * From livraison where dateL=CURDATE()";//where dateL=CURDATE()
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	
	function afficherLivraisons3(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.id= a.id";
		$sql="SElECT * From livraison where dateL=CURDATE() + 1";//where dateL=CURDATE()
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	
	
	
	function afficherLivraisons4(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.id= a.id";
		$sql="SElECT * From livraison where dateL>CURDATE() + 1";//where dateL=CURDATE()
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function supprimerLivraison($id){
		$sql="DELETE FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierLivraison($livraison,$id){
		$sql="UPDATE livraison SET region=:region,methodeL=:methode,adresseL=:adresse,dateL=:date,numeroC=:numero,etat=:etat WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		
        $region=$livraison->getRegion();
        $met=$livraison->getMethode();
        $adr=$livraison->getAdresse();
        $dat=$livraison->getDateL();
		$num=$livraison->getNumero();
		$etat=$livraison->getEtat();
		$datas = array( ':id'=>$id, ':region'=>$region,':methode'=>$met,':adresse'=>$adr,':date'=>$dat,':numero'=>$num,':etat'=>$etat);
		
		$req->bindValue(':id',$id);
		$req->bindValue(':region',$region);
		$req->bindValue(':methode',$met);
		$req->bindValue(':adresse',$adr);
		$req->bindValue(':date',$dat);
		$req->bindValue(':numero',$num);
		$req->bindValue(':etat',$etat);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererLivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivraisons($region){
		$sql="SELECT * from livraison where region=$region";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>