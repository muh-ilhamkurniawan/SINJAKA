<?php
ini_set("display_errors",0);
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
error_reporting(0);

include "koneksi.php";

$id = $_GET['id'];
if(isset($_POST['edit'])){
	$nip = htmlspecialchars($_POST['nip']);
	$nama = htmlspecialchars($_POST['nama']);
	$peran = htmlspecialchars($_POST['peran']);

	$update = "UPDATE user SET 
			   nip = '$nip', nama = '$nama', peran = '$peran'
			   WHERE id = '$id'";
	$query = mysqli_query($conn, $update);
	if ($query){
		?>
		<script>
            alert("Data Berhasil di ubah");
            document.location = "listakun.php";
        </script>
		<?php
	}
}
$row = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'"));
if($row['nama'] != ""){
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
		<div class="update">
			<div id="boxupdate">
				<div class="listakun">Edit Akun</div>
				<form name="updateform" action="" method="post">
					<div class="formupdate">
					<table>
						<tr>
							<td>NIP</td>
						</tr>
						<tr>
							<td><input  value='<?php echo $row['nip']; ?>' type="text" name="nip"></td>
						</tr>
						<tr>
							<td>Nama</td>
						</tr>
						<tr>
							<td><input  value='<?php echo $row['nama']; ?>' type="text" name="nama"></td>
						</tr>
						<tr>
							<td>Peran</td>
						</tr>
						<tr>
							<td>
								<select name="peran">
									<option value="Admin">Admin</option>
									<option value="OP Purwokerto">OP Purwokerto</option>
									<option value="OP Kutoarjo">OP Kutoarjo</option>
									<option value="OP Kroya">OP Kroya</option>
								</select>
							</td>
						</tr>
					</table>
					</div>
					<input type="submit" class="tombollogin" name="edit" value="Edit">
				</form>
			</div>
			<?php
}?>
		</div>
	</div>
</body>
</html>