<?php
include 'dbase.php';

$jenis_kenderaan = '';
$plat_no = '';
$submit = 'CARIAN';
$id = 0;

if($_GET && $_GET['action'] == 'cari'){
    $query = "select * from kenderaan where kenderaan_pk = " . $_GET['id'];

    $result = $link->query($query);
    $row = $result->fetch_array();

    $jenis_kenderaan = $row['jenis_kenderaan'];
    $plat_no = $row['plat_no'];
    $submit = 'UBAH';
    $id = $_GET['id'];
}

if($_POST){
$query = '';
    if($_POST['submit'] == 'CARIAN'){
        //List pengguna

        
        $query = "select * from kenderaan WHERE";
        $query .= " jenis_kenderaan = ". $_POST['jenis_kenderaan'] ." ;

        $data = array();

        $result = $link->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="index.php">Utama</a></li>
        <li><a href="pengguna.php">Pengguna</a></li>
        <li><a href="kenderaan.php">Kenderaan</a></li>
        <li><a href="cariankenderaan.php">Carian Kerendaan</a></li>
    </ul>
    <br>
    <h2>Tambah Kenderaan</h2>
    <form action="formKenderaan.php" method="post">
    <table>
        <tr>
            <td>Jenis Kenderaan</td>
            <td>: <input type="text" name="jenis_kenderaan" value="<?php echo $jenis_kenderaan;?>"> </td>
        </tr>
        <tr>
        <td>Plat No</td>
            <td>: <input type="text" name="plat_no" value="<?php echo $plat_no;?>"> </td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
            <td><input type="submit" name="submit" value="<?php echo $submit;?>"></td>
        </tr>
    </table>
    </form>
    <?php 
    if($_POST['submit'] == 'CARIAN')
    {
    ?>
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
    <?php 
    }
    ?>
</body>
</html>