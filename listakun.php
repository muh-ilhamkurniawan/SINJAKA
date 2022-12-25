<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: index.php');
    exit;
}

include "koneksi.php";
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
	<div class="content3">
			<div id="boxlistakun">
				<a href="./home.php" class="kembali">Kembali</a>
				<div class="listakun"> 
					List Akun
				</div>
				<div id="boxdalam">
					<table class="table-logger">
						<tr>
							<th>No</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Peran</th>
							<th colspan="2">Aksi</th>
						</tr>
						<?php
				            $no = 1;
				            $sql = "select * from user order by no asc";
				            $query = mysqli_query($conn,$sql);
				            while($row = mysqli_fetch_array($query)) :
				        ?>
				            <tr>
				            	<td width="5%"><?php echo $no++ ?></td>
				                <td width="40%"><?php echo $row[nip] ?></td>
				                <td width="30%"><?php echo $row[nama] ?></td>
				                <td width="25%"><?php echo $row[peran] ?></td>
				                <td>
				                	<a href="update.php?id=<?php echo $row["id"];?>" class="buttonedit">Edit</a>
				                </td>
								<td>
				                	<a href="delete.php?id=<?php echo $row["id"];?>" class="buttonhapus" onclick="return confirm('Yakin Hapus?')" href="#">Hapus</a>
				                </td>
				            </tr>
				       	<?php
                         	endwhile;
                        ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>