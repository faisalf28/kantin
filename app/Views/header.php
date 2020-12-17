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
  <link href="../../assets/vendor/font-awesome/css/fontawesome.min.css" rel="stylesheet">

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


  <!-- Page Content -->
  <div class="container">

    <div class="row">

    <div class="col-lg-3">

        <h1 class="my-4">Daftar Kedai</h1>
        <div class="list-group">
            
			<?php foreach($penjual as $u => $data) { ?>
			<ul id="">
            <li><a href="<?= base_url('home/detail/'.$data['id_penjual'])?>" class="list active"><?php echo $data['nama_kedai']?> &nbsp;-&nbsp; <?php echo $data['nama_penjual']?> </a></li>
			</ul>

			<?php } ?>
			
        </div>


      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
	  
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