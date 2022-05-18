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
    $enama          ="";
    $enisn          ="";
    $enik           ="";
    $etmplahir      ="";
    $etgllahir      ="";
    $ejalan         ="";
    $ert            ="";
    $erw            ="";
    $edusun         ="";
    $edesa          ="";
    $ecamat         ="";
    $ekpos          ="";
    $ehp            ="";
    $etelp          ="";
    $eemail         ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nama"])) {
            $enama = "Nama Tidak Boleh Kosong";
        }
        else {
            $nama = cek_input($_POST["nama"]);
        }
        if (empty($_POST["nisn"])) {
            $enisn = "NISN Tidak Boleh Kosong";
        }
        else {
            $nisn = cek_input($_POST["nisn"]);
        }
        if (empty($_POST["nik"])) {
            $enik = "NIK Siswa Tidak Boleh Kosong";
        } else {
            $nik = cek_input($_POST["nik"]);
        }
        if (empty($_POST["tl"])) {
            $etmplahir = "Tempat Lahir Siswa Tidak Boleh Kosong";
        } else {
            $tmplahir = cek_input($_POST["tl"]);
        }
        if (empty($_POST["lahir"])) {
            $etgllahir = "Tanggal Lahir Siswa Tidak Boleh Kosong";
        } else {
            $tgllahir = cek_input($_POST["lahir"]);
        }
        if (empty($_POST["alamat"])) {
            $ejalan = "Alamat jalan siswa  Tidak Boleh Kosong";
        } else {
            $jalan = cek_input($_POST["alamat"]);
        }
        if (empty($_POST["rt"])) {
            $ert = "Alamat RT Siswa Tidak Boleh Kosong";
        } else {
            $rt = cek_input($_POST["rt"]);
        }
        if (empty($_POST["rw"])) {
            $erw = "Alamat RW Siswa Tidak Boleh Kosong";
        } else {
            $rw = cek_input($_POST["rw"]);
        }
        if (empty($_POST["dusun"])) {
            $edusun = "Alamat dusun Siswa Tidak Boleh Kosong";
        } else {
            $dusun = cek_input($_POST["dusun"]);
        }
        if (empty($_POST["kelurahan"])) {
            $edesa = "Alamat Desa Siswa Tidak Boleh Kosong";
        } else {    
            $desa = cek_input($_POST["kelurahan"]);
        }
        if (empty($_POST["kecamatan"])) {
            $ecamat = "Alamat Kecamatan Siswa Tidak Boleh Kosong";
        } else {
            $camat = cek_input($_POST["kecamatan"]);
        }
        if (empty($_POST["pos"])) {
            $ekpos = "Alamat Kode Pos Siswa Tidak Boleh Kosong";
        } else {
            $kpos = cek_input($_POST["pos"]);
        }
        if (empty($_POST["hp"])) {
            $ehp = "Nomor HP Siswa Tidak Boleh Kosong";
        } else {
            $hp = cek_input($_POST["hp"]);
        }
        if (empty($_POST["telp"])) {
            $etelp = "Alamat Telpon Siswa Tidak Boleh Kosong";
        } else {
            $telp = cek_input($_POST["telp"]);
        }
        if (empty($_POST["email"])) {
            $eemail = "Alamat E-Mail Siswa Tidak Boleh Kosong";
        } else {
            $email = cek_input($_POST["nik"]);
        }

        $jkelamin   = cek_input($_POST["jkelamin"]);
        $agama      = cek_input($_POST["agama"]);
        $bkhusus    = cek_input($_POST["bkhusus"]);
        $tmptinggal = cek_input($_POST["tinggal"]);
        $transportasi     = cek_input($_POST["transport"]);
        $kip        = cek_input($_POST["nokps"]);
        
        //Jika semua variabel error bernilai kosong, maka query insert akan di jalankan
        if (empty($enama)) {
            if (empty($enisn)) {
              if (empty($enik)) {
                   if (empty($etmplahir)) {
                      if (empty($etgllahir)) {
                           if (empty($ejalan)) {
                              if (empty($ert)) {
                                  if (empty($erw)) {
                                      if (empty($edusun)) {
                                           if (empty($edesa)) {
                                              if (empty($ecamat)) {
                                                   if (empty($ekpos)) {
                                                       if (empty($ehp)) {
                                                           if (empty($etelp)) {
                                                              if (empty($eemail)) {
//query insert ke dalam tabel regist
 $sql = "INSERT INTO datapribadi(nama,jkelamin,nisn,nik,tmplahir,tglahir,agama,bkhusus,njalan,rt,rw,ndusun,ndesa,kecamatan,kpos,tmptinggal,trans,hp,telp,email,kip) VALUES ('$nama','$jkelamin','$nisn','$tmplahir','$tgllahir','$jalan','$rt','$rw','$dusun','$desa','$kecamatan','$pos','$tmptinggal','$transportasi','$hp','$telp','$email','$kip')";

                                                                    $query = mysqli_query($conn,$sql);
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
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
  <center><h2 class="alert alert-dark text-right p-3 mt-4">DATA PRIBADI</h2></center>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm-6">
							<input type="text" name="nama" id="nama" class="form-control  <?php echo($enama !="" ? "is-invalid" : ""); ?>"  placeholder="Nama Lengkap" value="">
              <span class="warning-danger"><?php echo $enama; ?></span>
            </div>
					</div>
  
          <div class="form-group row">
						<label for="jkelamin" class="col-sm-3 mt-2 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-6 mt-3">
							<input type="radio" name="jkelamin" id="jkelamin" value="Laki-Laki">Laki-Laki
							<input type="radio" name="jkelamin" id="jkelamin" value="Perempuan">Perempuan
						</div>
					</div>

          <div class="form-group row">
						<label for="nisn" class="col-sm-3 mt-2 col-form-label">NISN</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="nisn" class="form-control <?php echo($enisn !="" ? "is-invalid" : ""); ?>" id="nisn" placeholder="NISN" value="">
              <span class="warning"><?php echo $enisn; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="nik" class="col-sm-3 mt-2 col-form-label">NIK</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="nik" class="form-control <?php echo($enik !="" ? "is-invalid" : ""); ?>" id="nik" placeholder="NIK" value="">
              <span class="warning"><?php echo $enik; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="tl" class="col-sm-3 mt-2 col-form-label">Tempat Lahir</label>
						<div class="col-sm-3 mt-3">
							<input type="text" name="tl" class="form-control <?php echo($etmplahir !="" ? "is-invalid" : ""); ?>" id="tl" placeholder="Tempat Lahir" value="">
              <span class="warning"><?php echo $etmplahir; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="lahir" class="col-sm-3 mt-2 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-3 mt-3">
            <input type="date" name="tlahir" id="lahir" placeholder="dd-mm-yyyy" value="" class="form-control <?php echo($etgllahir !="" ? "is-invalid" : ""); ?>">
            <span class="warning"><?php echo $etgllahir; ?></span>	
          </div>
					</div>

          <div class="form-group row">
            <label for="agama" class="col-sm-3 mt-2 col-form-label">Agama</label>
            <div class="col-sm-6 mt-3">
            <select name="agama" id="agama" class="form-select">
                    <option> </option>
                    <option>Islam</option>
                    <option>Kristen/Protestan</option>
                    <option>Katholik</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                    <option>Kong Hu Chu</option>
                    <option>Lainnya</option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="bkhusus" class="col-sm-3 mt-2 col-form-label">Berkebutuhan Khusus</label>
            <div class="col-sm-6 mt-3">
            <select name="bkhusus" id="bkhusus" class="form-select">
                    <option> </option>
                    <option> Tidak </option>
                    <option> Netra </option>
                    <option> Rumgu</option>
                    <option>Grahita Ringan</option>
                    <option>Grahita Sedang</option>
                    <option>Daksa Ringan</option>
                    <option>Daksa Sedang</option>
                    <option>Laras</option>
                    <option>Wicara </option>
                    <option>Tuna Ganda </option>
                    <option>Hiper Aktif </option>2
                    <option>Cerdas Istimewa</option>
                    <option>Bakat Istimewa</option>
                    <option>Kesulitan Belajar </option>
                    <option>Narkoba </option>
                    <option>Indigo </option>
                    <option>Down Sindrom</option>
                    <option>Autis </option>
                </select>
            </div>
          </div>

          <div class="form-group row">
						<label for="alamat" class="col-sm-3 mt-2 col-form-label">Alamat Jalan</label>
						<div class="col-sm-6 mt-3">
						<textarea class="form-control <?php echo($ejalan !="" ? "is-invalid" : ""); ?>" placeholder="Alamat" id="alamat"></textarea>
            <span class="warning"><?php echo $ejalan; ?></span>
          </div>
					</div>

          <div class="form-group row">
						<label for="rt" class="col-sm-3 mt-2 col-form-label">RT</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="rt" class="form-control <?php echo($ert !="" ? "is-invalid" : ""); ?>" id="rt" placeholder="rt" value="">
              <span class="warning"><?php echo $ert; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="rw" class="col-sm-3 mt-2 col-form-label">RW</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="rw" class="form-control <?php echo($erw !="" ? "is-invalid" : ""); ?>" id="rw" placeholder="rw" value="">
              <span class="warning"><?php echo $erw; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="dusun" class="col-sm-3 mt-2 col-form-label">Nama Dusun</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="dusun" class="form-control <?php echo($edusun !="" ? "is-invalid" : ""); ?>" id="dusun" placeholder="Nama Dusun" value="">
              <span class="warning"><?php echo $edusun; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="kelurahan" class="col-sm-3 mt-2 col-form-label">Nama Kelurahan/Desa</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="kelurahan" class="form-control  <?php echo($edesa !="" ? "is-invalid" : ""); ?>" id="kelurahan" placeholder="Nama Kelurahan/Desa" value="">
              <span class="warning"><?php echo $edesa; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="kecamatan" class="col-sm-3 mt-2 col-form-label">Kecamatan</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="kecamatan" class="form-control <?php echo($ecamat !="" ? "is-invalid" : ""); ?>" id="kecamatan" placeholder="Nama Kecamatan" value="">
              <span class="warning"><?php echo $ecamat; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="pos" class="col-sm-3 mt-2 col-form-label">Kode Pos</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="pos" class="form-control  <?php echo($ekpos !="" ? "is-invalid" : ""); ?>" id="pos" placeholder="Kode Pos" value="">
              <span class="warning"><?php echo $ekpos; ?></span>
            </div>
					</div>

          <div class="form-group row">
            <label for="tinggal" class="col-sm-3 mt-2 col-form-label">Tempat Tinggal</label>
            <div class="col-sm-6 mt-3">
            <select name="tinggal" id="tinggal" class="form-select">
                    <option> </option>
                    <option>Bersama Orang Tua</option>
                    <option>Wali</option>
                    <option>Kos</option>
                    <option>Asrama</option>
                    <option>Panti Asuhan</option>
                    <option>Lainnya</option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="transport" class="col-sm-3 mt-2 col-form-label">Moda Transportasi</label>
            <div class="col-sm-6 mt-3">
            <select name="transport" id="transport" class="form-select">
                    <option> </option>
                    <option>Jalan Kaki</option>
                    <option>Kendaraan Pribadi</option>
                    <option>Kendaraan Umum/Angkot/Pete-Pete</option>
                    <option> Jemputan Sekolah</option>
                    <option>Kereta Api</option>
                    <option>Ojek</option>
                    <option>Andong/Delman/Becak</option>
                    <option>Perahu Penyebrangan/Getek/Rakit</option>
                    <option>Lainnya</option>
                </select>
            </div>
          </div>

          <div class="form-group row">
						<label for="hp" class="col-sm-3 mt-2 col-form-label">Nomor HP</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="hp" class="form-control <?php echo($ehp !="" ? "is-invalid" : ""); ?>" id="hp" placeholder="nomor hp" value="">
              <span class="warning"><?php echo $ehp; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="telp" class="col-sm-3 mt-2 col-form-label">Nomor Telepon</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="telp" class="form-control <?php echo($etelp !="" ? "is-invalid" : ""); ?>" id="telp" placeholder="nomor telepon" value="">
              <span class="warning"><?php echo $etelp; ?></span>
            </div>
					</div>

          <div class="form-group row">
						<label for="email" class="col-sm-3 mt-2 col-form-label">E-mail Pribadi </label>
						<div class="col-sm-6 mt-3">
						<input type="email" class="form-control <?php echo($eemail !="" ? "is-invalid" : ""); ?>" id="email" placeholder="name@example.com" value="">
						</div>
					</div>

          <div class="form-group row">
						<label for="pkps" class="col-sm-3 mt-2 col-form-label">Penerima KPS/PKH/KIP</label>
						<div class="col-sm-6 mt-3">
							<input type="radio" name="pkps" value="YA">YA
							<input type="radio" name="pkps" value="TIDAK">TIDAK
						</div>
					</div>

          <div class="form-group row">
						<label for="nokps" class="col-sm-3 mt-2 col-form-label">No. KPS/KKS/PKH/KIP</label>
						<div class="col-sm-6 mt-3">
							<input type="text" name="nokps" class="form-control" id="nokps" placeholder="Nomor KPS/KKS/PKH/KIP" value="">
              <small class="fst-italic">*Apabila Menerima </small>
						</div>
					</div>

          <div class="form-group row">
						<label for="warganegara" class="col-sm-3 mt-2 col-form-label">Kewarganegaraan</label>
						<div class="col-sm-6 mt-3">
							<input type="radio" name="warganegara" value="Indonesia(WNI)">Indonesia(WNI)
							<input type="radio" name="warganegara" value="Asing(WNA)">Asing(WNA)
              <input type="text" name="asing" class="form-control" id="asing" placeholder="Nama Negara" value="">
              <small class="fst-italic">*Apabila WNA </small>
						</div>
					</div>

          <div class="form-group mt-3 pb-5">
                <a href="registrasi.php" role="button" class="btn btn-secondary">Previous</a>
                <a href="ayah kandung.php" role="button" class="btn btn-primary">Next</a>
            </div>

  </div>
    
</body>
</html>
