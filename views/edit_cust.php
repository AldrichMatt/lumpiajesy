<?php include "header.php" ?>
        <div class="container">

        <button onclick=" location.href='<?= base_url('Control');?>'">Kembali Ke Menu Utama</button>
        <br>
        <br>
        

    <form action="<?= base_url('edit/update');?>" method="POST">

            <input type="hidden" name="id" value="<?= $id;?>">
            <input type="hidden" name="table" value="customers">
            <input:l>Nama Pelanggan</input:l><br>
            <input type="text" name="Nama" id="nama" value="<?= $Nama;?>">
            <br>
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