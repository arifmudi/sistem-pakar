<?php 
include "lib/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtNama 		= $_POST['TxtNama'];
$RbKelamin 		= $_POST['RbKelamin'];
$TxtAlamat 		= $_POST['TxtAlamat'];
$TxtPekerjaan	= $_POST['TxtPekerjaan'];

# Validasi Form
if (trim($TxtNama)=="") {
	include "pasienaddfm.php";
	echo '<div class="isi col-md-5 col-md-offset-7 alert alert-danger role=alert">
	Nama belum diisi, ulangi kembali
	</div></br>';
}
elseif (trim($TxtAlamat)=="") {
	include "pasienaddfm.php";
	echo '<div class="isi col-md-5 col-md-offset-7 alert alert-danger role=alert">
	Alamat masih kosong, ulangi kembali
	</div></br>';

}
elseif (trim($TxtPekerjaan)=="") {
	include "pasienaddfm.php";
	echo '<div class="isi col-md-5 col-md-offset-7 alert alert-danger role=alert">
	Pekerjaan masih kosong, ulangi kembali
	</div></br>';

}
else {
    $NOIP = $_SERVER['REMOTE_ADDR'];
	$sqldel = "DELETE FROM tmp_pasien WHERE noip='$NOIP'";
	mysql_query($sqldel, $koneksi);
	
	$sql  = " INSERT INTO tmp_pasien (nama,kelamin,alamat,pekerjaan,noip,tanggal) 
		 	  VALUES ('$TxtNama','$RbKelamin','$TxtAlamat','$TxtPekerjaan','$NOIP',NOW())";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error 2".mysql_error());
	
	$sqlhapus = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
	mysql_query($sqlhapus, $koneksi) 
			or die ("SQL Error 1".mysql_error());
	
	$sqlhapus2 = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
	mysql_query($sqlhapus2, $koneksi) 
			or die ("SQL Error 2".mysql_error());
			
	$sqlhapus3 = "DELETE FROM tmp_gejala WHERE noip='$NOIP'";
	mysql_query($sqlhapus3, $koneksi) 
			or die ("SQL Error 3".mysql_error());
	
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
}
?>
