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
            <li class="breadcrumb-item"><a href="<?= base_url('user/skpi'); ?>">SKPI</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card">
      <form role="form" id="form-store-skpi" enctype="multipart/form-data">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Judul Kegiatan</label>
                <input type="text" class="form-control" name="judul_kegiatan" placeholder="Judul Kegiatan">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Penyelenggara</label>
                <input type="text" class="form-control" name="nama_penyelenggara" placeholder="Nama Penyelenggara">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Sertifikat</label>
                <input type="date" class="form-control" name="tanggal_sertif" placeholder="Tanggal Sertifikat">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Upload Berkas</label>
                <input type="file" class="form-control" name="file_berkas" placeholder="Tempat Lahir">
              </div>
            </div>
          </div>
          <button type="submit" id="btnSave" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </section>
</div>
<?= $this->endSection(); ?>