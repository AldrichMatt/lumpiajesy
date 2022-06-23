<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Customer Database</title>
    <style>
        table, th, tr, td{
            border : 1px solid black;
        }
        th, td{
            padding : 7px;
        }

        header{
            font-size : 50px;
            color : #f90;
            background-color : #fc6;
            margin : -10px -10px 10px -10px;
            padding : 50px;
            
        }

        a{
            text-decoration : none;
            color : black;
            padding : 3px 5px 3px 5px;
            background-color : #ff9900;
            border : 1px black solid;
        }
    </style>
</head>
<body>

        <header>Lumpia Jesy</header>
        <hr>

        <br>
            <a href="<?= base_url('add');?>">Tambah Pelanggan</a>
        <br>
        <br>

        <form action="Control/search" method="GET">
            <input:l>Cari nama pelanggan</input:l><br>
            <input type="text" name="search" id="search" placeholder="Nama Pelanggan"><br>
            <br>
            <button type="submit">Cari Pelanggan</button>
            <br>
            <br>
        </form>

    

    <table>
        <thead>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
        </thead>
        <?php $i = 1;?>
        <?php foreach($result as $cust) : ?>
        <tbody>
            <tr>
                <td><?= $i;?></td>
                <td><?= $cust['Nama'];?></td>
                <td><?= $cust['Alamat'];?></td>
                <td><?= $cust['Telepon'];?></td>
            </tr>
        </tbody>
        
        <?php $i++;?>
        <?php endforeach;?>
        Showing <?= $i-1;?> records
    </table>
</body>
</html>