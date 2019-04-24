<?PHP
class livraison{
	private $id;
	private $region;
	private $methodeL;
	private $adresseL;
	private $dateL;
	private $numeroC;
	private $etat;
    private $idd;
    private $user_id;
	function __construct($region,$methode,$adr,$date,$num,$etat,$user_id){
		
		$this->region=$region;
		$this->methodeL=$methode;
		$this->adresseL=$adr;
		$this->dateL=$date;
		$this->numeroC=$num;
		$this->etat=$etat;
		$this->user_id=$user_id;
	}
	
	
	function getRegion(){
		return $this->region;
	}
	function getMethode(){
		return $this->methodeL;
	}
	function getAdresse(){
		return $this->adresseL;
	}
	function getDateL(){
		return $this->dateL;
	}
	function getNumero(){
		return $this->numeroC;
	}
	function getEtat(){
		return $this->etat;
	}
	function getUser_id(){
		return $this->user_id;
	}

	function setMethode($methodeL){
		$this->methodeL=$methodeL;
	}
	function setAdresse($adresseL){
		$this->adresseL=$adresseL;
	}
	function setDate($dateL){
		$this->dateL=$dateL;
	}

	
}

?>