<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

include "koneksi.php";
if(isset($_POST['kembali'])){
    header("location:../index.php");   
}

$id = $_GET["id"];
if(isset($_POST['ubah'])){
  $no = htmlspecialchars($_POST["nomor"]);
  $no_ka = htmlspecialchars($_POST["nomorka"]);
  $nama_ka = htmlspecialchars($_POST["nama_ka"]);
  $relasi = htmlspecialchars($_POST["relasi"]);
  $jadwal_berangkat = htmlspecialchars($_POST["jadwal_brgkt"]);
  $jadwal_datang = htmlspecialchars($_POST["jadwal_dtg"]);
  $jumlah = htmlspecialchars($_POST["jumlah"]);
  $kroya_datang = htmlspecialchars($_POST["pwtdtg"]);
  $kroya_berangkat = htmlspecialchars($_POST["pwtbrk"]);
  $stamformasi = htmlspecialchars($_POST["stamformasi"]);
  $keterangan = htmlspecialchars($_POST["keterangan"]);

$update = "UPDATE departure_kroya SET
           nomor = '$no',
           no_ka = '$no_ka',
           nama_ka = '$nama_ka',
           relasi = '$relasi',
           jadwal_berangkat = '$jadwal_berangkat',
           jadwal_datang = '$jadwal_datang',
           jumlah = '$jumlah',
           kroya_datang = '$kroya_datang',
           kroya_berangkat = '$kroya_berangkat',
           stamformasi = '$stamformasi',
           keterangan = '$keterangan'
           WHERE id = '$id'";

    $query = mysqli_query($koneksi, $update);
    if($query){
        ?>
        <script>
            alert("Data Berhasil di ubah");
            document.location = "../index.php";
        </script>
    <?php
    }
}

$row = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM departure_kroya WHERE id = '$id'"));
if($row['no_ka'] != ""){
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Jadwal</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT DATA KEBERANGKATAN
            </div>
            <div class="card-body">
              <form method="POST">
                
<!--               <div class="form-group">
                  <label>No</label>
                  <input value='<?php echo $row['nomor']; ?>' type="number" name="nomor" class="form-control">
                </div> -->

                <div class="form-group">
                  <label>No.Kereta</label>
                  <input value='<?php echo $row['no_ka']; ?>' type="text" name="nomorka" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Nama Kereta</label>
                  <input value='<?php echo $row['nama_ka']; ?>' type="text" name="nama_ka" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Tujuan</label>
                  <input value='<?php echo $row['relasi']; ?>' type="text" name="relasi" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Jadwal Berangkat</label>
                  <input value='<?php echo $row['jadwal_berangkat']; ?>' type="text" name="jadwal_brgkt" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Jadwal Datang</label>
                  <input value='<?php echo $row['jadwal_datang']; ?>' type="text" name="jadwal_dtg" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Jalur</label>
                  <input value='<?php echo $row['jumlah']; ?>' type="number" name="jumlah" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Kroya Datang</label>
                  <input value='<?php echo $row['kroya_datang']; ?>' type="text" name="pwtdtg" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Kroya Berangkat</label>
                  <input value='<?php echo $row['kroya_berangkat']; ?>' type="text" name="pwtbrk" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Stamformasi</label>
                  <input value='<?php echo $row['stamformasi']; ?>' type="text" name="stamformasi" class="form-control" style="text-transform: uppercase;">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <input value='<?php echo $row['keterangan']; ?>' type="text" name="keterangan" class="form-control" style="text-transform: uppercase;">
                </div>

                
                <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
                <button class="btn btn-primary" name="kembali">Kembali</button>


              </form>
              <?php
}?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>