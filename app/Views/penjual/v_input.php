<head>
    <title>Tambah Menu</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container mt-5 mb-5 text-center">
        <h4>Tambah Menu</h4>
    </div>
    <div class="container">
        <!-- <h4>Form Tambah Menu </h4> -->
        <hr>
        <?= form_open_multipart(base_url('penjual/tambah_aksi')); ?>
        <div class="form-group">                
                <input type="hidden" name="id_penjual"class="form-control" placeholder="...." maxlength="5" value="<?= $penjual['id_penjual']?>">
            </div>             
            <div class="form-group">
                <label for="">Nama Menu</label>
                <input type="text"name="nama_barang"class="form-control" >
            </div>       
            <div class="form-group">
                <label for="">Harga Menu</label>
                <input type="number" name="harga_barang"class="form-control">
            </div>     
            <div class="form-group">
                <input type="file" name="file_upload" id="" > 
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
    </div>
