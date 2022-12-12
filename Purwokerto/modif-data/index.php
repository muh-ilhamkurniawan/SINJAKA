<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

include "koneksi.php";

if(isset($_POST['hapussemua'])){
    $hapus = "DELETE FROM departure_purwokerto";
    $query = mysqli_query($koneksi, $hapus);
    if($query){
        ?>
        <script>
            alert("Semua Data Berhasil di Hapus");
            document.location.href = "index.php";
        </script>
        <?php
    }
}

if(isset($_GET["cari"])){
    $daftardata = $_GET["cari"];
    $search = "SELECT * FROM departure_purwokerto 
           WHERE  no_ka LIKE '%".$daftardata."%' OR
                  nama_ka LIKE '%".$daftardata."%' OR 
                  relasi LIKE '%$".$daftardata."%'";				
        }else{
            $search = "SELECT * FROM departure_purwokerto ORDER BY purwokerto_berangkat";		
        }
?>
<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data Keberangkatan Stasiun Purwokerto</title>
            <!-- import bootstrap  -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        </head>
        
        <body>
            <br>
            <!-- membuat container dengan lebar colomn col-lg-10  -->
            <div class="container col-lg-12">
                <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
                <h3 class="alert alert-success text-center" role="alert">
                    Database departure_purwokerto KAI DAOP 5
                </h3>
                <br>
                <form action="index.php" method="get">
                    <input type="text" name="cari" id="search" for="search"  size="30" autofocus>
                    <button type="submit" name="caridata" autocomplete="off" id="search"> Search</button>
                </form>
        
                <!-- membuat card untuk membungkus tabel bootstrap  -->
                <div class="row">
                    <div class="col-lg-2">
                        <div class="card">
                            <div class="card-body">
                                <!-- membuat form input file -->
                                <form method="post" enctype="multipart/form-data" action="excel.php">
                                    Pilih File:
                                    <input class="form-control" name="fileexcel" type="file" required="required">
                                    <br>
                                    <button class="btn btn-sm btn-info" type="submit" name='simpan'>Submit</button>
                                </form>
                            </div>
                        </div>
                        <form action="" method="post">
                        <a href="tambah.php">
                            <button href="tambah.php" type="button" class="btn btn-primary btn-block" name="tambah">Tambah Data</button>
                        </a>
                        <a>
                            <input type="submit" name="hapussemua" value="Hapus Semua" class="btn btn-danger btn-block">
                        </a>
                        </form>
                            </div>
                    <div class="col-lg-10">
                        <table class="table">
                            <thead class="thead-dark">
                                <!-- set table header  -->
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">No. Kereta</th>
                                    <th scope="col">Nama Kereta</th>
                                    <th scope="col">Relasi</th>
                                    <th scope="col">Purwokerto Datang</th>
                                    <th scope="col">Purwokerto Berangkat</th>
                                    <th scope="col">Stamformasi</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        // membuat koneksi ke database 
                                        $koneksi = mysqli_connect("localhost", "root", "", "kai_db");
            
                                        //membuat variabel angka
                                        $no = 1;
            
                                        //mengambil data dari tabel barang
                                        $select         = mysqli_query($koneksi, "SELECT * FROM departure_purwokerto ORDER BY purwokerto_berangkat LIMIT 5");
            
                                        $searchdata = mysqli_query($koneksi, $search);
                                        //melooping(perulangan) dengan menggunakan while
                                        $no = 1;
                                        while($data= mysqli_fetch_array($searchdata)){
                                    ?>
                                <tr>
        
                                    <!-- menampilkan data dengan menggunakan array  -->
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $data['no_ka']; ?></td>
                                    <td><?php echo $data['nama_ka']; ?></td>
                                    <td><?php echo $data['relasi']; ?></td>
                                    <td><?php echo $data['purwokerto_datang']; ?></td>
                                    <td><?php echo $data['purwokerto_berangkat']; ?></td>
                                    <td><?php echo $data['stamformasi']; ?></td>
                                    <td><?php echo $data['keterangan']; ?></td>
                                    <td>
                                    <a href="delete.php?id=<?php echo $data["id"];?>" class="btn btn-danger" href="#">
                                    <img src="image/trash.svg" alt="">
                                    </a>
                                    
                                    <a href="update.php?id=<?php echo $data['id']?>" class="btn btn-success"> 
                                    <img src="image/pencil-square.svg" alt="">
                                    </a>
                                    
                                    
        
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>
        
        </html>
        