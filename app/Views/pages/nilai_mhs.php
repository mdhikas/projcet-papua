<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Nilai Semester</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/nilai">Nilai</a></li>
                        <li class="breadcrumb-item active">Nilai Semester</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Pilih Berdasarkan</label>
                        <select id="inputState" class="form-control mt-2">
                            <option selected disabled value="none">Pilih...</option>
                            <option value="semester">Semester</option>
                            <option value="matkul">Mata Kuliah</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col">
                                <h3 class="title-mhs">Muhammad Dhika Azizi</h3>
                            </div>
                        </div>
                        <div class="row float-right">
                            <div class="col">
                                <div class="info-box mb-4">
                                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-chart-bar"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Jumlah SKS</span>
                                        <span class="info-box-number">2</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <div class="col">
                                <div class="info-box mb-4">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chart-line"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">IPK</span>
                                        <span class="info-box-number">4.00</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered" id="semester">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width: 10px">ID</th>
                            <th style="width:10%;">Semester</th>
                            <th>Kode MK</th>
                            <th style="text-align: left;">Nama Mata Kuliah</th>
                            <th style="text-align: right;">SKS</th>
                            <th>Nilai</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <td>1.</td>
                            <td>20161</td>
                            <td>12345689</td>
                            <td style="text-align: left;">Web Design</td>
                            <td style="text-align: right;">2</td>
                            <td>A</td>
                            <td>4.00</td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" id="matkul">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width: 10px">ID</th>
                            <th>Kode MK</th>
                            <th style="text-align: left;">Nama Mata Kuliah</th>
                            <th style="text-align: right;">SKS</th>
                            <th>Nilai</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <td>1</td>
                            <td>12345689</td>
                            <td style="text-align: left;">Web Design</td>
                            <td style="text-align: right;">2</td>
                            <td>A</td>
                            <td>4.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection(); ?>