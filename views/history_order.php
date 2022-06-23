<?php include "header.php" ?>
<div class="container">
    <button class="trigger" onclick="location.href='<?= base_url('order')?>'">Kembali</button>
    <br>
    <br>

    <a href=<?= base_url('order/truncate');?> onclick="return confirm('Kamu akan menghapus semua riwayat pesanan, yakin?')" class="delete">Hapus Semua Data</a>
    <br>
    <br>

    <table class="table">
        <thead>
            <th>Nama Customer</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Pengambilan</th>
            <th>Hapus</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php foreach($orderan as $o) : ?>
            <tr>
                <td><?=$o['nama_cust'];?></td>
                <td><?=$o['menu'];?></td>
                <td><?= $o['harga'];?></td>
                <td><?php
                    $date = new DateTime($o['pengambilan']);
                    echo $this->M_order->translate_ind($date->format('l'))  . ', ' . $date->format('d ') . $this->M_order->translate_ind($date->format('M')). $date->format(' H:i');?></td>
                <td><form action="<?= base_url('order/delete')?>" method="POST">
                <input type="hidden" name="cancel" value="<?= $o['id'] ?>">
                <input type="hidden" name="page" value="order/history">
                <button type="submit" class="delete">Hapus</button>
            </form></td>
                <td>Sudah Selesai</td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
</div>