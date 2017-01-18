<?php 
include "../lib/inc.koneksidb.php";

// Membaca variabel dari URL (alamat browser)
$kdhapus 	= isset($_GET['kdhapus']) ? $_GET['kdhapus'] : '';	

if (isset($_GET['kdhapus'])) {	
	$sql = "DELETE FROM penyakit WHERE kd_penyakit='$kdhapus'";
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
	
	$sql2 = "DELETE FROM relasi WHERE kd_penyakit='$kdhapus'";
	mysql_query($sql2, $koneksi);
	
	echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>DATA PENYAKIT BERHASIL DIHAPUS</b>
	</div></div>';
	include "PenyakitTampil.php";
	
}
else {
	
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>DATA PENYAKIT BELUM DIPILIH</b>
	</div></div>';
	include "PenyakitTampil.php";
	
}
?>
