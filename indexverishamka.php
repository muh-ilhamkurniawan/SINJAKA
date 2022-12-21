<?php
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
	<div class="content">
		<h1>Selamat Datang!</h1>
		<h2>Silahkan Pilih Tampilan Stasiun</h2>
		<div class="stasiun">
			<a href="./Purwokerto/operator.php" target="_blank">
				<div id="box1">
					<img style="width: 88px; height: 76px;" src="./aset/images/train-icon.png">
					<h3>Stasiun Purwokerto</h3>
				</div>
			</a>
			<a href="./Kutoarjo">
				<div id="box2">
					<img style="width: 88px; height: 76px;" src="./aset/images/train-icon.png">
					<h3>Stasiun Kutoarjo</h3>
				</div>
			</a>
			<a href="./Kroya/operator.php">
				<div id="box3">
					<img style="width: 88px; height: 76px;" src="./aset/images/train-icon.png">
					<h3>Stasiun Kroya</h3>
				</div>
			</a>
		</div>
	</div>
</body>
</html>