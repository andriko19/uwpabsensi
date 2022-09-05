<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> <?= $title; ?></h1>
    </div>

    <div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>

    <div class="card mb-4 mt-3">
      <div class="card-header">
        <a href="<?= base_url() ;?>admin/tambah_records_kehadiran" class="btn btn-primary"><i class="far fa-edit"></i> Tambah <?= $title;?></a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <td>No.</td>
                <td>NIDN / NIDK / NIK</td>
                <td>Nama</td>
                <td>Departemen</td>
                <td>Tanggal</td>
                <td>Jam Masuk</td>
                <td>Jam Pulang</td>
                <td>Keterangan</td>
                <td>Status</td>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1 ?>
                <?php foreach($records_kehadiran as $data): ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['nik']; ?></td>
                  <td><?= $data['nama_karyawan']; ?></td>
                  <td><?= $data['departemen']; ?></td>
                  <td><?= date('d F Y', strtotime($data['tgl'])); ?></td>
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
        </div>
      </div>
    </div>
  </section>
</div>
