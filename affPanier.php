<?php
session_start();
$id = $_SESSION["id"];
if(isset($_REQUEST["a"]))
	{
	if(!isset($_SESSION["panier"]))
	{
		echo '
			<script langage="javascript">
				
				location.href= "index.php";
			</script>';
	}
		require('Panier.class.php');
		$pan = $_SESSION["panier"];
		$pp= new Panier();
		
	$mysqli=new mysqli('localhost','root','','dataclothesecommerce');
	
	$row=$mysqli->query("insert into ordre_clients values('','','',".$id.",'en preparation')");
	$order=$mysqli->insert_id;
	$row=$mysqli->query("select * from produit_panier where Panier_idPanier=$pan");
	
	$i=0;
	while($data=mysqli_fetch_object($row))
	{
		$row2=$mysqli->query("insert into produits_commandes values(".$data->Quantite.",".$order.",".$data->Produit_idProducts.")");
		echo "insert into produits_commandes values(".$data->Quantite.",".$order.",".$data->Produit_idProducts.")";
		$i++;
	}
 echo '
			<script langage="javascript">
				alert(\'Validé\');
				location.href= "index.php";
			</script>';
$mysqli->close();
		
		
	}
	include("Panier.class.php");
	$pan = new Panier();
	$panier = $pan->SelectPanier($id);
	
	
	echo "<center><div>";
	include("PorduitPanier.php");
	echo "</center></div>";
	$_SESSION["panier"]=$panier;
	
	
?>
	<br />
	<center>
<form method="post" action="affPanier.php?a=1">
<input type="submit" value="Valider" />
</form>
</center>
