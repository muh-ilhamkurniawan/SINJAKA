<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: index.php');
    exit;
}

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

include "koneksi.php";

$id = $_GET["id"];
if($id != ""){
    $hapus = "DELETE FROM departure_purwokerto WHERE id = '$id'";
    $query = mysqli_query($koneksi, $hapus);
    if($query){?>
        <script>
            alert("Data Berhasil di Hapus");
            document.location.href = "../index.php";
        </script>
    <?php
    }
}

?>