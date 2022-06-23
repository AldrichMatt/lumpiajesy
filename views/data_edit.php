<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Data - Lumpia Jesy</title>
    <style>
        header{
            font-size : 50px;
            color : #f90;
            background-color : #fc6;
            width : 94%;
            margin : -10px -10px 10px -10px;
            padding : 50px;
            
        }
        .container{
        margin-left: auto;
        margin-right: auto;
        width: 50%;
    }
    </style>
</head>
<body>
    <header>Lumpia Jesy</header>
        <hr>

        <br>
        <div class="container">

        <button onclick=" location.href='<?= base_url();?>'">Kembali Ke Menu Utama</button>
        <br>
        <br>
        

    <form action="<?= base_url('edit/update');?>" method="POST">

            <input type="hidden" name="id" value="<?= $id;?>">
            <input type="hidden" name="table" value="customers">
            <input:l>Nama Pelanggan</input:l><br>
            <input type="text" name="Nama" id="nama" value="<?= $Nama;?>">
            <br>
            <input:l>Alamat</input:l><br>
            <textarea name="Alamat" id="Alamat" cols="30" rows="10" placeholder="Alamat"><?=$Alamat?></textarea>
            <br>
            <input:l>Nomor Telp</input:l><br>
            <input type="number" name="Telepon" id="Telepon" value="<?=$Telepon?>">
            <br>
            <br>
            <button type="submit">Masukkan data pelanggan</button>
        </form>    
</div>
</body>
</html>