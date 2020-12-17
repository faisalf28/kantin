<!-- Page Content -->
<div class="container">

<div class="row">

<div class="col-lg-3">

    <h1 class="my-4">Daftar Kedai</h1>
    <div class="list-group">
        
        
        <ul id="">
        <li><a href="<?= base_url('penjual/tambah/'.$data['id_penjual'])?>" class="list active">tambah menu </a></li>
        <li><a href="<?= base_url('penjual/transaki/'.$data['id_penjual'])?>" class="list active">transaksi </a></li>
        </ul>

        
        
    </div>


  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
  
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
  <a class="navbar-brand" href="#">Can'tthin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/')?>">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</div>
</nav>
        <div class="row">

          
          <?php foreach($barang as $u => $data) { ?>	
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#" style='height: 40%'><img style='height: 100%' class="card-img-top" src="../../assets/img/<?php echo $data['gambar_barang'] ?> " alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $data['nama_barang'] ?></a>
                  </h4>
                  <h5>Rp.&nbsp;<?php echo $data['harga_barang']?></h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
          <?php } ?>
          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
