<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Cust</title>
</head>
<body>
    <form action="<?= base_url('add/insert');?>" method="POST">
            <input:l>Nama Pelanggan</input:l><br>
            <input type="text" name="Nama" id="nama" placeholder="Nama">
            <br>
            <input:l>Alamat</input:l><br>
            <textarea name="Alamat" id="Alamat" cols="30" rows="10" placeholder="Alamat"></textarea>
            <br>
            <input:l>Nomor Telp</input:l><br>
            <input type="number" name="Telepon" id="Telepon" placeholder="08xx-xxxx-xxxx" 
            maxlength = "0">
            <br>
            <br>
            <button type="submit">Masukkan data pelanggan</button>
        </form>   

    
</body>
</html>