<?php
session_start();
include_once "lib/inc.koneksidb.php";

// Membaca variabel dari Form
$TxtUser   = $_POST['TxtUser'];
$TxtPasswd = $_POST['TxtPasswd'];

// Validasi form
if (trim($TxtUser)=="") {
	echo "<div align=center><b> PERHATIAN! </b><br>";
	echo "*DATA USER BELUM DIISI</div>";
	include "index.php"; exit;
}
elseif (trim($TxtPasswd)=="") {
	echo "<div align=center><b> PERHATIAN! </b><br>";
	echo "*DATA PASSWORD BELUM DIISI</div>";
	include "index.php"; exit;
}

// Memeriksa keberadaan UserID dan PassID dari tabel pakar
// Menggunakan enkripsi MD5
$sql_cek = "SELECT * FROM pakar WHERE userID='$TxtUser' AND passID=MD5('$TxtPasswd')";
$qry_cek = mysql_query($sql_cek, $koneksi) or die ("Gagal Cek".mysql_error());
$ada_cek = mysql_num_rows($qry_cek);
if ($ada_cek >=1) {
	$_SESSION['SES_USER'] 	= $TxtUser; 
	
	header ("location:pakar/index.php");
	exit;
}
else {
	echo "USER DAN PASSWORD TIDAK SESUAI";
	include "index.php"; 
	exit;
}
?>
 
