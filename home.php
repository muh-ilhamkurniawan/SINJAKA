<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: index.php');
    exit;
}

ini_set("display_errors",0);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SINJAKA</title>
	<link rel="stylesheet" href="./aset/styles.css">
</head>
<body>
	<div class="header">
		<div class="header-left">
			<img style="width: 230px; height: 50px;" src="./aset/images/Name.png">
		</div>
		<div class="header-right">
			<a href="https://www.kai.id/s">
		   		<img style="width: 108px; height: 46px;" src="./aset/images/kai_logo.png">
			</a>
		</div>
	</div>
	<div class="content1">
		<h2>Selamat Datang, Admin!</h2>
		<div class="admin">
		
			<a href="./listakun.php">
				<div id="box1">
					<img style="width: 67px; height: 71px;" src="./aset/images/list-akun.png">
					<h3>List Akun</h3>
				</div>
			</a>
			<a href="./activity.php">
				<div id="box2">
					<img style="width: 67px; height: 71px;" src="./aset/images/activity-log.png">
					<h3>Log Aktivitas</h3>
				</div>
			</a>
			<a href="./tambahakun.php">
				<div id="box3">
					<img style="width: 73px; height: 71px;" src="./aset/images/akun-icon.png">
					<h3>Tambah Akun</h3>
				</div>
			</a>
		</div>
		<a href="./logout.php" class="tombollogout">Keluar</a> 
	</div>
</body>
</html>