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
            <a href="<?= base_url() ;?>admin/records_kehadiran" class="btn btn-icon icon-left btn-info"><i class="fas fa-angle-double-left"></i> Kembali</a>
          </div>
          <div class="card-body">
            <?php echo form_open_multipart('admin/tambah_records_kehadiran');?>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIDN/NIDK/NIK</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="nik" id="nik" value="<?= set_value('nik');?>"> <?= form_error('nik', '<b class="text-danger">', '</b>');?>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Karyawan</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" readonly="" value="<?= set_value('nama_karyawan');?>"> <?= form_error('nama_karyawan', '<b class="text-danger">', '</b>');?>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Departemen</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" class="form-control" name="departemen" id="departemen" readonly="" value="<?= set_value('departemen');?>"> <?= form_error('departemen', '<b class="text-danger">', '</b>');?>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal</label>
              <div class="col-sm-12 col-md-2">
                <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= set_value('tanggal');?>"> <?= form_error('tanggal', '<b class="text-danger">', '</b>');?>
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
              <div class="col-sm-12 col-md-7">
                <select class="form-control selectric" name="keterangan">
                  <option value="Sakit">Sakit</option>
                  <option value="Izin">Izin</option>
                  <option value="Cuti">Cuti</option>
                </select>
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

<script type="text/javascript">
  $(document).ready(function(){
    $("#nik").autocomplete({
      source: "<?php echo site_url('Admin/get_autocomplete');?>",
      select:function(event, ui){
        $('[name="nik"]').val(ui.item.label);
        $('[name="nama_karyawan"]').val(ui.item.nama_karyawan);
        $('[name="departemen"]').val(ui.item.departemen);
      } 
    });
  });
</script>