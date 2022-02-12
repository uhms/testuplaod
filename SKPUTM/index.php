<?php
include 'dbase.php';

if($_POST){
    $query = '';
        if($_POST['submit'] == 'CARI'){
          
            if($_POST['carian'] != '')
            {
                $query = "select * from permohonan inner join kod_program on kod_program.ID_Program = permohonan.Program_Pohon WHERE NoKP = '". $_POST['carian']."'";
            }
            else
            {
                $query = "select * from permohonan inner join kod_program on kod_program.ID_Program = permohonan.Program_Pohon";
            }
            
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
    <title>Sistem Permohonan Kemasukan Pelajar Ke UTM</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="text" id="carian" name="carian">
        <input type="submit" name="submit" value="CARI">
    </form>
    <br>
    <a href="borangPermohonan.php"><button>Tambah</button></a>
    <br>
    <br>
    <?php 
    if($_POST && $_POST['submit'] == 'CARI')
    {
    ?>
        <table border="1">
                <tr>
                    <td>Bil.</td>
                    <td>NoKP</td>
                    <td>Nama</td>
                    <td>Tarikh Lahir</td>
                    <td>Jantina</td>
                    <td>Alamat</td>
                    <td>No Telefon</td>
                    <td>Emel</td>
                    <td>Nama Program</td>
                    <td>Status Permohonan</td>
                    <td>Catatan</td>
                    <td>-</td>
                </tr>
            <?php
                $i = 1;
                foreach($data as $row){
                    echo '<tr>';
                    echo '<td>' .$i. '</td>';
                    echo '<td>' . $row['NoKP'] . '</td>';
                    echo '<td>' . $row['Nama'] . '</td>';
                    echo '<td>' . $row['Tarikh_Lahir'] . '</td>';
                    echo '<td>' . $row['Jantina'] . '</td>';
                    echo '<td>' . $row['Alamat'] . '</td>';
                    echo '<td>' . $row['No_Telefon'] . '</td>';
                    echo '<td>' . $row['Emel'] . '</td>';
                    echo '<td>' . $row['Nama_Program'] . '</td>';
                    echo '<td>' . $row['Status_Permohonan'] . '</td>';
                    echo '<td>' . $row['Catatan'] . '</td>';
                    echo '<td><a href="borangPermohonan.php?id='.$row['NoKP'].'&action=PAPAR"><button>PAPAR</button></a></td>';
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