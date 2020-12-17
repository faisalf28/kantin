
  <!-- Fontawesome core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <a class="btn btn-success float-right mb-3" href="<?php echo base_url('cart'); ?>"><i class="fa fa-cart-plus"></i> <?php echo count($total); ?></a>

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox" style="width: 100%">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="../../assets/img/nasi_ijo.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="../../assets/img/nasi_katsu.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="../../assets/img/popice.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <form method='post' action="" class="form-inline my-2 my-lg-4">
            <!-- <input class="form-control mr-sm-2" id="keyword" type="text" placeholder="Search" name="keyword"> -->
            <div>
                <input type="text" class="form-control mr-sm-2" placeholder="Search" name="keyword">
            </div>
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0" name="submit"><i class="fa fa-search"></i></button>
            </div>
        </form>


        <div class="row">        

          <?php foreach($barang as $key => $data) { ?>	

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#" style='height: 40%'><img style='height: 100%' class="card-img-top" src="assets/img/<?php echo $data['gambar_barang'] ?> " alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <!-- <a href="#"><?php echo $key + 1; ?>.</a> -->
                    <a href="#"><?php echo $data['nama_barang'] ?></a>
                  </h4>
                  <h5>Rp.&nbsp;<?php echo $data['harga_barang']?></h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                </div>
                <div class="card-footer">
                  <a href="<?php echo base_url('cart/beli/'.$data['id_barang']); ?>" class="btn btn-primary">Beli</a>
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



</html>
