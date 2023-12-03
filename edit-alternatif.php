<?php
session_start();
include('configdb.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title><?php echo $_SESSION['judul'] ?></title>

  <!-- Bootstrap core CSS -->
  <!--link href="ui/css/bootstrap.css" rel="stylesheet"-->
  <link href="ui/css/cerulean.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="ui/css/jumbotron.css" rel="stylesheet">
</head>

<body>

  <!-- Static navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php echo $_SESSION['judul']; ?></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="kriteria.php">Data Kriteria</a></li>
          <li><a href="alternatif.php">Data Alternatif</a></li>
          <li><a href="analisa.php">Analisa</a></li>
          <li><a href="perhitungan.php">Perhitungan</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
  <div class="container">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-primary">
      <!-- Default panel contents -->
      <div class="panel-heading">Edit Data Alternatif</div>
      <?php
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
      $result = $mysqli->query("select * from alternatif where id_alternatif = " . $_GET['id'] . "");
      if (!$result) {
        echo $mysqli->connect_errno . " - " . $mysqli->connect_error;
        exit();
      }
      while ($row = $result->fetch_assoc()) {
      ?>
        <div class="panel-body">
          <form role="form" method="post" action="edit.php?id=<?php echo $_GET['id']; ?>">
            <div class="box-body">
              <div class="form-group">
                <label for="alternatif">Alternatif</label>
                <input type="text" class="form-control" name="alternatif" id="alternatif" value="<?php echo $row["alternatif"]; ?>" placeholder="Nama Alternatif">
              </div>
              <div class="form-group">
                <label for="k1"><?php echo ucwords($k[0]); ?></label>
                <input name="k1" id="k1" min="10000" class="form-control" value="<?php echo $row["k1"]; ?>" placeholder="Pendapatan Orang Tua">
              </div>
              <div class="form-group">
                <label for="k2"><?php echo ucwords($k[1]); ?></label>
                <input name="k2" id="k2" min="1" max="100" class="form-control" value="<?php echo $row["k2"]; ?>" placeholder="Nilai Raport">
              </div>
              <div class="form-group">
                <label for="k3"><?php echo ucwords($k[2]); ?></label>
                <select class="form-control" name="k3" id="k3">
                  <option value='20' <?php if ($row["k3"] == '20') echo "selected" ?>>Sangat Buruk</option>
                  <option value='40' <?php if ($row["k3"] == '40') echo "selected" ?>>Buruk</option>
                  <option value='60' <?php if ($row["k3"] == '60') echo "selected" ?>>Sedang</option>
                  <option value='80' <?php if ($row["k3"] == '80') echo "selected" ?>>Baik</option>
                  <option value='100' <?php if ($row["k3"] == '100') echo "selected" ?>>Sangat Baik</option>
                </select>
              </div>
              <div class="form-group">
                <label for="k4"><?php echo ucwords($k[3]); ?></label>
                <select class="form-control" name="k4" id="k4">
                  <option value='20' <?php if ($row["k4"] == '20') echo "selected" ?>>Sangat Buruk</option>
                  <option value='40' <?php if ($row["k4"] == '40') echo "selected" ?>>Buruk</option>
                  <option value='60' <?php if ($row["k4"] == '60') echo "selected" ?>>Sedang</option>
                  <option value='80' <?php if ($row["k4"] == '80') echo "selected" ?>>Baik</option>
                  <option value='100' <?php if ($row["k4"] == '100') echo "selected" ?>>Sangat Baik</option>
                </select>
              </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <button type="reset" class="btn btn-info">Reset</button>
              <a href="alternatif.php" type="cancel" class="btn btn-warning">Batal</a>
              <button type="submit" class="btn btn-primary">Proses Edit</button>
            </div>
          </form>
        <?php
      }
        ?>
        </div>
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

</body>

</html>