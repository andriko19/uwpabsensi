<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> <?= $title; ?></h1>
    </div>

    <div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>

    <div class="card mb-4 mt-3">
      <div class="card-header">
        <a href="<?= base_url() ;?>admin/tambah_departemen" class="btn btn-primary"><i class="far fa-edit"></i> Tambah <?= $title;?></a> 
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <td>No.</td>
                <td>Nama Departemen</td>
                <td>Created At</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1 ?>
                <?php foreach($departemen as $data): ?>
                <tr>
                  <td><?= $no ?></td>
                  <td><?= $data['nama_departemen']; ?></td>
                  <td><?= date('d F Y', strtotime($data['created_at']));?></td>
                  <td>
                    <a href="<?= base_url('admin/ubah_departemen/').$data['id_departemen'];?>" class="btn btn-icon btn-success"><i class="fas fa-user-edit"></i></a> ||
                    <a href="<?= base_url('admin/hapus_departemen/').$data['id_departemen'];?>" id="btn-hapus" class="btn btn-icon btn-danger"><i class="fas fa-trash-alt"></i></a>
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
