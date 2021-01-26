<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Jurusan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Jurusan</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-10">
        <div class="card">
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data Jurusan</button>
          </div>
          <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Jurusan</th>
                  <th>Nama Jurusan</th>
                  <th>Kode Fakultas</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                    
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Kode Jurusan</th>
                  <th>Nama Jurusan</th>
                  <th>Kode Fakultas</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      
      </div>
    </div>
  </section>
  <div class="modal fade" id="modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Jurusan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form id="form-store-jurusan">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Kode Jurusan</label>
              <input type="text" class="form-control" name="kode_jurusan" placeholder="Kode Jurusan">
            </div>
            <div class="form-group">
              <label for="">Program Studi</label>
              <input type="text" class="form-control" name="jenjang" placeholder="Program Studi">
            </div>
            <div class="form-group">
              <label for="">Nama Jurusan</label>
              <input type="text" class="form-control" name="nama_jurusan" placeholder="Nama Jurusan">
            </div>
            <div class="form-group">
              <label for="">Nama Fakultas</label>
              <select name="kode_fakultas" class="form-control select2" width="100%">
                <option selected disabled>-- Pilih Fakultas --</option>
                <?php foreach ($fakultas as $k) : ?>
                  <option value="<?= $k['kode_fakultas'] ?>"><?= $k['nama_fakultas'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Fakultas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-update-fakultas">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Kode Fakultas</label>
              <input type="text" class="form-control" name="kode_fakultas" placeholder="Kode Fakultas" readonly>
            </div>
            <div class="form-group">
              <label for="">Nama Fakultas</label>
              <input type="text" class="form-control" name="nama_fakultas" placeholder="Nama Fakultas">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Perbaharui</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>