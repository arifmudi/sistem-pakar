<?php
include_once "../lib/inc.koneksidb.php";


# Baca variabel Form (If Register Global ON)
$TxtUserBaru = isset($_POST['TxtUserBaru']) ? $_POST['TxtUserBaru'] : '';
$TxtPassBaru = isset($_POST['TxtPassBaru']) ? $_POST['TxtPassBaru'] : '';
$TxtPassBaru2 = isset($_POST['TxtPassBaru2']) ? $_POST['TxtPassBaru2'] : '';
$_SESSION['SES_USER'] = isset($_SESSION['SES_USER']) ? $_SESSION['SES_USER'] : '';


if (trim($TxtUserBaru)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Username Baru kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php"; exit;
}

elseif (trim($TxtPassBaru)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Password Baru kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php"; exit;
}

elseif (trim($TxtPassBaru2)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Konfirmasi Password Baru kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php"; exit;
}

elseif (trim($TxtPassBaru2)!=trim($TxtPassBaru)) {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Kedua Password baru harus sama, ulangi kembali</b>
	</div></div>';
	include "editAkun.php"; exit;
}



else{



$enkrip_pass = md5($TxtPassBaru);
$sql = "UPDATE pakar SET userID = '$TxtUserBaru', passID = '$enkrip_pass' WHERE id > 0";
$qry = mysql_query($sql,$koneksi) or die ("Gagal Cek</br>".mysql_error());

//ganti session
$_SESSION['SES_USER'] = $TxtUserBaru;
//
echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>AKUN ANDA BERHASIL DIUBAH</b>
	</div></div>';
	include "index.php";
	}





?>