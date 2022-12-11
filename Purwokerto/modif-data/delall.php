<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

include "koneksi.php";

if(isset($_POST["hapussemua"])){
    $dellall = "DELETE * FROM departure";
    $query = mysqli_query($koneksi, $dellall);
    if($query){?>
        <script>
            alert("Data Berhasil di Hapus semua");
            document.location.href = "index.php";
        </script>
    <?php
    }
}
?>