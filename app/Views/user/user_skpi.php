<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>SKPI Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item active">SKPI</li>
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
            <a href="<?= base_url('user/skpi/create'); ?>" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah SKPI</a>
          </div>
          <div class="card-body">
            <table id="data-table" class="table table-bordered" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Judul Kegiatan</th>
                  <th>Tanggal Sertifikat</th>
                  <th>Nama Penyelenggara</th>
                  <th>Berkas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="modal fade" id="modalUpdate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ubah Data SKPI</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-update-skpi">
          <div class="modal-body">
            <input type="hidden" name="id_skpi">
            <div class="form-group">
              <label for="exampleInputEmail1">Judul Kegiatan</label>
              <input type="text" class="form-control" name="judul_kegiatan" placeholder="Judul Kegiatan">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Penyelenggara</label>
              <input type="text" class="form-control" name="nama_penyelenggara" placeholder="Nama Penyelenggara">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Tanggal Sertifikat</label>
              <input type="date" class="form-control" name="tanggal_sertif" placeholder="Tanggal Sertifikat">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Upload Berkas</label>
              <input type="file" class="form-control" name="file_berkas" placeholder="Tempat Lahir">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" id="btnSave" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>