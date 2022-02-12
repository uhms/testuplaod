<?php
include 'dbase.php';

    $NoKP = '';
    $Nama = '';
    $Tarikh_Lahir = '';
    $Jantina = '';
    $Alamat = '';
    $Emel = '';
    $No_Telefon = '';
    $Program_Pohon = '';
    $Status_Permohonan = '';
    $Catatan = '';
    $submit = 'TAMBAH';
    $id = 0;

if($_GET)
{
    if($_GET['action'] == 'PAPAR'){

        $query = "select * from permohonan where NoKP = " . $_GET['id'];
    
        $result = $link->query($query);
        $row = $result->fetch_array();
    
        $NoKP = $row['NoKP'];
        $Nama = $row['Nama'];
        $Tarikh_Lahir = $row['Tarikh_Lahir'];
        $Jantina = $row['Jantina'];
        $Alamat = $row['Alamat'];
        $Emel = $row['Emel'];
        $No_Telefon = $row['No_Telefon'];
        $Program_Pohon = $row['Program_Pohon'];
        $Status_Permohonan = $row['Status_Permohonan'];
        $Catatan = $row['Catatan'];
        $id = $_GET['id'];
    }
    else if($_GET['action'] == 'HAPUS')
    {
        $query2 = "delete from permohonan where NoKP = " . $_GET['kp'];
        
        if($query2){
            if($link->query($query2)){
                echo '<script language="javascript">alert("berjaya!")</script>';
                header('Location: index.php');
            }
            else{
                echo '<script language="javascript">alert("tidak berjaya!")</script>';
            }
    
        } 
        
    }
}


if($_POST){
$query = '';
    if($_POST['submit'] == 'TAMBAH')
    {
        $query = "insert into permohonan (NoKP, Nama, Tarikh_Lahir, Jantina, Alamat, No_Telefon, Emel, Program_Pohon, Status_Permohonan, Catatan) values
        ('".$_POST['NoKP']."','".$_POST['Nama']."','".$_POST['Tarikh_Lahir']."','".$_POST['Jantina']."','".$_POST['Alamat']."','".$_POST['No_Telefon']."','".$_POST['Emel']."','".$_POST['Program_Pohon']."','".$_POST['Status_Permohonan']."','".$_POST['Catatan']."')";
    }
    else if($_POST['submit'] == 'SIMPAN')
    {
        $query = "update permohonan 
                    set 
                    NoKP = '".$_POST['NoKP']."', 
                    Nama = '".$_POST['Nama']."', 
                    Tarikh_Lahir = '".$_POST['Tarikh_Lahir']."', 
                    Jantina = '".$_POST['Jantina']."', 
                    Alamat = '".$_POST['Alamat']."', 
                    No_Telefon = '".$_POST['No_Telefon']."', 
                    Emel = '".$_POST['Emel']."',
                    Program_Pohon = '".$_POST['Program_Pohon']."',
                    Status_Permohonan = '".$_POST['Status_Permohonan']."',
                    Catatan = '".$_POST['Catatan']."'
                    where NoKP = ".$_POST['NoKP'];
    }

    if($query){
        if($link->query($query)){
            echo '<script language="javascript">alert("berjaya!")</script>';
        }
        else{
            echo '<script language="javascript">alert("tidak berjaya!")</script>';
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
    <h2>Borang Permohonan</h2>
    <form action="borangPermohonan.php" method="post">
    <table>
        <tr>
            <td>NoKP</td>
            <td>: <input type="text" name="NoKP" value="<?php echo $NoKP;?>"> </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <input type="text" name="Nama" value="<?php echo $Nama;?>"> </td>
        </tr>
        <tr>
        <td>Tarikh Lahir</td>
            <td>: <input type="date" name="Tarikh_Lahir" value="<?php echo $Tarikh_Lahir;?>"> </td>
        </tr>
        <tr>
        <td>Jantina</td>
            <td>: <input type="text" name="Jantina" value="<?php echo $Jantina;?>"> P-Perempuan, L-Lelaki</td>
        </tr>
        <tr>
        <td>Alamat</td>
            <td>: <textarea name="Alamat"><?php echo $Alamat;?></textarea></td>
        </tr>
        <tr>
        <td>No. Telefon</td>
            <td>: <input type="text" name="No_Telefon" value="<?php echo $No_Telefon;?>"> </td>
        </tr>
        <tr>
        <td>Email</td>
            <td>: <input type="text" name="Emel" value="<?php echo $Emel;?>"> </td>
        </tr>
        <tr>
        <td>Program Yang Dipohon</td>
            <td>: 
            <?php 
                //List pengguna
                $query = "select * from kod_program";
                $data = array();

                $result = $link->query($query);
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }

                
                $i = 1;
                echo '<select name="Program_Pohon" value="' . $Program_Pohon . '">';
                echo '<option value="' . $Program_Pohon . '">Sila Pilih</option>';
                foreach($data as $row){
                    echo '<option value="' . $row['ID_Program'] . '">' . $row['Nama_Program'] . '</option>';
                    $i++;
                }
                echo '</select>';
    
            ?>
            </td>
        </tr>
        <tr>
        <td>STatus Permohonan</td>
            <td>: 
                <input type="text" name="Status_Permohonan" value="<?php echo $Status_Permohonan;?>"> G-Gagal, L-Lulus
            </td>
        </tr>
        <tr>
        <td>Catatan</td>
            <td>: <input type="text" name="Catatan" value="<?php echo $Catatan;?>"> </td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
            <td>
                <input type="submit" name="submit" value="<?php echo $submit;?>">
                <input type="button" name="submit" value="HAPUS" onclick="confirmDelete('<?php echo $NoKP;?>')">
                <input type="submit" name="submit" value="SIMPAN">
                <a href="index.php"><input type="button" name="batal" value="BATAL"></a>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script  type="text/javascript">
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete")) {
            location.href = 'borangPermohonan.php?action=HAPUS&kp=' + id;
        }
    }
</script>