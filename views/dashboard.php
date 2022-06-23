    <?php include "header.php"; ?>
        <div class="container">
            <br>
            <p>Selamat Datang <?=$user['Nama'];?></p>
            <br>
            <button class="trigger">Tambah Pelanggan</button>
    <div class="moda1">
      <div class="moda1-content">
        <button class="close-button">&times;</button>
        <form action="<?= base_url('add/cust');?>" method="POST">
            <label class='mt-3'>Nama Pelanggan</label><br>
            <input type="text" class="form-control" name="Nama" id="nama" placeholder="Nama">
            <br>
            <input:l>Nomor Telp</input:l><br>
            <input type="number" class="form-control" name="Telepon" id="Telepon" placeholder="08xx-xxxx-xxxx" 
            maxlength = "0">
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Masukkan data pelanggan</button>
        </form>   
      </div>
    </div>
        <br>
        <br>

    <hr>

    <?php if($target ==! false){?>

        <form action="Control" method="GET">
            <input:l>Cari nama pelanggan</input:l><br>
            <input type="text" name="search" id="search" placeholder="Nama Pelanggan">
            <button type="submit">Cari Pelanggan</button>
            <br>
            <br>
            <button type="submit">Tampilkan semua pelanggan</button>
    </form>
    
      <table id="myTable" class="table mw-100">
        <thead class="thead-dark">
            <th scope="col">ID</th>
            <th>Nama <span id='sort' class="material-symbols-outlined">
expand_less
</span>
</th>
            <th scope="col">Telepon</th>
            <th scope="col">Hapus</th>
            <th scope="col">Edit</th>
        </thead>
        <tbody>
            <?php $i = 1;?>
            <?php foreach($result as $cust) : ?>
            <tr>
                <td><?= $i;?></td>
                <td><?= $cust['Nama'];?></td>
                <td><?= $cust['Telepon'];?></td>
                <td><form action="delete/cust" method="POST">
                    <input type="hidden" name="del" value="<?= $cust['id'];?>" >
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form></td>
               <td><form action="<?= base_url('edit/cust');?>" method="POST">

            <input type="hidden" name="Nama" id="Nama" value="<?=$cust['Nama'];?>">
            
            <input type="hidden" name="table" id="table" value="customers">

            <input type="hidden" name="id" id="id" value="<?=$cust['id'];?>">
            
            <input type="hidden" name="Telepon" id="Telepon" value="<?=$cust['Telepon'];?>" >
            
            <button class="btn btn-warning" type="submit">Edit</button>
        </form>
      </td>
            </tr>
            <?php $i++;?>
        <?php endforeach;?>
        </tbody>
        
        
        <br>
        <br>    
        Showing <?= $i-1;?> records
    </table>
            
    
    <?php }
    
    else {
    ?>

    <form action="Control" method="GET">
            <input:l>Cari nama pelanggan</input:l><br>
            <input type="text" name="search" id="search" placeholder="Nama Pelanggan">  
            <button type="submit">Cari Pelanggan</button>
            <br>
            <br>
        </form> 

    <table id="myTable" class="table mw-100">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Nama <span id='sort' class="material-symbols-outlined">
expand_less
</span>
</th>
            <th>Telepon</th>
            <th>Hapus</th>
            <th>Edit</th>
        </thead>
        <tbody>
            <?php $i = 1;?>
            <?php foreach($cust as $cust) : ?>
            <tr>
                <td><?= $i;?></td>
                <td><?= $cust['Nama'];?></td>
                <td><?= $cust['Telepon'];?></td>
                <td><form action="delete/cust" method="POST">
                    <input type="hidden" name="del" value="<?= $cust['id'];?>" >
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form></td>
                <td><form action="<?= base_url('edit/cust');?>" method="POST">
            <input type="hidden" name="Nama" id="Nama" value="<?=$cust['Nama'];?>">

            <input type="hidden" name="table" id="table" value="customers">

            <input type="hidden" name="id" id="id" value="<?=$cust['id'];?>">
            
            <input type="hidden" name="Telepon" id="Telepon" value="<?=$cust['Telepon'];?>" >
            
            <button class="btn btn-warning" type="submit">Edit</button>
        </form>
      </td>
                
            </tr><?php $i++;?>
        <?php endforeach;?>
        Showing <?= $i-1;?> records
        </tbody>
        
        
    </table>
        </div>
        <?php };?>
         <script>
             function sortTableAsc() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  
  while (switching) {
    
    switching = false;
    rows = table.rows;
    
    for (i = 1; i < (rows.length - 1); i++) {
    
      shouldSwitch = false;
    
      x = rows[i].getElementsByTagName("td")[1];
      y = rows[i + 1].getElementsByTagName("td")[1];
    
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
    
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
    
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
             function sortTableDsc() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  
  while (switching) {
    
    switching = false;
    rows = table.rows;
    
    for (i = 1; i < (rows.length - 1); i++) {
    
      shouldSwitch = false;
    
      x = rows[i].getElementsByTagName("td")[1];
      y = rows[i + 1].getElementsByTagName("td")[1];
    
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
    
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
    
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

        document.getElementById('sort').onclick = function change(){
        
            var row = document.getElementById('sort');
            if (row.innerText == 'expand_less' ) {
                
                row.textContent = "expand_more";

                sortTableAsc();
                
            } else {
                row.textContent = "expand_less";
                sortTableDsc();
                
            }

        }
            



    
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
</body>
</html>