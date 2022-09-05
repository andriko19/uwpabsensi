<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SIABWAN-UWP | <?= $title;?> </title>
  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
    }
    .container {
      width: 100%;
      height: 100vh;
      display: flex;
      /*background-color: black;*/
      justify-content: center;
      align-items: center;
      /*text-align: center;*/
    }
    .container .card {
      width: 200px;
      height: 324px;
      border: 3px solid rgb(4, 8, 15);
      border-radius: 10px;
      /*background-color: red;*/
      background-image: url(<?php echo base_url("assets/img/Polos.jpg");?>);
      background-size: cover;
      background-repeat: no-repeat;
      position: relative;
      margin-left: 235px; 
    }
  </style>
</head>
<body>
<h1 style="text-align: center;">Cetak Barcode</h1>
<div class="container">
  <div class="card">
    <div style="text-align: center; margin-top: 81px; border-radius: 10px;">
      <img style="width: 100px;" src="<?= base_url('assets/uploads/foto/'). $barCode['foto'];?>"> <br>
      <p style="margin-top: 8px;"> <?= $barCode['nama_karyawan'];?></p> <br>
      <p style="margin-top: -35px;"> <?= $barCode['departemen'];?></p>
      <img style="width: 100px; height: 50px; margin-top: -6px;" src="<?= base_url('assets/uploads/imgqrcode/'). $barCode['qrcode'];?>">
    </div>
  </div>
</div>
</body>
</html>
