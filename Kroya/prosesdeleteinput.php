<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: error.php');
    exit;
}

    if(isset($_POST['delete1'])){
        $hapus = "update hasilka_kroya set no_ka='--', nama_ka='--', tujuan ='--', jam_berangkat='--' where jalur = 1";
        $query = mysqli_query($conn, $hapus);
        if($query){
            ?>
            <script>
                alert('Data Jalur 1 Berhasil Dihapus');
                document.location='index.php';
            </script>
            <?php
        }
    }
    if(isset($_POST['delete2'])){
        $hapus = "update hasilka_kroya set no_ka='--', nama_ka='--', tujuan ='--', jam_berangkat='--' where jalur = 2 ";
        $query = mysqli_query($conn, $hapus);
        if($query){
            ?>
            <script>
                alert('Data Jalur 2 Berhasil Dihapus');
                document.location='index.php';
            </script>
            <?php
        }
    }
    if(isset($_POST['delete3'])){
        $hapus = "update hasilka_kroya set no_ka='--', nama_ka='--', tujuan ='--', jam_berangkat='--' where jalur = 3 ";
        $query = mysqli_query($conn, $hapus);
        if($query){
            ?>
            <script>
                alert('Data Jalur 3 Berhasil Dihapus');
                document.location='index.php';
            </script>
            <?php
        }
    }
    if(isset($_POST['delete4'])){
        $hapus = "update hasilka_kroya set no_ka='--', nama_ka='--', tujuan ='--', jam_berangkat='--' where jalur = 4 ";
        $query = mysqli_query($conn, $hapus);
        if($query){
            ?>
            <script>
                alert('Data Jalur 4 Berhasil Dihapus');
                document.location='index.php';
            </script>
            <?php
        }
    }
    if(isset($_POST['delete5'])){
        $hapus = "update hasilka_kroya set no_ka='--', nama_ka='--', tujuan ='--', jam_berangkat='--' where jalur = 5 ";
        $query = mysqli_query($conn, $hapus);
        if($query){
            ?>
            <script>
                alert('Data Jalur 5 Berhasil Dihapus');
                document.location='index.php';
            </script>
            <?php
        }
    }
    if(isset($_POST['delete6'])){
        $hapus = "update hasilka_kroya set no_ka='--', nama_ka='--', tujuan ='--', jam_berangkat='--' where jalur = 6 ";
        $query = mysqli_query($conn, $hapus);
        if($query){
            ?>
            <script>
                alert('Data Jalur 6 Berhasil Dihapus');
                document.location='index.php';
            </script>
            <?php
        }
    }
?>