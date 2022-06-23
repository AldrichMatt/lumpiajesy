<?php include "header.php"?>
<div class="container">
    <button class="trigger" onclick="location.href ='<?= base_url('Order/new');?>'">Tambah Order</button>    
    <button class="trigger" onclick="location.href ='<?= base_url('Order/history');?>'">History</button>    
    <br>
    <br>
    <hr>
    <br>
    <!-- here -->
    <br>
    <table id="myTable" class="table">
        <thead>
            <th>Nama Customer</th>
            <th>Menu</th>
            <th>Harga</th>
            <th>Pengambilan</th>
            <th>Cancel</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php foreach($orderan as $o) : ?>
                <tr>
                    <td><?=$o['nama_cust'];?></td>
                    <td><?=$o['menu'];?></td>
                    <td><?=$o['harga'];?></td>
                    <td><?php
                    $timezone = new DateTimeZone('Asia/Makassar');
                    $now = new DateTime(date('Y-m-d'));
                    $date = new DateTime($o['pengambilan']);
                   
                    $interval = $now->diff($date);
                    $interval->h = $interval->h-6;
                    if($interval->s == 0 && $interval->i == 0 && $interval->h == 0 && $interval->d == 0 && $interval->m == 0 && $interval->y == 0){
                        $this->M_order->finish_order('orderan', $o['id']);
                    }elseif ($interval->d == 0) {
                        echo "Hari Ini " . $date->format('H:i');
                    }elseif($interval->d == 1) { 
                        echo "Besok " . $date->format('H:i');
                    }else{
                        
                        echo $this->M_order->translate_ind($date->format('l'))  . ', ' . $date->format('d ') . $this->M_order->translate_ind($date->format('M')). $date->format(' H:i');
                    }
                    ?>
                    </td>
                    <td><form action="order/delete" method="POST">
                        <input type="hidden" name="cancel" value="<?=$o['id'];?>">
                        <input type="hidden" name="page" value="order">
                        <button class="delete" type="submit">Cancel</button>
                    </form></td>
                    <td><form action="<?=base_url('order/selesaikan')?>" method="POST">
                            <input type="hidden" name="key" value="<?= $o['id'] ?>">
                            <button type="submit" class="edit-button">Selesaikan</button>
                        </form></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        
    </div>
</body>
</html>