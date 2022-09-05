<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>SIABWAN-UWP | <?= $title;?> </title>
  <style type="text/css">

  </style>
</head>
<body>
<h1 style="text-align: center; padding-top: 40px;">Cetak Laporan Kehadiran Karyawan</h1>
  <div> Dari Tanggal : <strong> <?= date('d F Y', strtotime($tanggalAwal))?> </strong>, Sampai Tanggal : <strong> <?= date('d F Y', strtotime($tanggalAkhir));?> </strong>. Departemen : <strong><?= $departemenn?></strong>. Nama Karyawan : <strong><?= $nama_karyawan?></strong> </div>
  <table border="1" width="100%">
    <thead style="text-align: center;">
      <tr>
        <td>No.</td>
        <td style="width: 20%;">NIDN / NIDK / NIK</td>
        <td>Nama</td>
        <td>Departemen</td>
        <td>Tanggal</td>
        <td>Jam Masuk</td>
        <td>Jam Pulang</td>
        <td>Keterangan</td>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ?>
      <?php foreach($cetak_laporan as $data): ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $data['nik']; ?></td>
        <td><?= $data['nama_karyawan']; ?></td>
        <td><?= $data['departemen']; ?></td>
        <td><?= date('d F Y', strtotime($data['tgl'])); ?></td>
        <td><?= $data['jam_masuk']; ?></td>
        <td><?= $data['jam_keluar']; ?></td>
        <td><?= $data['keterangan']; ?></td>
      </tr>
      <?php $no++ ?>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
