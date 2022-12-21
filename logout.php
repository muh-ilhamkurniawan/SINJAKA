<?php 
 
session_start();
session_destroy();
?>

<?php
// header("Location: index.php");
 
?>
				<script>
				alert('Berhasil Logout');
				document.location="./index.php";
				</script>