<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Nilai Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Nilai</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Kartu Hasil Studi</h3>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Semester</th>
                                    <th>Total SKS</th>
                                    <th>Total Bobot</th>
                                    <th>IPS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($nilai as $k => $v) : ?>
                                    <?php $ips = $v['nilai_bobot'] / $v['total_sks']; ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $v['semester']; ?></td>
                                        <td><?= $v['total_sks']; ?></td>
                                        <td><?= $v['nilai_bobot']; ?></td>
                                        <td><?= number_format($ips, 2); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
    </section>
</div>
<?= $this->endSection(); ?>