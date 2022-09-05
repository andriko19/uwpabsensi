<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url(); ?>/assets/img/uwp-official.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register akun baru UWP-ABSENSI</h4></div>

              <div class="card-body">
                <form method="post" action="<?= base_url('auth/register_absensi');?>">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama_depan">Nama Depan</label>
                      <input id="nama_depan" type="text" class="form-control" name="nama_depan" autofocus value="<?= set_value('nama_depan');?>"> <?= form_error('nama_depan', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group col-6">
                      <label for="nama_belakang">Nama Belakang</label>
                      <input id="nama_belakang" type="text" class="form-control" name="nama_belakang" value="<?= set_value('nama_belakang');?>"> <?= form_error('nama_belakang', '<small class="text-danger">', '</small>');?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="username">Username</label>
                      <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username');?>"> <?= form_error('username', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group col-6">
                      <label>Role</label>
                      <select class="form-control selectric" name="role">
                        <option value="administrator">Administrator</option>
                        <option value="super admin">Super Admin</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password1" class="d-block">Password</label>
                      <input id="password1" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password1"><?= form_error('password1', '<small class="text-danger">', '</small>');?>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password2">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
               Copyright &copy; 2020 <a href="http://ict.uwp.ac.id/" target="_blank">TIK UWP</a>.
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>