<?php
	@session_start();
	$_SESSION['judul'] = 'SPPK PEMILIHAN PENERIMA BEASISWA';
	$_SESSION['welcome'] = 'SISTEM PENGAMBIL KEPUTUSAN BERBASIS WEB DENGAN METODE WEIGHT PRODUCT';
	$_SESSION['by'] = 'Kelompok A1';
	$mysqli = new mysqli('localhost','root','','spk-wp2');
	if($mysqli->connect_errno){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
?>
