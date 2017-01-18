<?php 
include "inc.session.php"; 
include "../lib/inc.koneksidb.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sistem Pakar Penyakit PAda Usus</title>
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
          <li class="active"><a href="LapPenyakitSemua.php">Lap Penyakit</a></li>
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
    <b>DAFTAR SEMUA PENYAKIT</b>
  </div>
  <div class="panel-body">
    
    <table class="table table-striped">
  
  <?php 
$batas = 2;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
if ( empty( $pg ) ) {
$posisi = 0;
$pg = 1;
} else {
$posisi = ( $pg - 1 ) * $batas;
}

  $sql = "SELECT * FROM penyakit ORDER BY kd_penyakit LIMIT $posisi, $batas";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr>
    <th width="120"><b>Kode</b></th>
    <th width="469"><b><?php echo $data['kd_penyakit']; ?></b></th>
  </tr>
  <tr>
    <td valign="top">Nama Penyakit </td>
    <td><?php echo $data['nm_penyakit']; ?></td>
  </tr>
  <tr>
    <td valign="top">Keterangan</td>
    <td><?php echo $data['keterangan']; ?></td>
  </tr>
  <tr> 
    <td valign="top">Solusi</td>
    <td><?php echo $data['solusi']; ?>
    <a href="LapGejalaPenyakit2.php?kdSakit=<?php echo $data['kd_penyakit']; ?>" target="_self"><span class="label label-danger">Lihat Gejalanya</span></a></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <?php
  }
  ?>

<tr>
<td colspan="2">
<?php
//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT * FROM penyakit ORDER BY kd_penyakit"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
//Navigasi ke sebelumnya
if ( $pg > 1 ) {
$link = $pg-1;
$prev = "<a href='?pg=$link'>Sebelumnya </a>";
} else {
$prev = "Sebelumnya ";
}
 
//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
if ( $i == $pg ) {
$nmr .= $i . " ";
} else {
$nmr .= "<a href='?pg=$i'>$i</a> ";
}
}
 
//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
$link = $pg + 1;
$next = "<a href='?pg=$link'>Selanjutnya</a>";
} else {
$next = " Selanjutnya";
}
 
//Tampilkan navigasi
echo '<ul class=pager><li class=previous>'.$prev.'</li><li>'.$nmr.'</li><li class=next>'.$next.'</li></ul>';
?>
</td>
</tr>
</table>

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
