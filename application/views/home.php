
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIAWAN-UWP</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url(); ?>assets/img/favicon.png" rel="apple-touch-icon">
  <!-- v4GfYD_2SHza*iZ -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url(); ?>/vendor/Medilab/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/Medilab/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/Medilab/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/vendor/Medilab/assets/vendor/animate.css/animate.min.css" rel="stylesheet">

   <!-- Template sweetalert2 CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/sweetalert2/sweetalert2.min.css">

  <!-- Animate CSS-->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/sweetalert2/animate.min.css">

  <!-- Template Main CSS File -->
  <link href="<?= base_url(); ?>/vendor/Medilab/assets/css/style.css" rel="stylesheet">

  <style type="text/css">
    #hero {
      width: 100%;
      height: 90vh;
      background: url(<?php echo base_url("assets/img/home2.jpg");?>) top center;
      background-size: cover;
      position: relative;
      margin-bottom: -200px;
    } 
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-web"></i> <a href="https://uwp.ac.id/">uwp.ac.id</a>
        <i class="icofont-google-map"></i> Jalan Raya Benowo 1-3, Surabaya, Jawa Timur - Indonesia
      </div>
      <div class="social-links">
        <a href="https://twitter.com/uwp_news" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/uwpnews/" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/uwp_news/" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCSY4nXvqTKsuFgCl9AVMbOA?pbjreload=10" class="skype"><i class="icofont-youtube-play"></i></a>
        <a href="https://api.whatsapp.com/send/?phone=628113700023&text&app_absent=0" class="linkedin"><i class="icofont-whatsapp"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="#">SIAWAN - UWP</a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
         <!--  <li class="active"> -->
            <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle tgl">
              <?php
                if (function_exists('date_default_timezone_set'))
                date_default_timezone_set('Asia/Jakarta');
              ?>
              <span id="clock"></span>
            </a>
          <!-- </li> -->
        </ul>
      </nav>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
        </div>
        <div class="col-lg-4 d-flex align-items-stretch">
        </div>
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <div class="card card-primary" style="border-radius: 10px; text-align: center;">
              <div class="card-header" style="text-align: center !important;">
                <h4 class="text2"> SIstem Absensi karyaWAN Universitas Wijaya Putra</h4>
              </div>

              <div class="card-body">
                <?php echo form_open_multipart('home/absen');?>
                  <div class="form-group">
                    <label for="email">NIDN / NIDK / NIK</label>
                    <input id="email" type="text" class="form-control" name="nik" autofocus>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                <?php echo form_close();?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="content"> 
              <h3 style="text-align: center !important;">Apa itu SIAWAN ?</h3>
              <p style="text-align: justify !important; text-indent: 20px">
                SIAWAN atau bisa disebut juga Sistem Absensi Karyawan merupakan media absensi kehadiran karyawan Universitas Wijaya Putra. Sebab dikembangkannya SIAWAN ialah tidak lain dan tidak bukan karena dampak dari Covid-19 yang mengharuskan semua masyarakat khususnya karyawan perkantoran harus mematuhi anjuran pemerintah terkait protokol kesehatan covid yang salah satunya ialah menghindari sentuhan secara langsung khususnya menyentuh barang yang mana barang tersebut digunakan oleh banyak orang. Dengan dikembangkannya SIAWAN ini semua karyawan UWP tidak perlu khawatir karena SIAWAN sudah dilengkapi scan barcode untuk melakukan absensi kehadiran hal ini akan meminimalisir sentuhan secara langsung dengan perangkat absensi. 
              </p>
            </div>
          </div>
          <div class="col-lg-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-6 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0" style="padding-left: 5px;">
                    <i class='bx bx-barcode-reader'></i>
                    <h4>Tata cara absensi</h4>
                    <ol>
                      <li><p style="text-align: justify;">Tempelkan Id card (Gambar barcode) pada barcode scanner.</p></li>
                      <li><p style="text-align: justify;">Tunggu sampai barcode scanner berbunyi (Titt.. ).</p></li>
                      <li><p style="text-align: justify;">Akan muncul popup yang memberikan informasi bawah anda sedang absen datang atau absen pulang (Beserta jamnya).</p></li>
                      <li><p style="text-align: justify;">Selesai, anda sudah berhasil melakukan absensi.</p></li>
                    </ol>
                  </div>
                </div>
                <div class="col-xl-6 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0" style="padding-left: 5px;">
                    <i class='bx bxs-cog'></i>
                    <h4>Fitur SIAWAN</h4>
                     <ol>
                      <li><p style="text-align: justify;">Menggunakan barcode scanner.</p></li>
                      <li><p style="text-align: justify;">Kelola departemen.</p></li>
                      <li><p style="text-align: justify;">Kelola data karyawan.</p></li>
                      <li><p style="text-align: justify;">Kelola recods kehadiran.</p></li>
                      <li><p style="text-align: justify;">Kelola report priode tanggal.</p></li>
                      <li><p style="text-align: justify;">Kelola report priode dan nama departemen.</p></li>
                      <li><p style="text-align: justify;">Kelola report priode, nama departemen dan nama karyawan.</p></li>
                      <li><p style="text-align: justify;">Cetak laporan PDF dan print.</p></li>
                      <li><p style="text-align: justify;">Cetak laporan Excel.</p></li>
                    </ol>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>
      </div>
    </section><!-- End Why Us Section -->
    <!-- End Contact Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          Copyright &copy; 2020 <a href="http://ict.uwp.ac.id/" style="color: #030000;" target="_blank">TIK UWP</a>.
        </div>
        <div class="credits">
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://twitter.com/uwp_news" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/uwpnews/" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/uwp_news/" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCSY4nXvqTKsuFgCl9AVMbOA?pbjreload=10" class="skype"><i class="icofont-youtube-play"></i></a>
        <a href="https://api.whatsapp.com/send/?phone=628113700023&text&app_absent=0" class="linkedin"><i class="icofont-whatsapp"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url(); ?>/vendor/Medilab/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/Medilab/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/vendor/Medilab/assets/vendor/jquery.easing/jquery.easing.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url(); ?>/vendor/Medilab/assets/js/main.js"></script>
  <script src="<?= base_url(); ?>assets/Sweetalert2/Sweetalert2.min.js"></script>

   <script type="text/javascript">
    var d = new Date();
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();
    var hari = d.getDay();
    var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    hariIni = namaHari[hari];
    var tanggal = ("0" + d.getDate()).slice(-2);
    var month = new Array();
    month[0] = "Januari";
    month[1] = "Februari";
    month[2] = "Maret";
    month[3] = "April";
    month[4] = "Mei";
    month[5] = "Juni";
    month[6] = "Juli";
    month[7] = "Agustus";
    month[8] = "September";
    month[9] = "Oktober";
    month[10] = "Nopember";
    month[11] = "Desember";
    var bulan = month[d.getMonth()];
    var tahun = d.getFullYear();
    var date = Date.now(),
        second = 1000;

    function pad(num) {
        return ('0' + num).slice(-2);
    }

    function updateClock() {
        var clockEl = document.getElementById('clock'),
            dateObj;
        date += second;
        dateObj = new Date(date);
        clockEl.innerHTML = '' + hariIni + '.  ' + tanggal + ' ' + bulan + ' ' + tahun + '. ' + pad(dateObj.getHours()) + ':' + pad(dateObj.getMinutes()) + ':' + pad(dateObj.getSeconds());
    }
    setInterval(updateClock, second);
  </script>

</body>

</html>