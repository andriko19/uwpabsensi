<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('admin');?>"> <i class="fas fa-address-card"></i> SIAWAN-UWP</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">A-UWP</a>
    </div>

    <?php if ($user['role'] == 'administrator') { ?>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>

        <li <?= $this->uri->segment(2) == 'index.php' || $this->uri->segment(2) == '' ? 'class="nav-item active"' : '' ?> class="nav-item">
          <a href="<?= base_url('admin');?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Starter</li>

        <li <?= $this->uri->segment(2) == 'departemen' ? 'class="nav-item active"' : '' ?> class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/departemen');?>"><i class="fas fa-users"></i> <span>Data Departemen</span></a>
        </li>

        <li <?= $this->uri->segment(2) == 'karyawan' ? 'class="nav-item active"' : '' ?> class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/karyawan');?>"><i class="fas fa-users"></i> <span>Data Karyawan</span></a>
        </li>

        <li <?= $this->uri->segment(2) == 'records_kehadiran' ? 'class="nav-item active"' : '' ?> class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/records_kehadiran');?>"><i class="fas fa-address-card"></i> <span>Records Kehadiran</span></a>
        </li>
        
        <li <?= $this->uri->segment(2) == 'laporan' ? 'class="nav-item active"' : '' ?> class="nav-item">
          <a class="nav-link" href="<?= base_url('admin/laporan');?>"><i class="fas fa-clipboard-list"></i> <span>Laporan Detail Kehadiran</span></a>
        </li>
      </ul>
    <?php } else { ?>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>

        <li <?= $this->uri->segment(2) == 'index.php' || $this->uri->segment(2) == '' ? 'class="nav-item active"' : '' ?> class="nav-item">
          <a href="<?= base_url('superadmin');?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>

        <li class="menu-header">Starter</li>

        <li <?= $this->uri->segment(2) == 'records_kehadiran' ? 'class="nav-item active"' : '' ?> class="nav-item">
          <a class="nav-link" href="<?= base_url('superadmin/records_kehadiran');?>"><i class="fas fa-address-card"></i> <span>Records Kehadiran</span></a>
        </li>
        
      </ul>
    <?php  } ?>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href=# class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> BIRO SDM UWP
      </a>
    </div>
  </aside>
</div>
