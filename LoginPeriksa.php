<?php
session_start();
include_once "lib/inc.koneksidb.php";

// Membaca variabel dari Form
$TxtUser   = isset($_POST['TxtUser']) ? $_POST['TxtUser']: '';
$TxtPasswd = isset($_POST['TxtPasswd']) ? $_POST['TxtPasswd']: '';

// Validasi form
if (trim($TxtUser)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Username kosong, ulangi kembali</b>
	</div></div>';
	include "index.php"; exit;
}
elseif (trim($TxtPasswd)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Password kosong, ulangi kembali</b>
	</div></div>';
	include "index.php"; exit;
}

// Memeriksa keberadaan UserID dan PassID dari tabel pakar
// Menggunakan enkripsi MD5
$sql_cek = "SELECT * FROM pakar WHERE userID='$TxtUser' AND passID=MD5('$TxtPasswd')";
$qry_cek = mysql_query($sql_cek, $koneksi) or die ("Gagal Cek".mysql_error());
$ada_cek = mysql_num_rows($qry_cek);
if ($ada_cek >=1) {
	$_SESSION['SES_USER'] 	= $TxtUser; 
	$_SESSION['SES_PASS'] 	= $TxtPasswd; 
	
	header ("location: pakar/index.php");
	exit;
}
else {
	echo '<div class="container"><div class=" alert alert-danger role=alert">
	<b>USERNAME DAN PASSWORD TIDAK SESUAI</b>
	</div></div>';

	include "index.php"; 
	exit;
}
?>
 
