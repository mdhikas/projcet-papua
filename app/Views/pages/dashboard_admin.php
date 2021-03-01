<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php if (session()->getFlashdata('pesan')) : ?>
      <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan') . user()->username; ?>
      </div>
    <?php endif; ?>
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Home</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number"><?= $jml_user; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Mahasiswa</span>
              <span class="info-box-number"><?= $jml_mahasiswa; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <!-- <div class="clearfix hidden-md-up"></div> -->
        <!-- /.col -->
        <!-- /.col -->
      </div>
    </div>

    <!-- Default box -->
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Mahasiswa</h3>
      </div>
      <div class="card-body">
        <canvas id="chart-mhs" width="400" height="100"></canvas>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">IPK Mahasiswa</h3>
          </div>
          <div class="card-body">
            <canvas id="chart-ipk" width="400" height="100"></canvas>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card card-yellow">
          <div class="card-header">
            <h3 class="card-title">Nilai Mahasiswa</h3>
          </div>
          <div class="card-body">
            <canvas id="chart-nil" width="400" height="100"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>