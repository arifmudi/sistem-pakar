<?php 
include "inc.session.php"; 
include "../lib/inc.koneksidb.php";
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Laporan Data Gejala</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="wrap">

<!-- header -->
<div class="header">
    <div class="logo">
         <a href="index.php"><img src="../images/logo.png"> </a>
     </div>
   <div class="clear"></div>
</div>
<!-- header -->

<!--nav bar-->
<div class="menu">
     <ul class="nav">
        <li><a href="PenyakitAddFm.php" target="_self">Tambah Penyakit</a></li>
      <li><a href="PenyakitTampil.php" target="_self">Data Penyakit</a></li>
        <li><a href="RelasiAddPilih.php" target="_self">Buat Relasi Aturan </a></li>
      <li><a href="GejalaAddFm.php" target="_self">Tambah Gejala</a> </li>
      <li><a href="GejalaTampil.php" target="_self">Data Gejala </a> </li>
      <li><a href="LapPenyakitSemua.php" target="_self">Lap Penyakit</a> </li>
      <li class="active"><a href="LapGejala.php" target="_self">Lap Gejala</a> </li>
      <li><a href="LoginOut.php" target="_self">Logout</a>  </li>
      <div class="clear"></div>
      </ul>
    <div class="clear"></div>
   </div>
<!--end navbar-->
  
<!--main-->
<div class="main">

<div class="content">

<table width="600" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
  <tr> 
    <td colspan="2"><h2><b>DAFTAR  GEJALA</b></h2></td>
  </tr>
  <tr> 
    <th width="80" align="center"><b>Kode</b></th>
    <th width="509"><b>Nama Gejala</b></th>
  </tr>
  <?php 
  $sql = "SELECT * FROM gejala ORDER BY kd_gejala";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td align="center"><?php echo $data['kd_gejala']; ?></td>
    <td><?php echo $data['nm_gejala']; ?></td>
  </tr>
  <?php
  }
  ?>
</table>


<div align="right"><a class="button"href="menu.php">Kembali</a></div>


</div>

<p>&nbsp;</p>

</div>

<!--end main-->

<!-- footer -->
<div class="ftr-bg">
    <div class="footer1">
    <div class="copy">
      <p> Sistem Pakar Diagnosa Penyakit Pada Usus</p>
    </div>
    <div class="clear"></div> 
  </div>
</div>
<!-- footer -->

</div>

</body>
</html>