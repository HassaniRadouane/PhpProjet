<?php
class Produit
{
	public $idProduit;
	public $typeProduit;
	public $prix;
	public $description;
	public $smallDescription;
	public $quantite;
	public $dateMaj;
	public $categorie_idCategorie;
	public $ima;
	
	public function __construct(){}
	
	function getProduit($typ,$pri,$des,$sma,$qua,$cat,$image)
	{
		$this->typeProduit=$typ;
		
		$this->prix=$pri;
		$this->description=$des;
		$this->smallDescription=$sma;
		$this->quantite=$qua;
		$this->categorie_idCategorie=$cat;
		$this->ima=$image;
	}
		
	public function add()
	{
		if($this->ima!="")
		{		
			echo '<br >**'.$this->ima;
			$dossier = $_SERVER['DOCUMENT_ROOT']."admin/images/";
			$fichier = $this->ima["name"];
			echo "<br />!! ".$this->ima['tmp_name']." ==<br />";
			if(move_uploaded_file($this->ima['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			{
				echo 'Upload effectué avec succès !';
			}
			else //Sinon (la fonction renvoie FALSE).
			{
				echo "error  ".$this->ima['error'];
			}		
			
		}
		$t= "'".$this->typeProduit."'";
		
		$mysqli=new mysqli('localhost','root','','dataclothesecommerce');
		$idcat = explode(':',$this->categorie_idCategorie);
		$idcat = $idcat[0];
		$mysqli->query("insert into produit values('',$t,".$this->prix.",'".$this->description."','".$this->smallDescription."',". $this->quantite . ",NOW(),".$idcat.",'".$fichier."')");
				  //echo "insert into produit values('',$t,".$this->prix.",'".$this->description."','".$this->smallDescription."',". $this->quantite . ",NOW(),".$idcat.",'".$fichier."')";

		$mysqli->close();
	}


}



?>