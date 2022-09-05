<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1> <?= $title; ?></h1>
    </div>

    <div id="flash" data-flash="<?= $this->session->flashdata('message');?>"></div>

    <div class="card mb-4 mt-3">
       <div class="card-header">
        <?php echo form_open_multipart('superadmin/hapus_bulan_records');?>
          <div class="row ">
            <div class="form-group" style="padding-left: 5px; padding-right: 5px;">
              <label>Bulan :</label>
              <select class="form-control" name="bulan" style="height: 40px; width: 150px;">
                <option selected="0" value="0">Pilih Bulan..</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div style="width: 0px; height: 78px; border: 1px #000 solid;"></div>
            <div class="form-group" style="padding-left: 5px; padding-right: 5px;">
              <label>Tahun :</label>
              <select class="form-control" name="tahun" style="height: 40px; width: 150px;">
                <option selected="0" value="0">Pilih Tahun..</option>
                <?php foreach($getTahun as $data) : ?>
                  <option value="<?php echo $data->tahun;?>"> <?php echo $data->tahun;?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div style="width: 0px; height: 78px; border: 1px #000 solid;"></div>
            <div class="form-group" style="padding-left: 5px; padding-right: 5px;">
              <div>
                <button type="reset" class="btn btn-warning" style="height: 35px; width: 150px;">Reset</button>
              </div>
              <div class="mt-1">
                <button type="submit" class="btn btn-danger" style="height: 35px; width: 150px;">Hapus Records</button>
              </div>
            </div>
            <div style="width: 0px; height: 78px; border: 1px #000 solid;"></div>
          </div>
        <?php echo form_close();?>
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
