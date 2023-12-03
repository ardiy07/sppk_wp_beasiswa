<?php
	include('configdb.php');
	$alternatif = $_POST['alternatif'];
	$k1 = $_POST['k1'];
	$k2 = $_POST['k2'];
	$k3 = $_POST['k3'];
	$k4 = $_POST['k4'];

	$result = $mysqli->query("INSERT INTO `alternatif` (`alternatif`, `k1`, `k2`, `k3`, `k4`)
								VALUES ('".$alternatif."', '".$k1."', '".$k2."', '".$k3."', '".$k4."');");
	if(!$result){
		// echo "Gagal";
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: alternatif.php');
	}
?>
