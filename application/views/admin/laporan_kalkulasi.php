<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> <?= $title; ?></h1>
    </div>

    <div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>

    <div class="card mb-4 mt-3">
      <div class="card-header">
        <?php echo form_open_multipart('admin/laporan_kalkulasi');?>
          <div class="row ">
            <div class="form-group" style="padding-right: 5px;">
              <label>Dari Tanggal :</label>
              <input type="date" class="form-control" name="tanggalAwal" id="tanggalAwal" required="" style="height: 40px;">
            </div>
            <div style="width: 0px; height: 78px; border: 1px #000 solid;"></div>
            <div class="form-group" style="padding-left: 5px; padding-right: 5px;">
              <label>Sampai Tanggal :</label>
              <input type="date" class="form-control" name="tanggalAkhir" id="tanggalAkhir" required="" style="height: 40px;">
            </div>
            <div style="width: 0px; height: 78px; border: 1px #000 solid;"></div>
            <div class="form-group col-md-3" style="padding-left: 5px; padding-right: 5px;">
              <label>Departemen :</label>
              <select class="form-control" name="departemen" style="height: 40px;">
                <option selected="0"></option>
                <?php foreach($departemen as $data) : ?>
                  <option value="<?php echo $data['nama_departemen'];?>"> <?php echo $data['nama_departemen']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div style="width: 0px; height: 78px; border: 1px #000 solid;"></div>
            <div class="form-group" style="padding-left: 5px; padding-right: 5px;">
              <label>Nama Karyawan :</label>
              <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" style="height: 40px;">
            </div>
            <div style="width: 0px; height: 78px; border: 1px #000 solid;"></div>
            <div class="form-group" style="padding-left: 5px;">
              <div>
                <button type="reset" class="btn btn-warning" style="width: 95px;">Reset</button>
              </div>
              <div class="mt-1">
                <button type="submit" class="btn btn-primary" id="btn_tampil" style="width: 95px;">Tampilkan</button>
              </div>
            </div>
          </div>
        <?php echo form_close();?>
      </div>
      <div class="card-body">
        <a href="" target="blank" class="btn btn-dark mb-2" id="cetak" style="width: 95px;">Cetak</a>
        <div class="table-responsive">
          <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
            <?php if ($tanggalAwal = empty($tanggalAwal)) { ?>
              <div class="mb-2"></div>
            <?php } else { ?>
              <div class="mb-2"><?= $subtitle;?></div>
            <?php } ?>
            <thead>
              <tr>
                <td>No.</td>
                <td>NIDN / NIDK / NIK</td>
                <td>Nama</td>
                <td>Departemen</td>
                <td>Hadir</td>
                <td>Sakit</td>
                <td>Izin</td>
                <td>Cuti</td>
              </tr>
            </thead>
            <tbody id="Tampil">
              <!-- <?php $no = 1 ?>
              <?php foreach($laporan as $data): ?>
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
              <?php endforeach; ?> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#nama_karyawan").autocomplete({
      source: "<?php echo site_url('Admin/get_nama_karyawan');?>",
      select:function(event, ui){
        $('[name="nama_karyawan"]').val(ui.item.label);
      } 
    });
  });
</script>