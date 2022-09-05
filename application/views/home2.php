
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
 	<title>SIAWAN-UWP</title>

   <!-- Favicons -->
  <link href="<?= base_url(); ?>assets/img/favicon.png" rel="icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/components.css">
   <!-- Template sweetalert2 CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/sweetalert2/sweetalert2.min.css">

  <!-- Animate CSS-->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/sweetalert2/animate.min.css">
  <style type="text/css">
  	body {
  		background-image: url(<?php echo base_url("assets/img/laptop.jpg");?>);
      background-size: 1550px 900px;
      background-repeat: no-repeat;
      position: relative;
  	}
  	.text2 {
  		color: #b30000 !important;
      font-size: 30px !important;
  	}
  	@import url('https://fonts.googleapis.com/css?family=Supermercado+One');
		* {margin: 0; padding: 0}

		h2 {
	    font-family: 'Supermercado One', cursive;
		}
		.text {
	    position: relative;
	    display: inline-block;
	    font-size: 4rem;
	    text-transform: uppercase;
	    color: #b30000;
	    text-shadow: 3px 3px 0px #D7DACC, 8px 8px 0px rgba(0, 0, 0, 0.1);
		}
  </style>
</head>

<body>
	<div id="cover">
  <div id="app">
    <section class="section">
    	<div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>
      <div class="container" style="margin-top: 150px;">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand" style="margin-bottom: -5px;">
              <h2 class="text animate__animated animate__pulse animate__infinite infinite animate__slower" id="wrapper"> SIAWAN - UWP </h2> <br><br>
            </div>

            <div class="card card-primary" style="border-radius: 10px; text-align: center;">
              <div class="card-header" style="text-align: center !important;">
              	<h4 class="text2"> SIstem Absensi karyaWAN Universitas Wijaya Putra dengan Barcode</h4>
              </div>

              <div class="card-body">
                <?php echo form_open_multipart('home/absen');?>
                  <!-- <div class="row">
                    <div class="form-group col-6">
                      <label for="first_name">First Name</label>
                      <input id="first_name" type="text" class="form-control" name="first_name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name">
                    </div>
                  </div> -->

                  <div class="form-group">
                    <label for="email">NIDN / NIDK / NIK</label>
                    <input id="email" type="text" class="form-control" name="nik" autofocus>
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div> -->
               	<?php echo form_close();?>
                <div class="simple-footer" style="color:#030000; margin-bottom: -5px;">
                  Copyright &copy; 2020 <a href="http://ict.uwp.ac.id/" style="color: #030000;" target="_blank">TIK UWP</a>.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/stisla.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>/assets/js/page/auth-register.js"></script>
   <!-- Template Sweetalert2 JS-->
  <script src="<?= base_url(); ?>assets/Sweetalert2/Sweetalert2.min.js"></script>
</body>
</html>