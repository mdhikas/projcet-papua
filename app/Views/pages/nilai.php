<?= $this->extend('layout/body'); ?>

<?= $this->section('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Nilai Mahasiswa</h1>
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
                <div class="form-group col-md-4">
                    <label for="inputState">Pilih Berdasarkan</label>
                    <select id="inputState" class="form-control">
                        <option selected disabled value="0">Pilih...</option>
                        <option value="nilai">Nilai Mahasiswa</option>
                        <option value="nama">Nama Mahasiswa</option>
                    </select>
                </div>
                <table class="table table-bordered" id="tabel-ipk">
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
                            <td>1.</td>
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
                <table class="table table-bordered" id="tabel-mahasiswa">
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
                            <td>1.</td>
                            <td>201631168</td>
                            <td>Muhammad Dhika Azizi</td>
                            <td>Teknik Informatika</td>
                            <td>S1</td>
                            <td>
                                <button class="btn btn-primary">Detail</button>
                                <button class="btn btn-warning mx-2">Edit</button>
                                <button class="btn btn-danger">Hapus</button>
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