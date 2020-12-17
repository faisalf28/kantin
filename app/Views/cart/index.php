<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kantin 11</title>

  <!-- Bootstrap core CSS -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fontawesome core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link href="../../assets/css/shop-homepage.css" rel="stylesheet">

  <style>
  
    .img-fluid {
      max-width: 100%;
      height: 80vh;
    }

    img {
      width: 100vw;    
    }

	nav ul li{
      list-style:none;
  }
	nav ul li a{
		text-decoration:none;
		color:#222;
		background-color:#343a40;
		padding:10px;
		float:left;
		font-weight: bold;
	}

	nav ul li .active{
      background-color:#e32727;
      color:#fff;
		/* border-radius: 50px */
}

    @import url(./fonts/font-awesome/css/font-awesome.css);
            form,label { margin: 0; padding: 0; }
            body{ margin: 20px; }
            .content{
                width: 408px;
                border: 1px #ccc solid;
                padding: 15px;
                margin: auto;
                height: 200px;
            }
            .rating {
                border: none;
                float: left;
            }
            .rating > input { display: none; }
            .rating > label::before {
                margin: 5px;
                font-size: 1.25em;
                font-family: FontAwesome;
                display: inline-block;
                content: "\f005";
            }
            .rating > label {
                color: #ddd;
                float: right;
            }
            .rating > input:checked ~ label,
            .rating:not(:checked) > label:hover,
            .rating:not(:checked) > label:hover ~ label {
                color: #f7d106;
            }
            .rating > input:checked + label:hover,
            .rating > input:checked ~ label:hover,
            .rating > label:hover ~ input:checked ~ label,
            .rating > input:checked ~ label:hover ~ label {
                color: #fce873;
            }
            h4 {
                font-weight: normal;
                margin-top: 40px;
                margin-bottom: 0px;
            }
            #hasil {
                font-size: 20px;
            }
            #star {
                float: left;
                padding-right: 20px;
            }
            #star span{
                padding: 3px;
                font-size: 20px;
            }
            .on { color:#f7d106 }
            .off { color:#ddd; }
  </style>

</head>

<body>
	  
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('home')?>">Can'tthin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a activeClassName="active" class="nav-link" href="<?= base_url('home')?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Auth/logout')?>">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
			
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('ul li a').click(function(){
				$('li a').removeClass("active");
				$(this).addClass("active");
			});
		});
	</script>


    <div class="container ">
        
        <div class="card">
            <div class="card-header"><h1 class="text-center">Daftar Pesanan</h1></div>
                <div class="card-body">
                    <!-- tampilkan pesan success -->
                    <?php if(session()->getFlashdata('success') != null){ ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                    <?php } ?>
                    <!-- selesai menampilkan pesan success -->
                    <?php if(count($items) != 0){ // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: ?>
                    <div class="table-responsive">
                        <?php echo form_open('cart/update'); ?>
                        <table class="table table-bordered" style="text-align: center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Porsi</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $key => $data) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $data['nama_barang']; ?></td>
                                    <td><img src="assets/img/<?php echo $data['gambar_barang']; ?>" style="width: 100px"></td>
                                    <td style="width:50px"><?php echo $data['quantity']; ?></td>
                                    <td>Rp. <?php echo number_format($data['harga_barang'], 0, 0, '.'); ?></td>
                                    <td>Rp. <?php echo number_format($data['quantity'] * $data['harga_barang'], 0, 0, '.'); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <!-- <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button> -->
                                            <a href="<?php echo base_url('cart/remove/'.$data['id_barang']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang?')"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5" class="text-right">Jumlah</td>
                                    <td>Rp. <?php echo number_format($total, 0, 0, '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php echo form_close(); ?>
                     
                    </div>
                    <?php } // selesai menampilkan list cart dalam bentuk table ?>
 
                    <?php if(count($items) == 0){ // jika cart kosong, maka tampilkan: ?>
                    Keranjang Anda sedang kosong. <a href="<?php echo base_url('home'); ?>" class="btn btn-success">Jajan Yuk</a>
                    <?php } else { // jika cart tidak kosong, tampilkan: ?>
                        <a href="<?php echo base_url('home'); ?>" class="btn btn-success">Lanjut Jajan</a>
                        <a href="<?php echo base_url('cart/order/'.$data['id_barang']); ?>" class="btn btn-primary">Pesan sekarang</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>