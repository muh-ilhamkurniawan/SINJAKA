<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: error.php');
    exit;
}

    //fungsi auto refresh
    include "koneksi.php";
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url="https://";
    } else {
        $url="https://";
        $url.=$_SERVER['HTTP_HOST'];
        $url.=$_SERVER['REQUEST_URI'];
        $url;
    }
    $page=$url;
    $sec="15";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="<?php echo $sec;?>" URL="<?php echo $page; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Layout Peron</title>
</head>
<body class='view'>
    <div id="container"></div>
        <!-- menampilkan navbar -->
        <nav>
            <div class="nav-desc">
                <!-- menampilkan logo -->
                <div class="logo">
                    <img src="aset/logo.png" class="featured-image" />
                </div>
                <!-- menampilkan nama stasiun -->
                <div class="stasiun">
                    STASIUN KUTOARJO
                </div>
            </div>
            <!-- menampilkan date time -->
            <div class="nav-time">
                <?php
                    //mengganti hari ke bahasa indonesia
                    function hariIndo ($hariInggris) {
                    switch ($hariInggris) {
                        case 'Sunday': return 'Minggu';
                        case 'Monday': return 'Senin';
                        case 'Tuesday': return 'Selasa';
                        case 'Wednesday': return 'Rabu';
                        case 'Thursday': return 'Kamis';
                        case 'Friday': return 'Jumat';
                        case 'Saturday': return 'Sabtu';
                        default: return 'hari tidak valid';
                    }
                    }
                ?>
            <?php
            //set waktu
            date_default_timezone_set("Asia/Jakarta"); 
            $hariBahasaInggris = date('l');
            $hariBahasaIndonesia = hariIndo($hariBahasaInggris);
            echo "<span class='hari'>{$hariBahasaIndonesia}</span>";
            ?> 
            <br/> 
            <span style='padding-right: 20px;' class='hari'> <?php echo date('d-m-Y'); ?></span>
            <br/> 
            <span id="jam" class="jam" style='padding-right: 20px;'></span>
            <!-- menampilkan waktu secara live time -->
            <script type="text/javascript">
                const str = new Date().toLocaleString('en-US', { timeZone: 'Asia/Jayapura' });
                console.log(str);
                window.onload = function() { jam(); }
            
                function jam() {
                    var e = document.getElementById('jam');
                    var date = new Date();
                    var n = date.toLocaleTimeString('id', { timeZone: 'Asia/Jakarta' });
        
                    e.innerHTML = n;
            
                    setTimeout('jam()', 1000);
                }
            
                function set(e) {
                    e = e < 10 ? '0'+ e : e;
                    return e;
                }
            </script>
            
            </div>
        </nav>
        <!-- menampilkan tabel peron -->
        <div class="konten">
        <table class='table-peron' align='center' width="99%" cellspacing="4" cellpadding="0">
            <tr>
                <th>JALUR<br/> <i>TRACK</i></th>
                <th>NAMA KA <br/> <i>TRAIN NAME</i></th>
                <th>TUJUAN <br/> <i>DESTINATION</i></th>
                <th>BERANGKAT <br/> <i>DEPARTURE</i></th>
            </tr>
        <?php
            //menampilkan KA sesuai jalur
            $jalur = 1;
            $sql = "select * from hasilka_kutoarjo order by jalur asc";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)){
            echo "
            <tr>
                <td width='7%'> <span class='isi'><div class='jalur'>$jalur</div> </span></td>
                <td width='54%'><span class='isi'>$row[nama_ka] - $row[no_ka]</span></td>
                <td width='26%'><span class='isi'>$row[tujuan]</span></td>
                <td width='13%' ><span class='isi'>$row[jam_berangkat]</span></td>
                </tr>
            ";
            $jalur++;
            }
        ?>
        </table>
        </div>
        
        <!-- menampilkan footer -->
        <footer>
            <p><marquee scrollamount="14" loop="1">PT KERETA API INDONESIA (PERSERO) DAOP 5 PURWOKERTO</marquee></p>
        </footer>
</body>
</html>
