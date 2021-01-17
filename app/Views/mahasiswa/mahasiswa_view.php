<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Nilai</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">KHS Mahasiswa</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Pilih Berdasarkan</label>
                        <select id="inputState" class="form-control">
                            <option selected disabled value="none">Pilih...</option>
                            <option value="ipk">IPK Mahasiswa</option>
                            <option value="nama">Nama Mahasiswa</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <a href="/nilai/tambah_data" class="btn btn-primary float-right">Tambah Data Mahasiswa</a>
                    </div>
                </div>
                <table class="table table-bordered" id="ipk">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width: 10px">No</th>
                            <th style="width:10%;">NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Prodi</th>
                            <th>IPK</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <td>1</td>
                            <td>201631168</td>
                            <td>Muhammad Dhika Azizi</td>
                            <td>Teknik Informatika</td>
                            <td>S1</td>
                            <td>
                                3.82
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered" id="nama">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width: 10px">No</th>
                            <th style="width:10%;">NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <td>1</td>
                            <td>201631168</td>
                            <td>Muhammad Dhika Azizi</td>
                            <td>Teknik Informatika</td>
                            <td>S1</td>
                            <td>
                                <a href="/nilai/nilai_mhs" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-warning m-2"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
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