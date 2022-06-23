<?php include "header.php" ?> 
<div class="container">
    <button class="trigger">Tambah Menu</button>
    <div class="moda1">
      <div class="moda1-content">
        <button class="close-button">&times;</button>
        <form action="<?= base_url('add/menu');?>" method="POST">
            <input:l>Nama Menu</input:l><br>
            <input class="form-control" type="text" name="nama" id="nama" placeholder="Nama">
            <br>
            <br>
            <input:l>Kategori</input:l><br>
            <?php $j = 1; ?>
            <div class="kategori-dropdown">
            <select  name="kategori" id="kategori" >
               
                <option value=""> --pilih kategori-- </option>
                
                <?php foreach($category as $c) : ?>
                <option value="<?=$c['nama_kategori'];?>"><?=$c['nama_kategori'];?></option>
                <?php $j++; ?>
                <?php endforeach;?>
                
              </select>
            </div>
            <br>
            <button type="button" onclick="showform()" id="category_add">Tambah Kategori</button>
            <br>
            <br>
            <div class="form-category">
                <input type="text" name="newCategory" id="newCategory" placeholder="Nama Kategori">
                <input type="submit" name="makeCategory" id="makeCategory" value="Buat Kategori"></input>
            </div>
            <br>
            <input:l>Harga</input:l><br>
            <input type="number" name="harga" id="harga" placeholder="Harga">
            <br>
            <br>
            <button type="submit">Masukkan Menu baru</button>
        </form>   
      </div>
    </div>
    
    <button class="trigger" onclick="location.href='<?= base_url('menu/modifyCategory') ?>'">Edit Kategori</button>
    <br>
    <br>

    <hr>

    <?php if($target ==! false){?>

        <form action="Menu" method="GET">
            <input:l>Cari nama Menu</input:l><br>
            <input type="text" name="search" id="search" placeholder="Nama Menu">
            <button type="submit">Cari Menu</button>
            <br>
            <br>
            <button type="submit">Tampilkan semua menu</button>
            
        </form>
<br>
        <table id="myTable" class="table">
        <thead>
            <th>Nama Menu<span id='sortMenu' class="material-symbols-outlined">
expand_less
</span></th>
            <th>Kategori<span id='sortCat' class="material-symbols-outlined">
expand_less
</span></th>
            <th>Harga / pc</th>
            <th>Hapus</th>
            <th>Edit</th>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($result as $m) :?>
        <tbody>
            <tr>
                <td><?= $m['nama_menu'];?></td>
                <td><?= $m['kategori'];?></td>
                <td>Rp <?= number_format($m['harga'], 0, ',', '.');?></td>
                <td><form action="delete/menu" method="POST">
                    <input type="hidden" name="table" value="menu">
                    <input type="hidden" name="del" value="<?= $m['id'];?>" >
                    <button class="delete" type="submit">Hapus</button>
                </form></td>
                <td><form action="<?= base_url('edit/menu');?>" method="POST">
            <input type="hidden" name="Nama" id="Nama" value="<?=$m['nama_menu']?>">

            <input type="hidden" name="table" id="table" value="menu">

            <input type="hidden" name="id" id="id" value="<?=$m['id']?>">

            <input type="hidden" name="kategori" id="kategori" value="<?=$m['kategori']?>">
            
            <input type="hidden" name="Harga" id="Harga" value="<?=$m['harga']?>"></input>
            
            <button class="edit-button" type="submit">Edit</button>
        </form>
      </td>
            </tr>
        </tbody>
        <?php $i++;?>
        <?php endforeach; ?>
        Showing <?= $i-1;?> records
    </table>
  <?php }
    
    else {
    ?>

    <form action="Menu" method="GET">
            <input:l>Cari nama Menu</input:l><br>
            <input type="text" name="search" id="search" placeholder="Nama Menu">
            <button type="submit">Cari Menu</button>
            <br>
            <br>
        </form>

        <table id="myTable" class="table">
        <thead>
            <th>Nama Menu<span id='sortMenu' class="material-symbols-outlined">
expand_less
</span></th>
            <th>Kategori<span id='sortCat' class="material-symbols-outlined">
expand_less
</span></th>
            <th>Harga / pc</th>
            <th>Hapus</th>
            <th>Edit</th>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($menu as $m) :?>
        <tbody>
            <tr>
                <td><?= $m['nama_menu'];?></td>
                <td><?= $m['kategori'];?></td>
                <td>Rp <?= number_format($m['harga'], 0, ',', '.');?></td>
                <td><form action="delete/menu" method="POST">
                    <input type="hidden" name="table" value="menu">
                    <input type="hidden" name="del" value="<?= $m['id'];?>" >
                    <button class="delete" type="submit">Hapus</button>
                </form></td>
                <td><form action="<?= base_url('edit/menu');?>" method="POST">
            <input type="hidden" name="Nama" id="Nama" value="<?=$m['nama_menu']?>">

            <input type="hidden" name="table" id="table" value="menu">

            <input type="hidden" name="id" id="id" value="<?=$m['id']?>">
            
            <input type="hidden" name="kategori" id="kategori" value="<?=$m['kategori']?>">
            
            <input type="hidden" name="Harga" id="Harga" value="<?=$m['harga']?>"></input>
            
            <button class="edit-button" type="submit">Edit</button>
        </form>
    </td>
</tr>
</tbody>
<?php $i++;?>
<?php endforeach; ?>
Showing <?= $i-1;?> records
</table>
<?php };?>
</div>

