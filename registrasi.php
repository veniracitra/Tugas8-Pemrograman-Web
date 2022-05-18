<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Peserta Didik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
</head>
<body>
<?php

include("koneksi.php");
$error_TglMasuk = "";
$error_NIS = "";
$error_Noujian = "";
$error_skhun = "";
$error_ijazah = "";

$jPendaftaran   = "";
$tglMasuk       = "";
$NIS            = "";
$NPU            = "";
$paud           = "";
$tk             = "";
$skhun          = "";
$ijazah         = "";
$hobi           = "";
$cita           = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["tglMasuk"])) {
    $error_TglMasuk = "Tanggal Masuk Sekolah Tidak Boleh Kosong";
}
else {
    $tglMasuk = cek_input($_POST["msekolah"]);
}
  
  if (empty($_POST["nis"])) {
      $error_NIS = "NIS Tidak Boleh Kosong";
  }
  else {
      $nis = cek_input($_POST["nis"]);
      if (!is_numeric($NIS)) {
          $error_NIS = "Nomor Induk Siswa Hanya Diisi Dengan Angka";
      }
  }
  if (empty($_POST["npu"])) {
      $error_Noujian = "Nomor Peserta Ujian Tidak Boleh Kosong";
  }
  else {
      $npu = cek_input($_POST["npu"]);
      if (!is_numeric($NPU)) {
          $error_Noujian = "Nomor Peserta Ujian Hanya Diisi Dengan Angka";
      }
  }
  if (empty($_POST["skhun"])) {
      $error_skhun = "Nomor Seri SKHUN Tidak Boleh Kosong";
  }
  else {
      $skhun = cek_input($_POST["skhun"]);
  }
  if (empty($_POST["ijazah"])) {
      $error_ijazah = "Nomor Seri Ijazah Tidak Boleh Kosong";
  }
  else {
      $ijazah = cek_input($_POST["ijazah"]);
  }
  $jPendaftaran     = cek_input($_POST["jenis_pendaftaran"]);
  $paud             = cek_input($_POST["paud"]);
  $tk               = cek_input($_POST["tk"]);
  $hobi             = cek_input($_POST["hobi"]);
  $cita             = cek_input($_POST["cita"]);

   //Jika semua variabel error bernilai kosong, maka query insert akan di jalankan
    if (empty( $error_TglMasuk)) {
        if (empty($error_NIS)) {
            if (empty($error_skhun)) {
                if (empty($error_ijazah)) {
                    //query insert
                    $sql = "INSERT INTO registrasi(jPendaftaran,tglMasuk,nis,npu,paud,tk,skhun,ijazah,hobi,cita) VALUES ('$jenis_pendaftaran','$msekolah','$nis','$npu','$paud','$tk','$skhun','$ijazah','$hobi','$cita')";
                    $query = mysqli_query($conn,$sql);
                }
            }
        }
    }
}
function cek_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
  <div class="container">
  <center><h1  class="text-bg-dark p-3 mt-4">FORMULIR PESERTA DIDIK</h1></center>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="row align-items-center">
            <div class="col">
                <p>Tanggal : <input type="date" name="tglMasuk" id="tglMasuk" placeholder="dd-mm-yyyy" value=""></p>
            </div>
            <div class="col">
                F-PD
            </div>
        </div>
    
      <center><h2 class="alert alert-dark text-right">REGISTRASI PESERTA DIDIK</h2></center>

      <div class="form-group row">
						<label for="" class="col-sm-3 col-form-label">Jenis Pendaftaran</label>
						<div class="col-sm-6">
							<input type="radio" name="jenis_pendaftaran" id = "jenis_pendaftaran" value="Siswa Baru">Siswa Baru
							<input type="radio" name="jenis_pendaftaran" id = "jenis_pendaftaran" value="Pindahan">Pindahan
						</div>
					</div>
    
    <div class="form-group row">
						<label for="msekolah" class="col-sm-3 mt-2 col-form-label">Tanggal Masuk Sekolah</label>
						<div class="col-sm-6">
            <input type="date" name="msekolah" id="msekolah" placeholder="dd-mm-yyyy" value="" class="form-control <?php echo($error_TglMasuk !="" ? "is-invalid" : ""); ?>">
            <span class="warning-danger"><?php echo $error_TglMasuk; ?></span>	
          </div>
					</div>
    
        <div class="form-group row">
						<label for="nis" class="col-sm-3 mt-2 col-form-label">NIS</label>
						<div class="col-sm-6">
							<input type="text" name="nis" id="nis" class="form-control <?php echo($error_NIS !="" ? "is-invalid" : ""); ?>" id="nis" placeholder="nis" value="">
              <span class="warning-danger"><?php echo $error_NIS; ?></span>
            </div>
					</div>
           
          <div class="form-group row">
						<label for="npu" class="col-sm-3 mt-2 col-form-label">Nomor Peserta Ujian</label>
						<div class="col-sm-6">
							<input type="text" name="npu" id="npu" class="form-control <?php echo($error_Noujian !="" ? "is-invalid" : ""); ?>" id="npu" placeholder="nomor peserta ujian" value="">
              <span class="warning-danger"><?php echo $error_Noujian; ?></span>
              <small class="fst-italic">*Nomor peserta ujian adalah 20 digit yang tertera dalam sertifikat <small class="text-danger">SKHUN SD</small>, diisi bagi peserta didik jenjang SMP</small>
						</div>
					</div>

          <div class="form-group row">
						<label for="paud" class="col-sm-3 mt-2 col-form-label">Apakah Pernah PAUD</label>
						<div class="col-sm-6 mt-2">
							<input type="radio" name="paud" id = "paud" value="YA">YA
							<input type="radio" name="paud" id = "paud" value="TIDAK">TIDAK
						</div>
					</div>

          <div class="form-group row">
						<label for="tk" class="col-sm-3 mt-2 col-form-label">Apakah Pernah TK</label>
						<div class="col-sm-6 mt-2">
							<input type="radio" name="tk" value="YA">YA
							<input type="radio" name="tk" value="TIDAK">TIDAK
						</div>
					</div>

          <div class="form-group row">
						<label for="skhun" class="col-sm-3 mt-2 col-form-label">No. Seri SKHUN Sebelumnya</label>
						<div class="col-sm-6">
							<input type="text" name="skhun" id="skhun" class="form-control <?php echo($error_skhun !="" ? "is-invalid" : ""); ?>" id="skhun" placeholder="nomor seri SKHUN" value="">
              <span class="warning-danger"><?php echo $error_skhun; ?></span>
              <small class="fst-italic">*Diisi 16 Digit yang Tertera di <small class="text-danger">SKHUN SD</small>, diisi bagi PD Jenjang SMP</small>
						</div>
					</div>

          <div class="form-group row">
						<label for="ijazah" class="col-sm-3 mt-2 col-form-label">No. Seri Ijazah Sebelumnya</label>
						<div class="col-sm-6">
							<input type="text" name="ijazah" id="ijazah" class="form-control <?php echo($error_ijazah !="" ? "is-invalid" : ""); ?>" id="ijazah" placeholder="nomor seri Ijazah" value="">
              <?php echo $error_ijazah; ?></span>
              <small class="fst-italic">*Diisi 16 Digit yang Tertera di <small class="text-danger">Ijazah SD</small>, diisi bagi PD Jenjang SMP</small>
						</div>
					</div>

          <div class="form-group row">
            <label for="hobi" class="col-sm-3 mt-2 col-form-label">Hobi</label>
            <div class="col-sm-6">
            <select name="hobi" id="hobi" class="form-select">
                    <option>Olah Raga</option>
                    <option>Kesenian</option>
                    <option>Membaca</option>
                    <option>Menulis</option>
                    <option>Travelling</option>
                    <option>Lainnya</option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="cita" class="col-sm-3 mt-2 col-form-label">Cita-Cita</label>
            <div class="col-sm-6">
            <select name="cita" id="cita" class="form-select">
                    <option>PNS</option>
                    <option>TNI/POLRI</option>
                    <option>Guru/Dosen</option>
                    <option>Dokter</option>
                    <option>Politikus</option>
                    <option>Wiraswasta</option>
                    <option>Seni/Lukis/Artis/Sejenis</option>
                    <option>Lainnya</option>
                </select>
            </div>
          </div>
          <div class="form-group mt-3">
                <a href="data pribadi.php" role="button" class="btn btn-primary">Next</a>
            </div>
  </div>
    
</body>
</html>
