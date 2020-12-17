<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5 mb-5 text-center">
        <h4>Input Data </h4>
    </div>
    <div class="container">
        <h4>Form Tambah Data </h4>
        <hr>
        <?= form_open_multipart(base_url('penjual/update_barang'));  ?>
        <div class="form-group">                
                <input type="hidden" name="id_barang"class="form-control"  value="<?= $barang['id_barang']?>">
                <input type="hidden" name="id_penjual"class="form-control"  value="<?= $barang['id_penjual']?>">
            </div>             
            <div class="form-group">
                <label for="">Nama Produk</label>
                <input type="text"name="nama_barang"class="form-control" value="<?php echo $barang['nama_barang']; ?>">
            </div>       
            <div class="form-group">
                <label for="">Harga Barang</label>
                <input type="number" name="harga_barang"class="form-control" value="<?php echo $barang['harga_barang']; ?>">
            </div>     
            <div class="form-group">
                <input type="file" name="file_upload" id="" > 
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
    </div>