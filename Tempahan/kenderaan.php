<?php
include 'dbase.php';

if($_GET && $_GET['action'] == 'padam'){
    $query = "delete from kenderaan where kenderaan_pk = ".$_GET['id'];

    if($query){
        $link->query($query);
    }
}


//List pengguna
$query = "select * from kenderaan";
$data = array();

$result = $link->query($query);
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Tempahan Kenderaan</title>
</head>
<body>
    <ul>
        <li><a href="index.php">Utama</a></li>
        <li> <a href="pengguna.php">Pengguna</a></li>
        <li> <a href="kenderaan.php">Kenderaan</a></li>
        <li>Tempahan</li>
    </ul>
    <br>
    <a href="formKenderaan.php"><button>Tambah Kenderaan</button></a>
    <br>
    <table border="1">
        <tr>
            <td>Bil.</td>
            <td>Jenis Kenderaan</td>
            <td>Plat No</td>
            <td>Ubah</td>
            <td>Padam</td>
        </tr>
        <?php
        $i = 1;
        foreach($data as $row){
            echo '<tr>';
            echo '<td>' .$i. '</td>';
            echo '<td>' . $row['jenis_kenderaan'] . '</td>';
            echo '<td>' . $row['plat_no'] . '</td>';
            echo '<td><a href="formKenderaan.php?id='.$row['kenderaan_pk'].'&action=ubah"><button>Ubah</button></a></td>';
            echo '<td><a href="kenderaan.php?id='.$row['kenderaan_pk'].'&action=padam"><button>Padam</button></a></td>';
            echo '</tr>';
            $i++;
        }
        ?>
    </table>
</body>
</html>