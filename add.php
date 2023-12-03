<?php
	include('configdb.php');
	$alternatif = $_POST['alternatif'];
	$k1 = $_POST['k1'];
	$k2 = $_POST['k2'];
	$k3 = $_POST['k3'];
	$k4 = $_POST['k4'];

	if($k2 <= 60){
		$k2 = 20;
	} elseif($k2 <= 70){
		$k2 = 40;
	} elseif($k2 <= 80){
		$k2 = 60;
	} elseif($k2 <= 90){
		$k2 = 80;
	} else{
		$k2 = 100;
	};

	$id_alt = rand(1, 1000000) ;
	$result = $mysqli->query("INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `k1`, `k2`, `k3`, `k4`)
								VALUES ($id_alt, '".$alternatif."', '".$k1."', '".$k2."', '".$k3."', '".$k4."');");
	if(!$result){
		// echo "Gagal";
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: alternatif.php');
	}
?>
