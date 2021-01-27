<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Mata Kuliah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Mata Kuliah</li>
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
            <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data Mata Kuliah</button>
          </div>
          <div class="card-body">
            <table id="data-table" class="table table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Jurusan</th>
                  <th>Kode Matkul</th>
                  <th>Nama Matkul</th>
                  <th>SKS</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                    
              </tbody>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Jurusan</th>
                  <th>Kode Matkul</th>
                  <th>Nama Matkul</th>
                  <th>SKS</th>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Mata Kuliah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-store-matkul">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Kode Jurusan</label>
              
              <select name="kode_jurusan" class="form-control select2" style="width: 100%" required>
                <option selected disabled>-- Pilih Jurusan --</option>
                <?php foreach ($jurusan as $key) : ?>
                  <option value="<?= $key['kode_jurusan'] ?>"><?= $key['jenjang'] ?> <?= $key['nama_jurusan'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="row">
              <div class="col-5">
                <div class="form-group">
                  <label for="">Kode Mata Kuliah 1</label>
                  <input type="text" class="form-control" name="kode_matkul[]" placeholder="Kode Mata Kuliah" required>
                </div>
              </div>
              <div class="col-5">
                <div class="form-group">
                  <label for="">Nama Mata Kuliah 1</label>
                  <input type="text" class="form-control" name="nama_matkul[]" placeholder="Mata Kuliah" required>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label for="">SKS 1</label>
                  <input type="text" class="form-control" name="sks[]" placeholder="Jumlah SKS" required>
                </div>
              </div>
            </div>
            <div id="additional-field"></div>
            <button type="button" class="btn btn-success" onclick="add_input_field()"><i class="fas fa-plus"></i></button>
            <button type="button" id="btn-remove-input" class="btn btn-danger" onclick="remove_input_field()"><i class="fas fa-minus"></i></button>
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
          <h4 class="modal-title">Edit Data Mata Kuliah</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-update-matkul">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Kode Jurusan</label>
              <select name="kode_jurusan" class="form-control select2" style="width: 100%" required>
                <option selected disabled>-- Pilih Jurusan --</option>
                <?php foreach ($jurusan as $key) : ?>
                  <option value="<?= $key['kode_jurusan'] ?>"><?= $key['jenjang'] ?> <?= $key['nama_jurusan'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="row">
              <div class="col-5">
                <div class="form-group">
                  <label for="">Kode Mata Kuliah</label>
                  <input type="text" class="form-control" name="kode_matkul" placeholder="Kode Mata Kuliah" readonly required>
                </div>
              </div>
              <div class="col-5">
                <div class="form-group">
                  <label for="">Nama Mata Kuliah</label>
                  <input type="text" class="form-control" name="nama_matkul" placeholder="Mata Kuliah" required>
                </div>
              </div>
              <div class="col-2">
                <div class="form-group">
                  <label for="">SKS</label>
                  <input type="text" class="form-control" name="sks" placeholder="Jumlah SKS" required>
                </div>
              </div>
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