<script>
  function sortTableAsc(j) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  
  while (switching) {
    
    switching = false;
    rows = table.rows;
    
    for (i = 1; i < (rows.length - 1); i++) {
    
      shouldSwitch = false;
    
      x = rows[i].getElementsByTagName("td")[j];
      y = rows[i + 1].getElementsByTagName("td")[j];
    
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
             function sortTableDsc(j) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  
  while (switching) {
    
    switching = false;
    rows = table.rows;
    
    for (i = 1; i < (rows.length - 1); i++) {
    
      shouldSwitch = false;
    
      x = rows[i].getElementsByTagName("td")[j];
      y = rows[i + 1].getElementsByTagName("td")[j];
    
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

        document.getElementById('sortMenu').onclick = function change(){
        
            var row = document.getElementById('sortMenu');
            if (row.innerText == 'expand_less' ) {
                
                row.textContent = "expand_more";

                sortTableAsc(0);
                
            } else {
                row.textContent = "expand_less";
                sortTableDsc(0);
                
            }

        }
        document.getElementById('sortCat').onclick = function change(){
        
            var row = document.getElementById('sortCat');
            if (row.innerText == 'expand_less' ) {
                
                row.textContent = "expand_more";

                sortTableAsc(1);
                
            } else {
                row.textContent = "expand_less";
                sortTableDsc(1);
                
            }

        }

    $('#makeCategory').on('click', function(e) {
        e.preventDefault();
      var newCategory = $('#newCategory').val();
      $.ajax({
          method : 'POST',
          url : '<?= base_url()."add/category"?>',
          dataType : 'json',
          data : { kategori : newCategory },
          success : function(data){
                var category = document.getElementById("kategori");
                var data = data.nama_kategori;
                print = `<option value='${data}'>${data}</option>`
                category.innerHTML += print;
                console.log(data);
          }
      });
    });
    
    
    let moda1 = document.querySelector(".moda1");
    let trigger = document.querySelector(".trigger");
    let closeButton = document.querySelector(".close-button");     

      function toggleModal() {
        moda1.classList.toggle("show-moda1");
      }
    
      function windowOnClick(event) {
        if(event.target === moda1) {
          toggleModal();
        }
      }
      
      trigger.addEventListener("click", toggleModal);
      closeButton.addEventListener("click", toggleModal);
      window.addEventListener("click", windowOnClick);

      let categoryForm = document.querySelector(".form-category")
      function showform(){
        categoryForm.classList.toggle("show-category-form");
      }
      function windowOnClick(event) {
        if(event.target === categoryForm) {
          showform();
        }
      };



    </script>
</body>
</html>