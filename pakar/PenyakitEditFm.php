<?php 
include "inc.session.php"; 
include "../lib/inc.koneksidb.php";

// Membaca variabel dari URL (alamat browser)
$kdubah 		= isset($_GET['kdubah']) ? $_GET['kdubah'] : '';	

# Menampilkan data
$sql = "SELECT * FROM penyakit WHERE kd_penyakit='$kdubah'";
$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);
	
	# Samakan dgn Variabel Form
	$TxtKode  		= isset($_POST['TxtKodeH']) ? $_POST['TxtKodeH'] : $data['kd_penyakit'];
	$TxtPenyakit 	= isset($_POST['TxtPenyakit']) ? $_POST['TxtPenyakit'] : $data['nm_penyakit']; 
	$TxtKeterangan = isset($_POST['TxtKeterangan']) ? $_POST['TxtKeterangan'] : $data['nm_penyakit']; 
	$TxtSolusi 		= isset($_POST['TxtSolusi']) ? $_POST['TxtSolusi'] : $data['solusi'];
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
              <li class=""><a href="editAkun.php">Edit Akun</a></li>
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
          
          <li><a href="index.php">Beranda</a></li>
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
<b>UBAH DATA PENYAKIT</b>
  </div>
  <div class="panel-body">
    
    <form name="form1" method="post" action="PenyakitEditSim.php">
<table class="table table-striped">
<tr> 

<tr > 
  <td>Kode</td>
  <td><input name="TxtKode" type="text"  maxlength="4" size="10" value="<?php echo $TxtKode; ?>" disabled="disabled">
    <input name="TxtKodeH" type="hidden" value="<?php echo $TxtKode; ?>"></td>
</tr>
<tr > 
  <td width="137">Nama Penyakit</td>
  <td width="452"><input name="TxtPenyakit" type="text" value="<?php echo $TxtPenyakit; ?>" size="60" maxlength="100"></td>
</tr>
<tr >
  <td>Keterangan</td>
  <td><textarea name="TxtKeterangan" cols="50" rows="4"><?php echo $TxtKeterangan; ?></textarea></td>
</tr>
<tr >
  <td>Solusi</td>
  <td><textarea name="TxtSolusi" cols="50" rows="4"><?php echo $TxtSolusi; ?></textarea></td>
</tr>
<tr > 
  <td>&nbsp;</td>
  <td><input class="btn btn-sm btn-success raised" type="submit" name="Submit" value="Simpan"> 
  <a class="btn btn-sm btn-warning raised" href="PenyakitTampil.php">kembali</a>
  </td>

</tr>
</table>


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


