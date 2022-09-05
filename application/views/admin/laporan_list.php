<table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <td>No.</td>
      <td>NIDN / NIDK / NIK</td>
      <td>Nama</td>
      <td>Tanggal</td>
      <td>Jam Masuk</td>
      <td>Jam Pulang</td>
      <td>Keterangan</td>
      <td>Status</td>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1 ?>
      <?php foreach($laporan as $data): ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $data['nik']; ?></td>
        <td><?= $data['nama_karyawan']; ?></td>
        <td><?= $data['tgl']; ?></td>
        <td><?= $data['jam_masuk']; ?></td>
        <td><?= $data['jam_keluar']; ?></td>
        <td><?= $data['keterangan']; ?></td>
        <td><?php if ($data['status'] == 'Masuk') { ?>
            <h4><span class="btn btn-success" style="width: 103px;"> Masuk </span></h4>
          <?php } else if ($data['status'] == 'Pulang') { ?>
            <h4><span class="btn btn-danger" style="width: 103px;"> Pulang </span></h4>
          <?php  } else { ?>
            <h4><span class="btn btn-warning" style="width: 103px;"> Tidak Masuk </span></h4>
          <?php } ?>
        </td>
      </tr>
      <?php $no++ ?>
      <?php endforeach; ?>
  </tbody>
</table>