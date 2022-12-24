<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: index.php');
    exit;
}

ini_set("display_errors",0);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
error_reporting(0);
include "koneksi.php";

session_start();

$nama_hasil = $_SESSION["nama"];
$activity = mysqli_fetch_array(mysqli_query($conn,"SELECT nama_user FROM activity_log WHERE nama_user='$nama';"));
$activity_no = mysqli_fetch_array(mysqli_query($conn,"SELECT no FROM activity_log ORDER BY no DESC LIMIT 1;"));

if ($_SESSION["peran"]=="Admin") {
	$user = mysqli_fetch_array(mysqli_query($conn,"SELECT nama FROM user WHERE peran='Admin';"));
	$no = $activity_no['no'];
	$nama_activity = $activity['nama_user'];
	$nama_user =  $user['nama'];
	// if($nama_activity == $nama){
	// 	$query = "UPDATE activity_log SET waktu_logout = now() WHERE nama_user = '$nama_hasil'";
	// }else{
	// 	$query = "INSERT INTO activity_log VALUES ('','$no'+1,'$nama_user','',now())";	
	// }
	$query = "UPDATE activity_log SET waktu_logout = now() WHERE no = '$no'";
	$result = $conn->query($query);

} elseif ($_SESSION["peran"]=="OP Purwokerto") {
	$user = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE peran='OP Purwokerto';"));
	$no = $activity_no['no'];
	$nama_activity = $activity['nama_user'];
	$nama_user =  $user['nama'];
	// if($nama_activity == $nama){
	// 	$query = "UPDATE activity_log SET waktu_logout = now() WHERE nama_user = '$nama_hasil'";
	// }else{
	// 	$query = "INSERT INTO activity_log VALUES ('','$no'+1,'$nama_user','',now())";	
	// }
	$query = "UPDATE activity_log SET waktu_logout = now() WHERE no = '$no'";	
	$result = $conn->query($query);

} elseif ($_SESSION["peran"]=="OP Kutoarjo") {
	$user = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE peran='OP Kutoarjo';"));
	$no = $activity_no['no'];
	$nama_activity = $activity['nama_user'];
	$nama_user =  $user['nama'];
	// if($nama_activity == $nama){
	// 	$query = "UPDATE activity_log SET waktu_logout = now() WHERE nama_user = '$nama_hasil'";
	// }else{
	// 	$query = "INSERT INTO activity_log VALUES ('','$no'+1,'$nama_user','',now())";	
	// }
	$query = "UPDATE activity_log SET waktu_logout = now() WHERE no = '$no'";
	$result = $conn->query($query);

} elseif ($_SESSION["peran"]=="OP Kroya") {
	$user = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE peran='OP Kroya';"));
	$no = $activity_no['no'];
	$nama_activity = $activity['nama_user'];
	$nama_user =  $user['nama'];
	// if($nama_activity == $nama){
	// 	$query = "UPDATE activity_log SET waktu_logout = now() WHERE nama_user = '$nama_hasil'";
	// }else{
	// 	$query = "INSERT INTO activity_log VALUES ('','$no'+1,'$nama_user','',now())";	
	// }
	$query = "UPDATE activity_log SET waktu_logout = now() WHERE no = '$no'";
	$result = $conn->query($query);
}

unset($_SESSION["nama"]);
unset($_SESSION["peran"]);
session_destroy();

?>

<script>
	alert('Berhasil Logout');
	document.location = "./index.php";
</script>