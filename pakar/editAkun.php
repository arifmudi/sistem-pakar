
<?php 
include "../lib/inc.koneksidb.php";
include "inc.session.php";  

# Baca variabel Form (If Register Global ON)
$TxtUserBaru = isset($_POST['TxtUserBaru']) ? $_POST['TxtUserBaru'] : '';
$TxtPassBaru = isset($_POST['TxtPassBaru']) ? $_POST['TxtPassBaru'] : '';
$TxtPassBaru2 = isset($_POST['TxtPassBaru2']) ? $_POST['TxtPassBaru2'] : '';

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sistem Pakar Penyakit Pada Usus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/buttons.css" />
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="isi"><br>

<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
      MENU
      </button>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        Administrator / Pakar
      </a>
    </div>

  <!-- navbar kanan collapse -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Akun
            <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class=""><a href="#">Edit Akun</a></li>
              <li class="divider"></li>
              <li><a href="LoginOut.php" target="_self">Logout</a> </li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav> </br>

  <div class="container-fluid main-container">
      <div class="col-md-2 sidebar">
        <div class="row">
  <!-- uncomment code for absolute positioning tweek see top comment in css -->
  <div class="absolute-wrapper"> </div>

  <!-- Menu -->
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
  <div class="side-menu">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          
          <li class="active"><a href="index.php">Beranda</a></li>
          <li><a href="LapPenyakitSemua.php">Lap Penyakit</a></li>
          <li><a href="RelasiAddPilih.php">Buat Relasi</a></li>

          <!-- Dropdown penyakit-->
          <li class="panel panel-default" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-penyakit">
             Penyakit <span class="caret"></span>
            </a>
            <!-- Dropdown level 1 penyakit -->
            <div id="dropdown-penyakit" class="panel-collapse collapse">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li><a href="PenyakitTampil.php">Edit</a></li>
                  <li><a href="PenyakitAddFm.php">Tambah</a></li>
                </ul>
              </div>
            </div>
          </li>
          <!-- /Dropdown penyakit--> 

            <!-- Dropdown gejala-->
          <li class="panel panel-default" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-gejala">
             Gejala<span class="caret"></span>
            </a>
            <!-- Dropdown level 1 penyakit -->
            <div id="dropdown-gejala" class="panel-collapse collapse">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li><a href="GejalaTampil.php">Edit</a></li>
                  <li><a href="GejalaAddFm.php">Tambah</a></li>
                </ul>
              </div>
            </div>
          </li>
          <!-- /Dropdown penyakit--> 
        
        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>

  </div>
</div>

  </div>      
</div>

      <div class="col-md-10 content">
          <div class="panel panel-default">
  <div class="panel-heading">
    <b>EDIT AKUN</b>
  </div>
  <div class="panel-body">
  <form action="editAkunSim.php" method="post" name="form1" target="_self">
    
    <br>
    <h4>Masukan Username dan Password baru</h4>
    <br>
    <div class="form-group"> 
    <input class="form-control" value="<?php echo $_SESSION['SES_USER']; ?>" placeholder="Masukkan Username Baru" name="TxtUserBaru" type="text" size="35" maxlength="60">
    </div>

    <div class="form-group">
    <input placeholder="Password Baru" class="form-control" name="TxtPassBaru" type="password">
    </div>

    <div class="form-group">
    <input placeholder="Konfirmasi Password Baru" class="form-control" name="TxtPassBaru2" type="password">
    </div>

    <br>
    
    <div class="form-group">   
    <button type="submit" name="Submit" value="Lanjut" class="btn btn-success raised btn-sm">Simpan</button>
    <button type="reset" name="Reset" value="Reset" class="btn btn-danger raised btn-sm">Reset</button>
    </div>
  
    <br>
  
</form>

  </div>
</div>
      </div>


    </div>
</br>
       <!-- footer start -->
<div class="bawah"><div class="copy">
            <p> Sistem Pakar Diagnosa Penyakit Pada Usus </p>
        </div>
    </div>
<!-- footer end -->
</br>
</div>
</div>
</body>
</html>


