<?php
include 'dbase.php';

$jenis_kenderaan = '';
$plat_no = '';
$submit = 'DAFTAR';
$id = 0;

if($_GET && $_GET['action'] == 'ubah'){
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
    if($_POST['submit'] == 'DAFTAR'){
        $query = "insert into kenderaan (jenis_kenderaan,plat_no)values
        ('".$_POST['jenis_kenderaan']."','".$_POST['plat_no']."')";
    }else{
        $query = "update kenderaan set jenis_kenderaan = '".$_POST['jenis_kenderaan']."', plat_no = '".$_POST['plat_no']."' where kenderaan_pk = ".$_POST['id'];
    }

    echo $query;
    if($query){
        $link->query($query);
    }

    header('Location: kenderaan.php');
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
        <li> <a href="pengguna.php">Pengguna</a></li>
        <li> <a href="kenderaan.php">Kenderaan</a></li>
        <li>Tempahan</li>
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
</body>
</html>