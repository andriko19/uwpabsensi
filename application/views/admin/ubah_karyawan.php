<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> <?= $title; ?></h1>
    </div>

    <div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url() ;?>admin/karyawan" class="btn btn-icon icon-left btn-info"><i class="fas fa-angle-double-left"></i> Kembali</a>
          </div>
          <div class="card-body">
            <?php echo form_open_multipart('admin/ubah_karyawan');?>
            <input type="hidden" class="form-control" name="id_karyawann" id="id_karyawan" value="<?= $karyawan['id_karyawan'];?>">
            <input type="hidden" class="form-control" name="fotolama" id="id_karyawan" value="<?= $karyawan['foto'];?>">
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIDN/NIDK/NIK</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="nik" id="nik" value="<?= $karyawan['nik'];?>" readonly=""> <?= form_error('nik', '<b class="text-danger">', '</b>');?>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Karyawan</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="<?= $karyawan['nama_karyawan'];?>"> <?= form_error('nama_karyawan', '<b class="text-danger">', '</b>');?>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Departemen</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control selectric" name="departemen">
                  <option selected="0">select..</option>
                    <?php foreach($departemen as $data) : ?>
                      <option value="<?php echo $data['nama_departemen'];?>" <?php if($data['nama_departemen'] == $karyawan['departemen']){echo "selected";}?>> <?php echo $data['nama_departemen']; ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
              <div class="col-sm-12 col-md-7">
                <div class="row">
                  <div class="col-md-3">
                    <img src="<?= base_url();  ?>assets/uploads/foto/<?= $karyawan['foto'];?>" class="img-thumbnail">
                  </div>
                  <div class="col-md-9">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="foto" name="foto" aria-describedby="inputGroupFileAddon03">
                      <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                    </div>
                      <b class="text-danger">Max Upload : 2 MB (jpg|png).</b> <br>
                      <b class="text-danger">Max Resolusi : 800x800 px.</b>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </div>
           <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>