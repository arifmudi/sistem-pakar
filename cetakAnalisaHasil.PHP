<?php 
include "lib/inc.koneksidb.php";

$NOIP = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT analisa_hasil.*, penyakit.* 
		FROM analisa_hasil,penyakit 
		WHERE penyakit.kd_penyakit=analisa_hasil.kd_penyakit
		AND analisa_hasil.noip='$NOIP'
		ORDER BY analisa_hasil.id DESC LIMIT 1";
$qry = mysql_query($sql, $koneksi) or die ("Query Hasil salah".mysql_error());
$data= mysql_fetch_array($qry);
if ($data['kelamin']=="L") {
	$kelamin = "Pria";
}
else {
	$kelamin = "Wanita";
}
?>
<html>
<head>
<title>Hasil Analisa</title>
</head>
<body onLoad="window.print();">
<div class="isi">
<table class="table table-striped">
  <tr> 
    <td colspan="2" align="center"><h4>HASIL KEMUNGKINAN DIAGNOSA </h4></td>
  </tr>
  <tr> 
    <th colspan="2" class="success"><b>DATA PASIEN :</b></th>
  </tr>
  <tr> 
    <td width="100">Nama</td>
    <td width="689"><?php echo $data['nama']; ?></td>
  </tr>
  <tr> 
    <td>Jenis Kelamin</td>
    <td><?php echo $kelamin; ?></td>
  </tr>
  <tr> 
    <td>Alamat</td>
    <td><?php echo $data['alamat']; ?></td>
  </tr>
  <tr> 
    <td>Pekerjaan</td>
    <td><?php echo $data['pekerjaan']; ?></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <br>

  <tr> 
    <th class="success" colspan="2"><b>HASIL ANALISA TERAKHIR :</b></th>
  </tr>
<td>&nbsp;</td>
  <tr> 
    <td>Penyakit</td>
    <td><?php echo $data['kd_penyakit']." | ".$data['nm_penyakit']; ?></td>
  </tr>
<td>&nbsp;</td>
  <tr> 
    <td valign="top">Gejala</td>
    <td>
      <?php 
	  	// Menampilkan daftar gejala
		$sql_gejala = "SELECT gejala.* FROM gejala,relasi
						WHERE gejala.kd_gejala=relasi.kd_gejala
						AND relasi.kd_penyakit='$data[kd_penyakit]'";
		$qry_gejala = mysql_query($sql_gejala, $koneksi);
		$i	= 0;
		while ($hsl_gejala=mysql_fetch_array($qry_gejala)) {
		$i++;
			echo "$i . $hsl_gejala[nm_gejala] <br>";
		}
		?>    </td>
  </tr>
<td>&nbsp;</td>
  <tr> 
    <td valign="top">Keterangan</td>
    <td ><div align="justify"><?php echo $data['keterangan']; ?></div></td>
  </tr>
<td>&nbsp;</td>
  <tr> 
    <td valign="top">Solusi</td>
    <td><div align="justify"><?php echo $data['solusi']; ?></div></td>
  </tr>

</table>
</br>
</div>
</body>
</html>
