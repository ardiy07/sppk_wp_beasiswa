<?php
session_start();
include('configdb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SPPK Weighted Product</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto"> <!-- ml-auto to align to the right -->
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="kriteria.php">Data Kriteria</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="alternatif.php">Data Alternatif</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="analisa.php">Analisa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="perhitungan.php">Perhitungan</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container mt-5">
		<!-- Main component for a primary marketing message or call to action -->
		<div class="panel panel-primary">
			<!-- Default panel contents -->
			<div class="panel-body">
				<center>
					<?php
					echo "<b>Matrix Alternatif - Kriteria</b></br>";

					$alt = get_alternatif();
					$alt_name = get_alt_name();
					end($alt_name);
					$arl2 = key($alt_name) + 1; //new
					$kep = get_kepentingan();
					$cb = get_costbenefit();
					$k = jml_kriteria();
					$a = jml_alternatif();
					$tkep = 0;
					$tbkep = 0;

					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> matrix alternatif/kriteria <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif / Kriteria</th><th>K1</th><th>K2</th><th>K3</th><th>K4</th></tr></thead>";
					for ($i = 0; $i < $a; $i++) {
						echo "<tr><td><b>A" . ($i + 1) . "</b></td>";
						for ($j = 0; $j < $k; $j++) {
							if ($j == 0) {
								if ($alt[$i][0] <= 500000) {
									echo "<td> 20 </td>";
								} elseif ($alt[$i][0] <= 1000000) {
									echo "<td> 40 </td>";
								} elseif ($alt[$i][0] <= 1500000) {
									echo "<td> 60 </td>";
								} elseif ($alt[$i][0] <= 2000000) {
									echo "<td> 80 </td>";
								} elseif ($alt[$i][0] <= 2500000) {
									echo "<td> 100 </td>";
								}
							} elseif ($j == 1) {
								if ($alt[$i][1] <= 60) {
									echo "<td> 20 </td>";
								} elseif ($alt[$i][1] <= 70) {
									echo "<td> 40 </td>";
								} elseif ($alt[$i][1] <= 80) {
									echo "<td> 60 </td>";
								} elseif ($alt[$i][1] <= 90) {
									echo "<td> 80 </td>";
								} elseif ($alt[$i][1] <= 100) {
									echo "<td> 100 </td>";
								}
							} else {
								echo "<td>" . $alt[$i][$j] . "</td>";
							}
						}
						echo "</tr>";
					}
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> bobot kepentingan <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>Perhitungan Bobot Kepentingan</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th></th><th>K1</th><th>K2</th><th>K3</th><th>K4</th><th>Jumlah</th></tr></thead>";
					echo "<tr><td><b>Kepentingan</b></td>";
					for ($i = 0; $i < $k; $i++) {
						$tkep = $tkep + $kep[$i];
						echo "<td>" . $kep[$i] . "</td>";
					}
					echo "<td>" . $tkep . "</td></tr>";
					echo "<tr><td><b>Bobot Kepentingan</b></td>";
					for ($i = 0; $i < $k; $i++) {
						$bkep[$i] = ($kep[$i] / $tkep);
						$tbkep = $tbkep + $bkep[$i];
						echo "<td>" . round($bkep[$i], 6) . "</td>";
					}
					echo "<td>" . $tbkep . "</td></tr>";
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> pangkat <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>Perhitungan Pangkat</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th></th><th>K1</th><th>K2</th><th>K3</th><th>K4</th></tr></thead>";
					echo "<tr><td><b>Cost/Benefit</b></td>";
					for ($i = 0; $i < $k; $i++) {
						echo "<td>" . ucwords($cb[$i]) . "</td>";
					}
					echo "</tr>";
					echo "<tr><td><b>Pangkat</b></td>";
					for ($i = 0; $i < $k; $i++) {
						if ($cb[$i] == "cost") {
							$pangkat[$i] = (-1) * $bkep[$i];
							echo "<td>" . round($pangkat[$i], 6) . "</td>";
						} else {
							$pangkat[$i] = $bkep[$i];
							echo "<td>" . round($pangkat[$i], 6) . "</td>";
						}
					}
					echo "</tr>";
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> vektor S <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>Perhitungan Nilai S</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif</th><th>S</th></tr></thead>";
					for ($i = 0; $i < $a; $i++) {
						echo "<tr><td><b>A" . ($i + 1) . "</b></td>";
						for ($j = 0; $j < $k; $j++) {
							if ($j == 0) {
								if ($alt[$i][0] <= 500000) {
									$s[$i][0] = pow((20), $pangkat[$j]);
								} elseif ($alt[$i][0] <= 1000000) {
									$s[$i][0] = pow((40), $pangkat[$j]);
								} elseif ($alt[$i][0] <= 1500000) {
									$s[$i][0] = pow((60), $pangkat[$j]);
								} elseif ($alt[$i][0] <= 2000000) {
									$s[$i][0] = pow((80), $pangkat[$j]);
								} elseif ($alt[$i][0] <= 2500000) {
									$s[$i][0] = pow((100), $pangkat[$j]);
								}
							} elseif ($j == 1) {
								if ($alt[$i][1] <= 60) {
									$s[$i][1] = pow((20), $pangkat[$j]);
								} elseif ($alt[$i][1] <= 70) {
									$s[$i][1] = pow((40), $pangkat[$j]);
								} elseif ($alt[$i][1] <= 80) {
									$s[$i][1] = pow((60), $pangkat[$j]);
								} elseif ($alt[$i][1] <= 90) {
									$s[$i][1] = pow((80), $pangkat[$j]);
								} elseif ($alt[$i][1] <= 100) {
									$s[$i][1] = pow((100), $pangkat[$j]);
								}
							} else {
								$s[$i][$j] = pow(($alt[$i][$j]), $pangkat[$j]);
							}
						}
						$ss[$i] = $s[$i][0] * $s[$i][1] * $s[$i][2] * $s[$i][3];
						echo "<td>" . round($ss[$i], 6) . "</td></tr>";
					}
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> vektor S <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					echo "<b>Hasil Akhir</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif</th><th>V</th></tr></thead>";
					$total = 0;
					for ($i = 0; $i < $a; $i++) {
						$total = $total + $ss[$i];
					}
					for ($i = 0; $i < $a; $i++) {
						echo "<tr><td><b>" . $alt_name[$i] . "</b></td>";
						$v[$i] = round($ss[$i] / $total, 6);
						echo "<td>" . $v[$i] . "</td></tr>";
					}
					echo "</table><hr>";
					// >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> vektor S <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< //
					uasort($v, 'cmp');
					for ($i = 0; $i < $arl2; $i++) { //new for 8 lines below
						if ($i == 0)
							echo "<div class='alert alert-dismissible alert-info'><b><i>Dari tabel tersebut dapat disimpulkan bahwa " . $alt_name[array_search((end($v)), $v)] . " mempunyai hasil paling tinggi, yaitu " . current($v);
						elseif ($i == ($arl2 - 1))
							echo "</br>Dan terakhir " . $alt_name[array_search((prev($v)), $v)] . " dengan nilai " . current($v) . ".</i></b></div>";
						else
							echo "</br>Lalu diikuti dengan " . $alt_name[array_search((prev($v)), $v)] . " dengan nilai " . current($v);
					}

					function jml_kriteria()
					{
						include 'configdb.php';
						$kriteria = $mysqli->query("select * from kriteria");
						return $kriteria->num_rows;
					}

					function jml_alternatif()
					{
						include 'configdb.php';
						$alternatif = $mysqli->query("select * from alternatif");
						return $alternatif->num_rows;
					}

					function get_kepentingan()
					{
						include 'configdb.php';
						$kepentingan = $mysqli->query("select * from kriteria");
						if (!$kepentingan) {
							echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
							exit();
						}
						$i = 0;
						while ($row = $kepentingan->fetch_assoc()) {
							@$kep[$i] = $row["kepentingan"];
							$i++;
						}
						return $kep;
					}

					function get_costbenefit()
					{
						include 'configdb.php';
						$costbenefit = $mysqli->query("select * from kriteria");
						if (!$costbenefit) {
							echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
							exit();
						}
						$i = 0;
						while ($row = $costbenefit->fetch_assoc()) {
							@$cb[$i] = $row["cost_benefit"];
							$i++;
						}
						return $cb;
					}

					function get_alt_name()
					{
						include 'configdb.php';
						$alternatif = $mysqli->query("select * from alternatif");
						if (!$alternatif) {
							echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
							exit();
						}
						$i = 0;
						while ($row = $alternatif->fetch_assoc()) {
							@$alt[$i] = $row["alternatif"];
							$i++;
						}
						return $alt;
					}

					function get_alternatif()
					{
						include 'configdb.php';
						$alternatif = $mysqli->query("select * from alternatif");
						if (!$alternatif) {
							echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
							exit();
						}
						$i = 0;
						while ($row = $alternatif->fetch_assoc()) {
							@$alt[$i][0] = $row["k1"];
							@$alt[$i][1] = $row["k2"];
							@$alt[$i][2] = $row["k3"];
							@$alt[$i][3] = $row["k4"];
							$i++;
						}
						return $alt;
					}

					function cmp($a, $b)
					{
						if ($a == $b) {
							return 0;
						}
						return ($a < $b) ? -1 : 1;
					}

					function print_ar(array $x)
					{	//just for print array
						echo "<pre>";
						print_r($x);
						echo "</pre></br>";
					}
					?>
				</center>
			</div>
			<div class="panel-footer text-primary"><?php echo $_SESSION['by']; ?><div class="pull-right"></div>
			</div>
		</div>

	</div> <!-- /container -->


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="ui/js/ie10-viewport-bug-workaround.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init();
	</script>

</body>

</html>