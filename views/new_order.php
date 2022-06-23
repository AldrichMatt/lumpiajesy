<?php include 'header.php' ;?>
<div class="container">
    <button class="trigger" onclick="location.href='<?= base_url('order')?>'">Kembali</button>
    <br>
    <br>
    <form action="<?= base_url('add/order') ?>" method="POST">
        <h3>Customer</h3>
        <input:l>Nama Customer</input:l>
        <select name="nama" id="nama">
            <?php foreach ($cust as $c ):?>
                <option id="" value="<?=$c['Nama'];?>"><?=$c['Nama'];?> (<?=$c['Telepon'] ?>)</option>
            <?php endforeach;?>
        </select>
        <input type="hidden" name="nama_cust" id="nama_out">
        <input type="hidden" name="menu" id="menu_out">
        <input type="hidden" name="total_harga" id="total_out">
        <br>
        <br>
        
            <input:l>Cari nama pelanggan</input:l><br>
            <input type="text" name="search" id="search" placeholder="Nama Pelanggan">
            <button type="reset">x</button>
        
        <br>
        <br>
            <button type="button" onclick="showform()" id="category_add">Tambah Customer</button>
            <br>
            <br>
            <div class="form-category">
                <input:l>Nama Customer</input:l>
                <br>
                <input type="text" name="nama" id="newnama" placeholder="Nama Customer">
                <br>
                <input:l>Nomor Telepon Customer</input:l>
                <br>
                <input type="tel" name="telepon" id="newtelepon" placeholder="08xx-xxxx-xxxx">
                <?= form_error('telepon', '<small class="text-danger">', '</small')?>
                <br>
                <br>
                <input type="submit" name="makeCustomer" id="makeCustomer" onclick="showform()" value="Tambah Customer"></input>
            </div>

                <hr>

            <h3>Menu</h3>
            <br>
            <input:l>Kategori</input:l>
            <select name="order_kategori" id="order_kategori">
                    <option value="">--Pilih Kategori--</option>
                <?php foreach ($kategori as $k ) :?>
                    <option value="<?=$k['nama_kategori']?>"><?=$k['nama_kategori']?></option>
                <?php endforeach;?>
            </select> 
            <input:l>Menu</input:l>
            <select name="order_menu" id="order_menu">
                
                
            </select>
            <input type="number" class="jumlah" name="jumlah" id="jumlah" placeholder="0"></input>
            <button type="button" id="tambah_menu_order">Tambahkan</button>
            <br><br>
            <input type="hidden" id="row_total">
            <table id="table_order" class="table">
                <thead>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Hapus</th>
                </thead>
                <tbody id="order_table">
                    <input type="hidden" id="current_row">
                </tbody>
            </table>
            <br><br>
            <div class="price-container">
            <label class="sub">Subtotal</label><label id="subtotal" class="subtotal"></label>
            </div>
            <br><br>
            <input:l>Tanggal Pengambilan Order</input:l>
            <input type="datetime-local" name="pengambilan" id="pengambilan"> </input>
            

            <br><br>
            <input:l>Ongkos Kirim</input:l>
            <input type="text" name="ongkir" id="ongkir">

            <br><br>
             <div class="price-container">
             <label class="sum">Total</label><label id="total" class="total"></label>
            </div>
            <br>
            <br>

            <button id="submit">Buat Order</button>
    </form> 
</div>
    







</body>
<script>
     
    function getOrder(){
        var rincianOrder = '';
        var TableOrder = new Array();
        $('#order_table tr').each(function(index, tr){
                            var i = 0;
                            var tds = $(tr).find('td');
                    TableOrder[i++]= {
                        'orderan' : $(tr).find('td:eq(0)').text() + $(tr).find('td:eq(2)').text()    
                    }
                var orderTableString = JSON.stringify(TableOrder[0]['orderan']);
                var orderTableStringFormat = orderTableString.replaceAll('"', '');
                rincianOrder += orderTableStringFormat + ',';
                return orderTableString;
                
            });
            return rincianOrder;
    };
    function getPrice(){
        var price = new Array();
        var TableOrder = document.getElementById('table_order');
        var TableRow = document.getElementById('table_order').rows.length;
            var y = 3
        try {
            for (let x = 1; x <= TableRow; x++) {
        price.push(parseFloat(TableOrder.rows[x].cells[3].innerText));
        }
        } catch (error) {
            
        
        }
        
        return price
        };

