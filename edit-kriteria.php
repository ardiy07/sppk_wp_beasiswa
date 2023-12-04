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
          <a class="nav-link" href="#">Home</a>
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
      <div class="text3 text-center" style="font-size: 2vw;" data-aos="fade-right" data-aos-duration="700">Edit Data Kriteria</div>
      <?php
      $result = $mysqli->query("select * from kriteria where id_kriteria = " . $_GET['id'] . "");
      if (!$result) {
        echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
        exit();
      }
      while ($row = $result->fetch_assoc()) {
      ?>
        <div class="panel-body" data-aos="fade-right" data-aos-duration="700">
          <form role="form" method="post" action="edit-k.php?id=<?php echo $_GET['id']; ?>">
            <div class="box-body mt-2">
              <div class="form-group mt-3">
                <label for="kriteria">Kriteria</label>
                <input type="text" class="form-control" name="kriteria" id="kriteria" value="<?php echo $row["kriteria"]; ?>" placeholder="Kriteria">
              </div>
              <div class="form-group mt-3">
                <label for="kepentingan">Nilai Kepentingan</label>
                  <input type="number" class="form-control" name="kepentingan" id="kepentingan" value="<?php echo $row["kepentingan"]; ?>" min="1"> 
              </div>
              <div class="form-group mt-3">
                <label for="cost_benefit">Cost / Benefit</label>
                <select class="form-control" name="cost_benefit" id="cost_benefit">
                  <option value='cost' <?php if ($row["cost_benefit"] == 'cost') echo "selected" ?>>Cost</option>
                  <option value='benefit' <?php if ($row["cost_benefit"] == 'benefit') echo "selected" ?>>Benefit</option>
                </select>
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer mt-3">
              <button type="reset" class="btn btn-info">Reset</button>
              <a href="kriteria.php" type="cancel" class="btn btn-warning">Batal</a>
              <button type="submit" class="btn btn-primary">Proses Edit</button>
            </div>
          </form>
        <?php
      }
        ?>
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