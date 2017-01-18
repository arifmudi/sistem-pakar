<?php 
include "inc.session.php"; 
include "../lib/inc.koneksidb.php";

// Membaca variabel dari URL (alamat browser)
$kdsakit 	= isset($_GET['kdsakit']) ? $_GET['kdsakit'] : '';	

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
    <script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
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
          <li class="active"><a href="RelasiAddPilih.php">Buat Relasi</a></li>

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
<b>RELASI GEJALA DAN PENYAKIT</b>
  </div>
  <div class="panel-body">
    
    <form name="form1" method="post" action="RelasiAddSim.php">
<table class="table table-striped">

<tr >
  <th colspan="4"><b>Nama Penyakit :</b></th>
</tr>
<tr>
  <td colspan="4">
  <select name="CmbPenyakit" onChange="MM_jumpMenu('parent',this,0)">
  <option value="<?php echo $_SERVER['PHP_SELF'];?>">[ Daftar Penyakit ]</option>
  <?php 
  $sqlp = "SELECT * FROM penyakit ORDER BY kd_penyakit";
  $qryp = mysql_query($sqlp, $koneksi)  or die ("SQL Error: ".mysql_error());
  while ($datap=mysql_fetch_array($qryp)) {
  // Untuk Buat Nilai Terpilih
  if ($datap['kd_penyakit']==$kdsakit) {
     $cek ="selected";
  }
  else {
     $cek ="";
  }
  
  // Kode untuk menampilkan daftar
  echo "<option value='RelasiAddPilih.php?kdsakit=$datap[kd_penyakit]' $cek> $datap[kd_penyakit] | $datap[nm_penyakit]</option>";
  }
  ?>
  </select>
  <input name="TxtKodeH" type="hidden" value="<?php echo $kdsakit; ?>"></td>
</tr>
<tr> 
  <th colspan="4"><b>Daftar Gejala : </b></th>
  </tr>
<?php 
$sql = "SELECT * FROM gejala ORDER BY kd_gejala";
$qry = mysql_query($sql, $koneksi) or die ("SQL Error: ".mysql_error());
$no = 0;
while ($data=mysql_fetch_array($qry)) {
   $no++;
   $sqlr  = "SELECT * FROM relasi WHERE kd_penyakit='$kdsakit' AND kd_gejala='$data[kd_gejala]'";
   $qryr = mysql_query($sqlr, $koneksi);
   $cocok= mysql_num_rows($qryr);
   
  // Kode untuk nilai gejala terpilih
  // dan Kode untuk memberi warna pada nilai terpilih
  if ($cocok==1) {
    $cek = " checked";
    $bg  = "#CCFF00";
  }
  else {
    $cek = "";
    $bg  = "#FFFFFF";
  }
?>
<tr bgcolor="#FFFFFF">
  <td width="18" align="center"><?php echo $no; ?></td> 
  <td width="20" bgcolor="<?php echo $bg; ?>">
  <input name="CekGejala[]" type="checkbox" value="<?php echo $data['kd_gejala']; ?>" <?php echo $cek; ?>></td>
  <td width="51"><?php echo $data['kd_gejala']; ?></td>
  <td width="490"><?php echo $data['nm_gejala']; ?>  </td>
</tr>
<?php
 }
?>
<tr> 
  <td colspan="4" align="center">
   <input class="btn btn-sm btn-success raised" type="submit" name="Submit" value="Simpan Relasi">
   <input class="btn btn-sm btn-warning raised" type="reset" name="reset" value="Normalkan"></td>
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

