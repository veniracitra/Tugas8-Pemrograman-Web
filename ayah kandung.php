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
    $enayah     ="";
    $ethlayah   ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nmayah"])) {
            $enayah = "Nama Ayah Tidak Boleh Kosong";
        }
        else {
            $nayah = cek_input($_POST["nmayah"]);
        }
        if (empty($_POST["thlahir"])) {
            $ethlayah = "Tahun Lahir Ayah Tidak Boleh Kosong";
        }
        else {
            $thlayah = cek_input($_POST["thlahir"]);
        }
      

        $pdayah = cek_input($_POST["pdayah"]);
        $phayah = cek_input($_POST["gjayah"]);
        $bkhayah = cek_input($_POST["bkhususa"]);

        //Jika semua variabel error bernilai kosong, maka query insert akan di jalankan
        if (empty($enayah)) {
            if (empty($ethlayah)) {
                
                        //query insert ke dalam tabel regist
                        $sql = "INSERT INTO dataayah(nama_ayah,thlahir_ayah,pd_ayah,ph_ayah,bkh_ayah) VALUES ('$nmayah','$thlahir','$pdayah','$gjayah','$bkhususa')";

                        $query = mysqli_query($conn,$sql);
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
  <center><h2 class="alert alert-dark text-right p-3 mt-4"> DATA AYAH KANDUNG</h2></center>
    <div class="form-group row">
        <label for="nmayah" class="col-sm-3 mt-2 col-form-label">Nama Ayah Kandung </label>
        <div class="col-sm-6 mt-3">
         <input type="text" name="nmayah" class="form-control" id="nmayah" placeholder="Nama Ayah Kandung" value="">
    </div>
    </div>

    <div class="form-group row">
		<label for="thlahir" class="col-sm-3 mt-2 col-form-label">Tahun Lahir</label>
			<div class="col-sm-3 mt-3">
                <input type="month" name="thlahir" id="thlahir" placeholder="mm-yyyy" value="">
			</div>
		</div>

        <div class="form-group row">
            <label for="pdayah" class="col-sm-3 mt-2 col-form-label">Pendidikan</label>
            <div class="col-sm-6 mt-3">
            <select name="pdayah" id="pdayah" class="form-select">
                    <option> </option>
                    <option>Tidak Sekolah</option>
                    <option>Putus SD</option>
                    <option>SD Sederajat</option>
                    <option>SMP Sederajat</option>
                    <option>SMA Sederajat</option>
                    <option>D1</option>
                    <option>D2</option>
                    <option>D3</option>
                    <option>D4/S1</option>
                    <option>S2</option>
                    <option>S3</option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="gjayah" class="col-sm-3 mt-2 col-form-label">Penghasilan Bulanan</label>
            <div class="col-sm-6 mt-3">
            <select name="gjayah" id="gjayah" class="form-select">
                    <option> </option>
                    <option> Kurang dari 500.000 </option>
                    <option>500.000-999.999</option>
                    <option>1 juta - 1.999.999</option>
                    <option>2 juta - 4.999.999</option>
                    <option>5 juta - 20 juta</option>
                    <option>Lebih dari 20 juta</option>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="bkhususa" class="col-sm-3 mt-2 col-form-label">Berkebutuhan Khusus</label>
            <div class="col-sm-6 mt-3">
            <select name="bkhususa" id="bkhususa" class="form-select">
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
          
          <div class="form-group mt-3 pb-5">
                <a href="data pribadi.php" role="button" class="btn btn-secondary">Previous</a>
                <a href="ibu kandung.php" role="button" class="btn btn-primary">Next</a>
            </div>


  </div>
    
</body>
</html>
