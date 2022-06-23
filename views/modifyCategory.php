<?php include "header.php" ?>
<div class="container">
    <button class="button" onclick="location.href='<?= base_url('menu')?>'">Kembali</button>
    <br>
    <br>
    <hr>
    <br>
    <button class="trigger">Tambah Kategori</button>
    <div class="moda1">
      <div class="moda1-content">
        <button class="close-button">&times;</button>
        <form action="<?= base_url('add/kategori');?>" method="POST">
            <input:l>Nama Kategori</input:l><br>
            <input type="text" name="kategori" id="nama" placeholder="Nama">
            <br>
            <br>
            <button type="submit">Masukkan Kategori baru</button>
        </form>   
      </div>
    </div>
    <br>
    <br>
    <table class="table">
        <thead>
            <th>Nama Kategori</th>
            <th>Hapus</th>
            <th>Edit</th>
        </thead>
        <tbody>
            <?php foreach($category as $c) :?>
            <tr>
                <td><?=$c['nama_kategori'];?></td>
                <td><form action="<?=base_url('delete/category');?>" method="POST">
                    <input type="hidden" name="del" value="<?= $c['id'];?>" >
                    <button class="delete" type="submit">Hapus</button>
                </form></td>
                <td><form action="<?= base_url('edit/category');?>" method="POST">
            <input type="hidden" name="Nama" value="<?=$c['nama_kategori'];?>">
            <input type="hidden" name="id" value="<?= $c['id'];?>">
            <button class="edit-button" type="submit">Edit</button>
        </form>
      </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script>
    let moda1 = document.querySelector(".moda1");
    let trigger = document.querySelector(".trigger");
    let closeButton = document.querySelector(".close-button");     

      function toggleModa1() {
        moda1.classList.toggle("show-moda1");
      }
    
      function windowOnClick(event) {
        if(event.target === moda1) {
          toggleModa1();
        }
      }
      trigger.addEventListener("click", toggleModa1);
      closeButton.addEventListener("click", toggleModa1);
      window.addEventListener("click", windowOnClick);
</script>