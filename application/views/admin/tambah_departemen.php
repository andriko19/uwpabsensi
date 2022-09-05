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
            <a href="<?= base_url() ;?>admin/departemen" class="btn btn-icon icon-left btn-info"><i class="fas fa-angle-double-left"></i> Kembali</a>
          </div>
          <div class="card-body">
            <?php echo form_open_multipart('admin/tambah_departemen');?>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Departemen</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="nama_departemen" id="nama_departemen" value="<?= set_value('nama_departemen');?>"> <?= form_error('nama_departemen', '<b class="text-danger">', '</b>');?>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
           <?php echo form_close();?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>