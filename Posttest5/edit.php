<?php

    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $result = mysqli_query($db, 
        "SELECT * FROM datauser WHERE id='$id'");
    $row = mysqli_fetch_array($result);

    if(isset($_POST['kirim'])){
        $nama_lengkap = $_POST['nama_lengkap'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $email = $_POST['email'];

        $result = mysqli_query($db, 
        "UPDATE datauser SET 
            nama_lengkap='$nama_lengkap',
            tanggal_lahir='$tanggal_lahir',
            email='$email' 
        WHERE id='$id'");

        if($result){
            echo "
                <script>
                    alert('Data Berhasil di Update');
                    document.location.href = 'tampilan.php';
                </script>
            ";
        }else {
            echo "
                <script>
                    alert('Data Gagal Terkirim');
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tampilan.css">
    <title>edit data</title>
</head>
<body>
    <br><br><center><h3>Edit Data User</h3></center><br><br>
    <center><form action="" method="post">
        <label for="">Nama Lengkap : </label><br>
        <input type="text" name="nama_lengkap" value=<?=$row['nama_lengkap']?>><br><br>
        <label for="">Tanggal Lahir : </label><br>
        <input type="text" name="tanggal_lahir" value=<?=$row['tanggal_lahir']?>><br><br>
        <label for="">Email : </label><br>
        <input type="text" name="email" value=<?=$row['email']?>><br><br>
        <input type="submit" name="kirim">
    </form></center>
</body>
</html>