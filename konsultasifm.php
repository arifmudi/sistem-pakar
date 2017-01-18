<?php 
include "lib/inc.koneksidb.php";

$NOIP = $_SERVER['REMOTE_ADDR'];

# Periksa apabila sudah ditemukan
$sql_cekh = "SELECT * FROM tmp_penyakit 
			 WHERE noip='$NOIP' 
			 GROUP BY kd_penyakit";
$qry_cekh = mysql_query($sql_cekh, $koneksi);
$hsl_cekh = mysql_num_rows($qry_cekh);
if ($hsl_cekh == 1) {
	$hsl_data = mysql_fetch_array($qry_cekh);
	
	$sql_pasien = "SELECT * FROM tmp_pasien WHERE noip='$NOIP'";
	$qry_pasien = mysql_query($sql_pasien, $koneksi);
	$hsl_pasien = mysql_fetch_array($qry_pasien);
		$sql_in = "INSERT INTO analisa_hasil SET
				  nama='$hsl_pasien[nama]',
				  kelamin='$hsl_pasien[kelamin]',
				  alamat='$hsl_pasien[alamat]',
				  pekerjaan='$hsl_pasien[pekerjaan]',
				  kd_penyakit='$hsl_data[kd_penyakit]',
				  noip='$hsl_pasien[noip]',
				  tanggal='$hsl_pasien[tanggal]'";
		mysql_query($sql_in, $koneksi);
					   
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
	exit;
}

$sqlcek = "SELECT * FROM tmp_analisa WHERE noip='$NOIP'";
$qrycek = mysql_query($sqlcek, $koneksi);
$datacek= mysql_num_rows($qrycek);
if ($datacek >= 1) {
	// Seandainya tmp kosong
	$sqlg = "SELECT gejala.* FROM gejala,tmp_analisa 
			 WHERE gejala.kd_gejala=tmp_analisa.kd_gejala 
			 AND tmp_analisa.noip='$NOIP' 
			 AND NOT tmp_analisa.kd_gejala 
			 	 IN(SELECT kd_gejala 
				 FROM tmp_gejala WHERE noip='$NOIP')
			 ORDER BY gejala.kd_gejala ASC";
	$qryg = mysql_query($sqlg, $koneksi) or die ("Gagal $qryg : ".mysql_error());
	$datag = mysql_fetch_array($qryg) or die ("Gagal datag : ".mysql_error());
	
	$kdgejala = $datag['kd_gejala'];
	$gejala   = $datag['nm_gejala'];
	//echo " ADA BOS ($sqlg)";	
}
else {
	// Seandainya tmp kosong
	$sqlg = "SELECT * FROM gejala ORDER BY kd_gejala ASC";
	$qryg = mysql_query($sqlg, $koneksi);
	$datag = mysql_fetch_array($qryg);
	
	$kdgejala = $datag['kd_gejala'];
	$gejala   = $datag['nm_gejala'];
}
?>
<html>
<head>
<title>Form Utama Penelusuran</title>
</head>
<body>
	<div class="isi">
<form action="?page=konsulcek" method="post" name="form1" target="_self">
  <table class="table table-striped table-hover"><br>
    <tr> 
      <th><b>JAWABLAH PERTANYAAN BERIKUT :</b></th>
    </tr>
    <tr> 
      <td width="312">Apakah anda mengalami<b> 
        <?php echo $gejala; echo "[ $kdgejala ]"; ?> </b>?
      <input name="TxtKdGejala" type="hidden" value="<?php echo $kdgejala; ?>"></td>
    </tr>
    <tr> 
      <td> <input type="radio" name="RbPilih" value="YA" checked>
        Benar (YA) 
        <input type="radio" name="RbPilih" value="TIDAK">
        Salah (TIDAK)</td>
    </tr>
    <tr> 
      <td> <input class="btn btn-success raised" type="submit" name="Submit" value="Jawab"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th><strong>GEJALA YANG TERPILIH YA (BENAR) </strong></th>
    </tr>
    <tr>
      <td>
	  <?php
	  $sql_gjl = "SELECT gejala.* FROM gejala, tmp_gejala WHERE gejala.kd_gejala=tmp_gejala.kd_gejala 
	  			  AND tmp_gejala.noip='$NOIP' ORDER BY tmp_gejala.kd_gejala";
	  $qry_gjl = mysql_query($sql_gjl, $koneksi) or die ("Gagal Query".mysql_error());
	  $cekAda  = mysql_num_rows($qry_gjl);
	  if ($cekAda == 0) {
	  	echo "BELUM ADA";
	  }
	  
	  while($hsl_gjl = mysql_fetch_array($qry_gjl)) {
	  	echo "[ $hsl_gjl[kd_gejala] ] = $hsl_gjl[nm_gejala] <br>";
	  }
	  ?>
	  </td>
    </tr>
    <tr>
      <th><strong>PENYAKIT YANG MUNGKIN TERSERANG </strong></th>
    </tr>
    <tr>
      <td>
	  <?php
	  $sql_pyk = "SELECT penyakit.* FROM penyakit, tmp_penyakit WHERE penyakit.kd_penyakit=tmp_penyakit.kd_penyakit 
	  			  AND tmp_penyakit.noip='$NOIP' GROUP BY tmp_penyakit.kd_penyakit";
	  $qry_pyk = mysql_query($sql_pyk, $koneksi) or die ("Gagal Query".mysql_error());
	  $cekAda2  = mysql_num_rows($qry_pyk);
	  if ($cekAda2 == 0) {
	  	echo "BELUM ADA";
	  }
	  
	  while($hsl_pyk = mysql_fetch_array($qry_pyk)) {
	  	echo "[ $hsl_pyk[kd_penyakit] ] = $hsl_pyk[nm_penyakit] <br>";
	  }
	  ?>
	  </td>
    </tr>
  </table>
</br>
</form>
</div>
</body>
</html>
