<?php include "header.php" ?>
        <div class="container">

        <button onclick=" location.href='<?= base_url('menu');?>'">Kembali Ke Halaman Menu</button>
        <br>
        <br>
        

    <form action="<?= base_url('edit/update');?>" method="POST">

            <input type="hidden" name="id" value="<?= $id;?>">
            <input type="hidden" name="table" value="menu">
            <input:l>Nama Menu</input:l><br>
            <input type="text" name="Nama" id="nama" value="<?= $Nama;?>">
            <br>
            <input:l>Kategori</input:l><br>
            <select name="kategori" id="kategori">
                <option value="<?=$kategori;?>"><?=$kategori;?></option>
                <?php foreach($cat as $c): ?>
                    <option value="<?=$c['nama_kategori'];?>"><?=$c['nama_kategori'];?></option>
                <?php endforeach;?>
            </select>
            <br>
            <input:l>Harga</input:l><br>
            <input type="text" name="Harga" id="Harga" value="<?= $Harga ?>"></input>
            <br>
            <br>
            <button type="submit">Update menu</button>
        </form>    
</div>
</body>
</html>