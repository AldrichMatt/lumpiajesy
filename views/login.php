<?php include 'header_auth.php';?>
<div class="container justify-content-center">
  <div class="jumbotron text-white">
      <h1 class="display-4 p-5">Lumpia Jesy</h1>
    </div>
    <form action="<?= base_url('Auth') ?>" method="POST" class="text-primary bg-white w-50 p-4 m-auto">
  <div class="form-group">
    <?= $this->session->flashdata('message');?>
    <label for="nama_input">Nama</label>
    <input type="text" name='nama' class="form-control" id="nama_input" placeholder="Nama Kamu" value="<?=set_value('nama')?>">
    <?= form_error('nama', '<small class="text-danger">', '</small>');?>
  </div>
  <br>
  <div class="form-group">
    <label for="telp_input">No. Telp</label>
    <input type="number" name="telepon" class="form-control" id="telp_input" placeholder="Nomor Telepon Kamu" oninput="if((this.value.length) > 13) { this.value = this.value.substring(0, 13); }" value="<?= set_value('telepon');?>">
    <?= form_error('telepon', '<small class="text-danger">', '</small>');?>
  </div>
 <br>
  <button type="submit" class="btn btn-primary w-100">Login</button>
  <br><br>
  <a href="<?= base_url('auth/registration')?>" id='daftar' >Belum punya akun? Daftar</a>
</form>
</div>