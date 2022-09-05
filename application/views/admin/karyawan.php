<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> <?= $title; ?></h1>
    </div>

    <div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>

    <div class="card mb-4 mt-3">
      <div class="card-header">
        <a href="<?= base_url() ;?>admin/tambah_karyawan" class="btn btn-primary"><i class="far fa-edit"></i> Tambah <?= $title;?></a> 
        <div style="width: 0px; height: 30px; border: 1px #663 solid; padding-right: 3px;"></div>
        <a href="<?= base_url() ;?>admin/cetak_barcode_all" target="blank" class="btn btn-dark"><i class="fas fa-print"></i> Cetak Barcode All</a>
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
                <td>Foto</td>
                <td>BarCode</td>
                <td>Created At</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1 ?>
                <?php foreach($karyawan as $data): ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['nik']; ?></td>
                  <td><?= $data['nama_karyawan']; ?></td>
                  <td><?= $data['departemen']; ?></td>
                  <td><img style="width: 80px;" src="<?= base_url('assets/uploads/foto/'). $data['foto'];?>"></td>
                  <td><img style="width: 100px;" src="<?= base_url('assets/uploads/imgqrcode/'). $data['qrcode'];?>"></td>
                  <td><?= date('d F Y', strtotime($data['created_at']));?></td>
                  <td>
                    <a href="<?= base_url('admin/cetak_barcode/').$data['id_karyawan'];?>" target="blank" class="btn btn-icon btn-dark"><i class="fas fa-print"></i></a> ||
                    <a href="<?= base_url('admin/ubah_karyawan/').$data['id_karyawan'];?>" class="btn btn-icon btn-success"><i class="fas fa-user-edit"></i></a> ||
                    <a href="<?= base_url('admin/hapus_karyawan/').$data['id_karyawan'];?>" id="btn-hapus" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></a>
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
