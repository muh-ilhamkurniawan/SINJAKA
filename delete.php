<?php
include "koneksi.php";

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

$id = $_GET["id"];
if($id != ""){
    $hapus = "DELETE FROM user WHERE id = '$id'";
    $query = mysqli_query($conn, $hapus);
    if($query){?>
        <script>
            alert("Data Berhasil di Hapus");
            document.location.href = "listakun.php";
        </script>
    <?php
    }
}

?>