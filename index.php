<?php
ini_set("display_errors",0);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
error_reporting(0);
 
session_start();

if (isset($_POST['login'])) {
	include_once 'koneksi.php';
    $nama = $_POST['nama'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM user WHERE nama='$nama' AND password='$password'";
    $query = mysqli_query($conn, $sql);
	$hasil = mysqli_fetch_assoc($query);

    if ($hasil['nama']==$nama && $hasil['password']==$password) {
		$_SESSION['nama'] = $hasil['nama'];
		$_SESSION['peran'] = $hasil['peran'];
		$nama_hasil = $hasil['nama'];
		$activity = mysqli_fetch_array(mysqli_query($conn,"SELECT nama_user FROM activity_log WHERE nama_user='$nama';"));
		$activity_no = mysqli_fetch_array(mysqli_query($conn,"SELECT no FROM activity_log ORDER BY no DESC LIMIT 1;"));

			if ($hasil['peran']=="Admin") {
				$user = mysqli_fetch_array(mysqli_query($conn,"SELECT nama FROM user WHERE peran='Admin';"));
				$no = $activity_no['no'];
				$nama_activity = $activity['nama_user'];
				$nama_user =  $user['nama'];
				if($nama_activity == $nama){
					$query = "UPDATE activity_log SET waktu_login = now() WHERE nama_user = '$nama_hasil'";
				}else{
					$query = "INSERT INTO activity_log VALUES ('','$no'+1,'$nama_user',now(),'')";	
				}
			    $result = $conn->query($query);
				?>
				<script>
				alert('Selamat Datang Admin');;
				document.location="home.php";
				</script>
				<?php

			} elseif ($hasil['peran']=="OP Purwokerto") {
				$user = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE peran='OP Purwokerto';"));
				$no = $activity_no['no'];
				$nama_activity = $activity['nama_user'];
				$nama_user =  $user['nama'];
				if($nama_activity == $nama){
					$query = "UPDATE activity_log SET waktu_login = now() WHERE nama_user = '$nama_hasil'";
				}else{
					$query = "INSERT INTO activity_log VALUES ('','$no'+1,'$nama_user',now(),'')";	
				}
			    $result = $conn->query($query);
				?>
				<script>
				alert('Selamat Datang Operator Stasiun Purwokerto');
				document.location="Purwokerto";
				</script>
				<?php

			} elseif ($hasil['peran']=="OP Kutoarjo") {
				$user = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE peran='OP Kutoarjo';"));
				$no = $activity_no['no'];
				$nama_activity = $activity['nama_user'];
				$nama_user =  $user['nama'];
				if($nama_activity == $nama){
					$query = "UPDATE activity_log SET waktu_login = now() WHERE nama_user = '$nama_hasil'";
				}else{
					$query = "INSERT INTO activity_log VALUES ('','$no'+1,'$nama_user',now(),'')";	
				}
			    $result = $conn->query($query);
				?>
				<script>
				alert('Selamat Datang Operator Stasiun Kutoarjo');
				document.location="Kutoarjo";
				</script>
				<?php

			} elseif ($hasil['peran']=="OP Kroya") {
				$user = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM user WHERE peran='OP Kroya';"));
				$no = $activity_no['no'];
				$nama_activity = $activity['nama_user'];
				$nama_user =  $user['nama'];
				if($nama_activity == $nama){
					$query = "UPDATE activity_log SET waktu_login = now() WHERE nama_user = '$nama_hasil'";
				}else{
					$query = "INSERT INTO activity_log VALUES ('','$no'+1,'$nama_user',now(),'')";	
				}
			    $result = $conn->query($query);
				?>
				<script>
				alert('Selamat Datang Operator Stasiun Kroya');
				document.location="Kroya";
				</script>
			<?php
			}
        ?>

		<?php
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

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
	<div class="content2">
		<h1>Sign In</h1>
		<div class="login">
			<div id="boxlogin">
				<img style="width: 74px; height: 61px;" src="./aset/images/train-icon.png">
				<form method='post' name="loginform" action='<?php $_SERVER['PHP_SELF']; ?>'>
					<div class="formlogin">
					<table>
						<tr>
							<td>Nama</td>
						</tr>
						<tr>
							<td><input type="text" name="nama" maxlength="30"></td>
						</tr>
						<tr>
							<td>Password</td>
						</tr>
						<tr>
							<td><input type="Password" name="password" maxlength="30"></td>
						</tr>
					</table>
					</div>
					<input type="submit" class="tombollogin" name="login" value="Login">
				</form>
			</div>
		</div>
	</div>
</body>
</html>