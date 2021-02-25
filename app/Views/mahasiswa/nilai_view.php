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
            <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
            <li class="breadcrumb-item active">Nilai</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('mahasiswa/nilai/create') ?>" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Nilai Mahasiswa</a>
          </div>
          <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>N.I.M</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Total SKS</th>
                  <th>IPK</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>N.I.M</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Total SKS</th>
                  <th>IPK</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
            <!-- <input type="number" class="form-control" name="nim" id="nim1" autocomplete="off" placeholder="NIM Mahasiswa" required> -->
            <!-- <div id="result_nim"></div>

            <div class="card mt-3" id="result_table_nilai" style="display: none;">
              <div class="card-body">
                <b><span id="label_nim">NIM</span> - <span id="label_nama">NAMA</span></b>
                <table id="data-table" class="table table-bordered mt-2" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>N.I.M</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jurusan</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                        
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>N.I.M</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Jurusan</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div> -->
            <!-- <form action="">
              <div class="input-group input-group-sm">
                <input type="text" id="nim" name="nim" class="form-control" placeholder="Cari NIM">
                <span class="input-group-append">
                  <button type="button" class="btn btn-info btn-flat">Cari</button>
                </span>
              </div>
            </form> -->
            <!-- <table id="data-table" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>N.I.M</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jurusan</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                    
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>N.I.M</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Jurusan</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table> -->
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
<?= $this->endSection(); ?>