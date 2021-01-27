<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
                <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div> -->
            <div class="info">
                <a class="d-block">Monitoring KHS</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="/home" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('mahasiswa') ?>" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Mahasiswa
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/nilai" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  User
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="<?= base_url('master/jurusan') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Jurusan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('master/fakultas') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fakultas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('master/matkul') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mata Kuliah</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('master/semester') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Semester</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>