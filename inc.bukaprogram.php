<?php
$page = isset($_GET['page']) ? $_GET['page']: '';


if ($page=="dafpenyakit"){
	if(file_exists ("tampilpenyakit.php")){
		include "tampilpenyakit.php";
		}
		else{
			echo"File program penyakit tidak ada!";
			}
	}
	
elseif ($page=="dafgejala"){
	if(file_exists ("tampilgejala.php")){
		include "tampilgejala.php";
		}
		else{
			echo"File program gejala penyakit tidak ada!";
			}
	}
	
elseif ($page=="daftar"){
	if(file_exists ("pasienaddfm.php")){
		include "pasienaddfm.php";
		}
		else{
			echo"File program form pasien tidak ada!";
			}
	}

elseif ($page=="daftarsim"){
	if(file_exists ("pasienaddsim.php")){
		include "pasienaddsim.php";
		}
		else{
			echo"File program form simpan pasien tidak ada!";
			}
	}


elseif ($page=="konsul"){
	if(file_exists ("konsultasifm.php")){
		include "konsultasifm.php";
		}
		else{
			echo"File program form konsultasi tidak ada!";
			}
	}


elseif ($page=="konsulcek"){
	if(file_exists ("konsultasiperiksa.php")){
		include "konsultasiperiksa.php";
		}
		else{
			echo"File program konsultasi periksa tidak ada!";
			}
	}


elseif ($page=="hasil"){
	if(file_exists ("analisahasil.php")){
		include "analisahasil.php";
		}
		else{
			echo"File program analisa hasil tidak ada!";
			}
	}


elseif ($page=="bantuan"){
	if(file_exists ("bantuan.php")){
		include "bantuan.php";
		}
		else{
			echo"File program bantuan tidak ada!";
			}
	}else{
		echo "<center> 
		<img src='images/radang-usus.jpg'> <img src='images/logoidi.gif'> <br>
		<h2> Selamat Datang di Sistem Pakar Diagnosa Penyakit Pada Usus	</h2> <br>

		 </center>";
	}

?>
