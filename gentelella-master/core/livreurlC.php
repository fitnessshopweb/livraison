<?PHP
include "../../config2.php";
class LivreurlC {
function afficherLivreur ($livreurl){
		echo "id: ".$livreurl->getId()."<br>";
		echo "Nom: ".$livreurl->getNom()."<br>";
		echo "prenom livreurl: ".$livreurl->getPrenom()."<br>";
		echo "adresse livreurl: ".$livreurl->getAdresse()."<br>";
		echo "salaire livreurl: ".$livreurl->getSalaireL()."<br>";
		echo "numero telephone: ".$livreurl->getNumero()."<br>";
		echo "etat: ".$livreurl->getEtat()."<br>";
	}

	
	function ajouterLivreurl($livreurl){
		$sql="insert into livreurl (nom,prenom,adresseL,salaireL,numeroT,etat) values (:nom,:prenom,:adresse,:salaire,:numeroT,:etat)";
		$db = config2::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$livreurl->getNom();
        $prenom=$livreurl->getPrenom();
        $adr=$livreurl->getAdresse();
        $salaire=$livreurl->getSalaireL();
		$num=$livreurl->getNumero();
		$etat=$livreurl->getEtat();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':adresse',$adr);
		$req->bindValue(':salaire',$salaire);
		$req->bindValue(':numeroT',$num);
		$req->bindValue(':etat',$etat);
		
            $req->execute();
			
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherLivreurls(){
		//$sql="SElECT * From livreurl e inner join formationphp.livreurl a on e.id= a.id";
		$sql="SElECT * From livreurl";
		$db = config2::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerLivreurl($id){
		$sql="DELETE FROM livreurl where id= :id";
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
	function modifierLivreurl($livreurl,$id){
		$sql="UPDATE livreurl SET nom=:nom,prenom=:prenom,adresseL=:adresse,salaireL=:salaire,numeroT=:numero,etat=:etat WHERE id=:id";
		
		$db = config2::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nom=$livreurl->getNom();
        $pre=$livreurl->getPrenom();
        $adr=$livreurl->getAdresse();
        $sal=$livreurl->getSalaireL();
		$num=$livreurl->getNumero();
		$etat=$livreurl->getEtat();
		$datas = array(':id'=>$id, ':nom'=>$nom,':prenom'=>$pre,':adresse'=>$adr,':salaire'=>$sal,':numero'=>$num,':etat'=>$etat);

		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$pre);
		$req->bindValue(':adresse',$adr);
		$req->bindValue(':salaire',$sal);
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
	function recupererLivreurl($id){
		$sql="SELECT * from livreurl where id=$id";
		$db = config2::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivreurls($nom){
		$sql="SELECT * from livreurl where nom=$nom";
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