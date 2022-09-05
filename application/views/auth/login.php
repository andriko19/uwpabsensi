<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="<?= base_url(); ?>/assets/img/uwp-official.png" alt="logo" width="100" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal animate__animated animate__pulse animate__infinite infinite animate__slower">Welcome to <span class="font-weight-bold">SIABWAN-UWP</span></h4>
            <p class="text-muted">SIABWAN-UWP atau bisa disebut Sistem Absensi Karyawan Universitas Wijaya Piutra merupakan media absensi karyawan secara online menggunakan QRCODE. </p>
            <div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>
            <form method="post" action="<?= base_url('auth');?>">
              <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control" name="username" autofocus value="<?= set_value('username');?>"> <?= form_error('username', '<small class="text-danger">', '</small>');?>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password"> <?= form_error('password', '<small class="text-danger">', '</small>');?>
              </div>

              <div class="form-group">
                <br>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

               <div class="form-group">
                <br><br>
              </div>

              <!-- <div class="mt-5 text-center">
                Don't have an account? <a href="<?= base_url(); ?>auth/register_absensi">Create new one</a>
              </div> -->
            </form>

            <div class="text-center mt-5 text-small">
               Copyright &copy; 2020 <a href="http://ict.uwp.ac.id/" target="_blank">TIK UWP</a>.
            </div>
          </div>
        </div>
       <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url(); ?>/assets/img/gedung.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
              </div>
              <h1 class="mb-2 display-4 font-weight-bold">Gedung A</h1>
              <h5 class="font-weight-normal text-muted-transparent">Universitas Wijaya Putra</h5>
              <p><i class="fas fa-map-marker-alt" style="color: #f54245;"></i> Jalan Raya Benowo 1-3, Surabaya, Jawa Timur - Indonesia</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>