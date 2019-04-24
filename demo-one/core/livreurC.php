<?PHP
include "../config2.php";
class LivreurC {
function afficherLivreur ($livreur){
		echo "id: ".$livreur->getId()."<br>";
		echo "Region: ".$livreur->getRegion()."<br>";
		echo "méthode livreur: ".$livreur->getMethode()."<br>";
		echo "adresse livreur: ".$livreur->getAdresse()."<br>";
		echo "date livreur: ".$livreur->getDateL()."<br>";
		echo "numero commande: ".$livreur->getNumero()."<br>";
		echo "etat: ".$livreur->getEtat()."<br>";
	}

	
	function ajouterLivreur($livreur){
		$sql="insert into livreur (id,region,methodeL,adresseL,dateL,numeroC,etat) values (:id, :region,:methode,:adresse,:dateLivraison,:numeroCommande,:etat)";
		$sql2="UPDATE livreur SET idd=(select id from livreurl where etat='active' ORDER BY RAND() limit 1) WHERE id=:id";
		$db = config2::getConnexion();
		try{
        $req=$db->prepare($sql);
     
		
		//$liste=$db->query($sql2);
		//$idd = $liste->fetch(PDO::FETCH_ASSOC);
        $id=$livreur->getId();
        $region=$livreur->getRegion();
        $methode=$livreur->getMethode();
        $adr=$livreur->getAdresse();
        $date=$livreur->getDateL();
		$num=$livreur->getNumero();
		$etat=$livreur->getEtat();
		$req->bindValue(':id',$id);
		$req->bindValue(':region',$region);
		$req->bindValue(':methode',$methode);
		$req->bindValue(':adresse',$adr);
		$req->bindValue(':dateLivraison',$date);
		$req->bindValue(':numeroCommande',$num);
		$req->bindValue(':etat',$etat);
		//$req->bindValue(':idd',$idd);
		
            $req->execute();
            $req2=$db->prepare($sql2);
            $req2->bindValue(':id',$id);
            $req2->execute();
			
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivreurs(){
		//$sql="SElECT * From livreur e inner join formationphp.livreur a on e.id= a.id";
		$sql="SElECT * From livreur";
		$db = config2::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivreur($id){
		$sql="DELETE FROM livreur where id= :id";
		$db = config2::getConnexion();
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
	function modifierLivreur($livreur,$id){
		$sql="UPDATE livreur SET id=:idd, region=:region,methodeL=:methode,adresseL=:adresse,dateL=:date,numeroC=:numero,etat=:etat WHERE id=:id";
		
		$db = config2::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd=$livreur->getId();
        $region=$livreur->getRegion();
        $met=$livreur->getMethode();
        $adr=$livreur->getAdresse();
        $dat=$livreur->getDateL();
		$num=$livreur->getNumero();
		$etat=$livreur->getEtat();
		$datas = array(':idd'=>$idd, ':id'=>$id, ':region'=>$region,':methode'=>$met,':adresse'=>$adr,':date'=>$dat,':numero'=>$num,':etat'=>$etat);
		$req->bindValue(':idd',$idd);
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
	function recupererLivreur($id){
		$sql="SELECT * from livreur where id=$id";
		$db = config2::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivreurs($region){
		$sql="SELECT * from livreur where region=$region";
		$db = config2::getConnexion();
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