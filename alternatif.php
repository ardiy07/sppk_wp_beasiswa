<?php
session_start();
include('configdb.php');
function rupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">

	<title><?php echo $_SESSION['judul'] . " - " . $_SESSION['by']; ?></title>

	<!-- Bootstrap core CSS -->
	<!--link href="ui/css/bootstrap.css" rel="stylesheet"-->
	<link href="ui/css/cerulean.min.css" rel="stylesheet">

	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="ui/css/datatables/dataTables.bootstrap.css">

	<script type="text/javascript" language="javascript" src="ui/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="ui/js/dataTables.bootstrap.min.js"></script>

	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<!--script src="./index_files/ie-emulation-modes-warning.js"></script-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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

	<div class="container mt-5" data-aos="fade-right" data-aos-duration="500">
		<!-- Main component for a primary marketing message or call to action -->
		<div class="panel panel-primary">
			<!-- Default panel contents -->
			<?php
			//include 'config.php';
			$kriteria = $mysqli->query("select * from kriteria");
			if (!$kriteria) {
				echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
				exit();
			}
			$i = 0;
			while ($row = $kriteria->fetch_assoc()) {
				@$k[$i] = $row["kriteria"];
				$i++;
			}

			$alternatif = $mysqli->query("select * from alternatif");
			if (!$alternatif) {
				echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
				exit();
			}
			$i = 0;
			?>
			<div class="panel-body table-responsive">
				<a class='btn btn-primary' href='add-alternatif.php'> Tambah Data Alternatif</a><br /><br />
				<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Alternatif</th>
							<th><?php echo ucwords($k[0]); ?></th>
							<th><?php echo ucwords($k[1]); ?></th>
							<th><?php echo ucwords($k[2]); ?></th>
							<th><?php echo ucwords($k[3]); ?></th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						while ($row = $alternatif->fetch_assoc()) {
							echo '<tr class="text-center">';
							echo '<td>' . $i++ . '</td>';
							echo '<td>' . ucwords($row["alternatif"]) . '</td>';
							echo '<td>' . rupiah($row["k1"]) . '</td>';
							echo '<td>' . $row["k2"] . '</td>';
							echo '<td>' . $row["k3"] . '</td>';
							echo '<td>' . $row["k4"] . '</td>';
							echo '<td><!--a href="#"><i class="fa fa-search"></i></a-->';
						?>
							<a href="edit-alternatif.php?id=<?php echo $row['id_alternatif']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
							<a href="del.php?id=<?php echo $row['id_alternatif']; ?>" onClick="return confirm('Yakin ingin menghapus data ke-<?php echo $i - 1; ?> Alternatif <?php echo $row['alternatif']; ?> ?');" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</a></td>
						<?php
							echo '</tr>';
						}
						?>
					</tbody>
				</table>
			</div>
			</div>
		</div>
	</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
	AOS.init();
</script>

</html>

