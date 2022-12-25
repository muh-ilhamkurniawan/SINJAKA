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

if(isset($_POST['regis'])){
	$tabel = mysqli_fetch_array(mysqli_query($conn,"SELECT no FROM user ORDER BY no DESC LIMIT 1;"));
	$no = $tabel['no'];
  $nip =  $_POST['nip'];
  $nama =  $_POST['nama'];
  $pass =   $_POST['pass'];
  $peran = $_POST['peran'];
  if(!empty($peran)){
      $query = "INSERT INTO user VALUES ('','$no'+1,'$nip','$nama','$pass','$peran')";
      $result = $conn->query($query);
      if($result){
        ?>
        <script>
            alert("Data Berhasil di tambah");
            document.location = "listakun.php";
        </script>
    <?php
      }  
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
		<div class="regis">
			<div id="boxregis">
				<a href="./home.php" class="kembali">Kembali</a>
				<div class="listakun">
					Akun Baru
				</div>
				<form name="regisform" action="" method="post">
					<div class="formregis">
					<table>
						<tr>
							<td>NIP</td>
						</tr>
						<tr>
							<td><input type="text" name="nip" maxlength="18" required></td>
						</tr>
						<tr>
							<td>Nama</td>
						</tr>
						<tr>
							<td><input type="text" name="nama" maxlength="30" required></td>
						</tr>
						<tr>
							<td>Password</td>
						</tr>
						<tr>
							<td><input type="Password" name="pass" maxlength="30" required></td>
						</tr>
						<tr>
							<td>Peran</td>
						</tr>
						<tr>
							<td>
								<select name="peran">
									<option selected disabled>-- Pilih Peran --</option>
									<option value="Admin">Admin</option>
									<option value="OP Purwokerto">OP Purwokerto</option>
									<option value="OP Kutoarjo">OP Kutoarjo</option>
									<option value="OP Kroya">OP Kroya</option>
								</select>
							</td>
						</tr>
					</table>
					</div>
					<input type="submit" class="tombollogin" name="regis" value="Tambah">
				</form>
			</div>
		</div>
	</div>
</body>
</html>