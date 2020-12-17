<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- css font-awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  </head>
  <body>

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="register-box">
        <div class="login-logo">
          <h2 style="text-align: center; margin-bottom: 10%">Registrasi</h2>
        </div>
          <div class="card">
            <div class="card-body register-card-body">
              <!-- <p class="login-box-msg">Register a new account</p> -->

              <?php if (!empty(session()->getFlashdata('validate'))) {
              ?>
                <div class="alert alert-danger" role="alert">
                  <?= $validate->listErrors(); ?>
                </div>
              <?php } ?>

              <?php if (!empty(session()->getFlashdata('success'))) { ?>

                <div class="alert alert-success">
                  <?php echo session()->getFlashdata('success'); ?>
                </div>
              <?php } ?>
              <?php if (!empty(session()->getFlashdata('info'))) { ?>

                <div class="alert alert-primary">
                  <?php echo session()->getFlashdata('info'); ?>
                </div>
              <?php } ?>
              <?php if (!empty(session()->getFlashdata('warning'))) { ?>

                <div class="alert alert-danger">
                  <?php echo session()->getFlashdata('warning'); ?>
                </div>
              <?php } ?>

              <form action="/Auth/register" method="post">

                <?= csrf_field(); ?>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="username" placeholder="Username" value="<?= old('username'); ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                <!-- <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" value="<?= old('email'); ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div> -->
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" value="<?= old('password'); ?>">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                  <div class="col-5">
                    <div class="input-group mb-3">
                      <select class="form-control" name="level">
                        <option value="penjual">Penjual</option>
                        <option value="pembeli">Pembeli</option>
                      </select>
                    </div>
                  </div>
                </div> -->
                <div>
                    <a href="<?= base_url('Auth/v_login')?>">Sudah punya akun?</a>
                </div>
                <div class="row justify-content-end">
                  <div class="col-6 mt-3">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

