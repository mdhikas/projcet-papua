<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Semester</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Semester</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data Semester</button>
          </div>
          <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Semester</th>
                  <th>Keterangan</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Kode Semester</th>
                  <th>Keterangan</th>
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
          <h4 class="modal-title">Tambah Data Semester</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-store-semester">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Kode Semester</label>
              <input type="text" class="form-control" name="kode_semester" placeholder="Kode Semester">
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Semester">
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Semester</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-update-semester">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Kode Semester</label>
              <input type="text" class="form-control" name="kode_semester" placeholder="Kode Semester" readonly>
            </div>
            <div class="form-group">
              <label for="">Keterangan</label>
              <input type="text" class="form-control" name="keterangan" placeholder="Keterangan Semester">
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