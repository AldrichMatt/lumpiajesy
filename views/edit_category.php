<?php include "header.php" ?>
<div class="container">
    <button onclick=" location.href='<?= base_url('Menu/modifyCategory');?>'">Kembali Ke Menu Kategori</button>
        <br>
        <br>

        <form action="<?= base_url('edit/update');?>" method="POST">
            <input type="hidden" name="id" value="<?= $id;?>">
            <input type="hidden" name="table" value="kategori">
            <input:l>Nama Kategori</input:l><br>
            <input type="text" name="Nama" id="nama" value="<?= $Nama;?>">
            <br>
            <br>
            <button type="submit">Update kategori</button>
        </form>


</div>