$('#submit').on('click', function(e){
        var Order = getOrder();
        var Nama = document.getElementById('nama').value;
        var TotalText = document.getElementById('total').innerText;
        $('#nama_out').val(Nama);
        $('#menu_out').val(Order);
        $('#total_out').val(TotalText);
    });
    console.log(TotalText);
    $('#tambah_menu_order').on('click', function(e) {
        e.preventDefault();
        var Kategori = $('#order_kategori').val();
        var Menu = $('#order_menu').val();
        var Jumlah = $('#jumlah').val();
        $.ajax({
            method : 'POST',
            url : '<?= base_url('order/temp');?>',
            dataType : 'json',
            data : {Kategori : Kategori, Menu : Menu, Jumlah : Jumlah},
            success : function(data){
                
                var rowInput = document.getElementById('row_total');
                var currentRow = document.getElementById('current_row');
                var orderTable = document.getElementById('order_table');
                var subtotal = document.getElementById('subtotal')
    var orderTableRow = orderTable.rows.length;
    var orderKategori = data.kategori;
    var orderMenu = data.menu;
    var orderJumlah = data.jumlah;
    var orderHarga = data.harga;
    
    
    
    
    $('#order_table').append(
        `
        <tr>
        <td><input type='hidden' name="menu${orderTableRow}" value ='${orderMenu}'</input> ${orderMenu}</td>
        <td><input type='hidden' name="kategori${orderTableRow}" value ='${orderKategori}'</input> ${orderKategori}</td>
        <td><input type='hidden' class ="qty"  name="jumlah${orderTableRow}" value ='${orderJumlah}'</input> ${orderJumlah}</td>
        <td><input type='hidden' class="harga" name="harga${orderTableRow}" value ='${orderHarga}'</input>${orderHarga}</td>
        
        <td><a class="remove"> Hapus </a></td>
        </tr>
        `
        )
        rowInput.value = orderTableRow;
        
        $('#order_table').on('click', '.remove', function () {

          $(this).closest('tr').remove();
    });
    } , 
    complete : function(){
        var Total = getPrice();
        
        var ongkir = parseFloat($('#ongkir').val());
        if(ongkir == NaN){
            ongkir = 0;
        }
        var TotalText = document.getElementById('total'); 
        var SubtotalText = document.getElementById('subtotal');
        
        
        TotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(0 + ongkir);
        
        SubtotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(0);
        $('#ongkir').on('change', function(e){
             var Total = getPrice();
        
             var ongkir = parseFloat($('#ongkir').val());
             var TotalText = document.getElementById('total'); 
             TotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(Total.reduce(Plus)+ongkir);
            });
            
            TotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(Total.reduce(Plus));
            
            SubtotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(Total.reduce(Plus));
        
        $('.remove').on('click', function () {
            $(this).closest('tr').remove();
            var menuPrice = getPrice();
            var ongkir = parseFloat($('#ongkir').val());
        
            if(menuPrice.length === 0){
                SubtotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(0);
                TotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(ongkir);
            } else{
                
                menuPrice = menuPrice.sort(function(a, b){return a - b});
                SubtotalPrice = menuPrice.reduce(Plus);
                TotalPrice = SubtotalPrice + ongkir;
                console.log(ongkir);
                console.log(TotalPrice);    
                SubtotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(SubtotalPrice);
                TotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(TotalPrice);
            }
        });


        function Plus(total, num){
            return total + num;
        }
        
        
    }
    });

});


   
                    

    $('#makeCustomer').on('click', function(e) {
        e.preventDefault();
      var Nama = $('#newnama').val();
      var Telepon = $('#newtelepon').val();
      $.ajax({
          method : 'POST',
          url : '<?= base_url()."add/newcust"?>',
          dataType : 'json',
          data : { Nama : Nama, Telepon : Telepon },
          success : function(data){
                var newCust = document.getElementById("nama");
                var nama = document.getElementById("nama");
                var category = document.getElementById("kategori");
                var newNama = data.Nama;
                var newTelepon = data.Telepon;
                nama.innerHTML += `<option value='${newNama}'>${newNama} (${newTelepon})</option>`;

          }     
      });
    });

    $('#search').on('change', function(e){
        e.preventDefault();
        var searchKey = $('#search').val();
        console.log(searchKey);
        var custSearchRes = document.getElementById('nama')
        $.ajax({
            method:'POST',
            url :'<?= base_url('Order/search') ?>',
            dataType : 'json',
            data : {searchkey : searchKey},
            success : function(data){
                var SearchRes = data
                let text = '';

                data.forEach(searchres)

                custSearchRes.innerHTML = text;

                function searchres(item, index){
                    text += `
                        <option id="" value="${item['Nama']}">${item['Nama']} (${item['Telepon']})</option>
                    `;
                }
            }
        }); 
    });

    $('#order_kategori').on('change', function(e){
        e.preventDefault();
        var kategori = $('#order_kategori').val();
        $.ajax({
            method:'GET',
            url : '<?= base_url('order/onchange')?>',
            dataType : 'json',
            data : {kategori : kategori},
            success : function(data){
                
                var arrayLength = data.kategori_array.length
                var i = 0;
                var print='';

                for (let i = 0; i < arrayLength; i++) {
                    var selectedMenu = data.kategori_array[i];
                    print += "<option id='menu' value='"+selectedMenu['nama_menu']+"'>"; 
                    print += selectedMenu['nama_menu'];
                    print += '</option>';
                }
                document.getElementById('order_menu').innerHTML = print;
            }
        });

    });

    let categoryForm = document.querySelector(".form-category")
      function showform(){
        categoryForm.classList.toggle("show-category-form");
        var changeButton = document.getElementById('category_add').innerText;
        if(changeButton == 'Tambah Customer'){
        document.getElementById('category_add').innerHTML = 'Kembali';
    } else {
            document.getElementById('category_add').innerHTML = 'Tambah Customer';
        }
    }
    function windowOnClick(event) {
        if(event.target === categoryForm) {
            showform();
        }
      };

    var SubtotalText = document.getElementById('subtotal');
    var TotalText = document.getElementById('total');

    TotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(0);
    SubtotalText.innerHTML = new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR" }).format(0);
</script>
</html>