<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Nilai Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/nilai') ?>">Nilai</a></li>
            <li class="breadcrumb-item active">Detail</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <?php if ($mahasiswa) : ?>
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title text-uppercase">
              <b><?= $mahasiswa['nim'] ?> - <?= $mahasiswa['nama'] ?></b>
            </h3>
          </div>
          <div class="card-body">
            <table class="table" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Semester</th>
                  <th>SKS Diambil</th>
                  <th>IP Semester</th>
                  <th>Total SKS</th>
                  <th>IP Komulatif</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $total_sks = 0;
                $total_ipk = 0;
                ?>
                <?php foreach ($nilai as $k => $v) : ?>
                  <?php
                  $total_sks += $v['jumlah_sks'];
                  $total_ipk += $v['ips'];
                  ?>
                  <tr>
                    <td><?= ++$k ?></td>
                    <td><?= $v['semester'] ?></td>
                    <td><?= number_format($v['jumlah_sks'], 2) ?></td>
                    <td><?= number_format($v['ips'], 2) ?></td>
                    <td><?= number_format($total_sks, 2) ?></td>
                    <td><?= number_format($total_ipk / $k++, 2) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php else : ?>
        <div class="card">
          <div class="card-body">
            <h3 class="text-center">Data Tidak Ditemukan</h3>
          </div>
        </div>
      <?php endif; ?>
      <div class="row">
        <div class="col">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Grafik IPS</h3>
            </div>
            <div class="card-body">
              <canvas id="chart-nilai-mhs" width="400" height="100"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $this->endSection(); ?>