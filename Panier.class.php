<?php
class Panier
{
public $idPanier;
public $dateCreation;
public $id_client;

function setPanier($nom)
	{
		$this->id_client=$id_client;
		
	}
public static function SelectPanier($id_client){
	
	
	$mysqli=new mysqli('localhost','root','','dataclothesecommerce');
	$row=$mysqli->query("select * from panier where id_client=$id_client");
	$data=mysqli_fetch_object($row);
	
		//echo $data->idPanier.": Créé le ".$data->dateCreation." Par le client ".$data->idPanier."<br />";
		
		
	
	
	$mysqli->close();
	return $data->idPanier;
}
}
?>