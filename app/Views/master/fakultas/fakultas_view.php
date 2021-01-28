<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Fakultas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Fakultas</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-9">
        <div class="card">
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data Fakultas</button>
          </div>
          <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Fakultas</th>
                  <th>Nama Fakultas</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                    
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Kode Fakultas</th>
                  <th>Nama Fakultas</th>
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
          <h4 class="modal-title">Tambah Data Fakultas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-store-fakultas">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Kode Fakultas</label>
              <input type="text" class="form-control" name="kode_fakultas" placeholder="Kode Fakultas">
            </div>
            <div class="form-group">
              <label for="">Nama Fakultas</label>
              <input type="text" class="form-control" name="nama_fakultas" placeholder="Nama Fakultas">
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