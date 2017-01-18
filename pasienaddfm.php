<?php 
include "lib/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$TxtNama 		= isset($_POST['TxtNama']) ? $_POST['TxtNama'] : '';
$RbKelamin 		= isset($_POST['RbKelamin']) ? $_POST['RbKelamin'] : '';
$TxtAlamat 		= isset($_POST['TxtAlamat']) ? $_POST['TxtAlamat'] : '';
$TxtPekerjaan	= isset($_POST['TxtPekerjaan']) ? $_POST['TxtPekerjaan'] : '';
?>
<html>
<head>
<title>Form Masukan Data Pasien</title>
</head>
<body><br><br>
<div class="isi col-md-5 col-md-offset-7">
<form action="?page=daftarsim" method="post" name="form1" target="_self">
    
    <br>
    <h4>Masukan data anda untuk mulai konsultasi</h4>
    <br>
    <div class="form-group"> 
    <input class="form-control" placeholder="Masukkan Nama" name="TxtNama" type="text" value="<?php echo $TxtNama; ?>" size="35" maxlength="60">
    </div>


    <div class="form-group">
    <label class="radio-inline"><input type="radio" name="RbKelamin" value="L" checked>Laki-laki</label>
    <label class="radio-inline"><input type="radio" name="RbKelamin" value="P">Perempuan</label>
    </div>

    <div class="form-group">
    <textarea placeholder="Alamat" class="form-control" name="TxtAlamat" value="<?php echo $TxtAlamat;?>"></textarea>
    </div>
    
    <div class="form-group">
    <input placeholder="Pekerjaan" class="form-control" name="TxtPekerjaan" type="text" value="<?php echo $TxtPekerjaan; ?>">
    </div>

    <br>
    
    <div class="form-group">   
    <button type="submit" name="Submit" value="Lanjut" class="btn btn-success raised btn-sm">Lanjut</button>
    <button type="reset" name="Reset" value="Reset" class="btn btn-danger raised btn-sm">Reset</button>
    </div>
  
    <br>
  
</form>
</div>

</body>
</html>
