<?PHP
class livreurl{
	private $id;
	private $nom;
	private $prenom;
	private $adresseL;
	private $salaireL;
	private $numeroT;
	private $etat;
	function __construct($nom,$prenom,$adr,$salaire,$num,$etat){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->adresseL=$adr;
		$this->salaireL=$salaire;
		$this->numeroT=$num;
		$this->etat=$etat;
	}
	
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getAdresse(){
		return $this->adresseL;
	}
	function getSalaireL(){
		return $this->salaireL;
	}
	function getNumero(){
		return $this->numeroT;
	}
	function getEtat(){
		return $this->etat;
	}

	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	function setAdresse($adresseL){
		$this->adresseL=$adresseL;
	}
	function setNumero($numeroT){
		$this->numeroT=$numeroT;
	}
	function setsalaire($salaireL){
		$this->salaireL=$salaireL;
	}
	function setEtat($etat){
		$this->etat=$etat;
	}
	
}

?>