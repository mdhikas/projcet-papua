<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Data Nilai Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/nilai') ?>">Nilai</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <form role="form" id="form-store-nilai">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1">N.I.M</label>
                <input type="number" class="form-control" name="nim" id="nim" autocomplete="off" placeholder="NIM Mahasiswa" required>
                <div id="result_nim"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Mahasiswa</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mahasiswa" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Semester</label>
                <select name="kode_semester" class="form-control">
                  <option selected disabled>Semester</option>
                  <?php foreach ($semester as $k => $v) : ?>
                    <option value="<?= $v['kode_semester'] ?>"><?= $v['kode_semester'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card card-solid">        
        <div class="card-body">          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Kode Mata Kuliah 1</label>
                <input type="text" class="form-control" name="kode_mk[]" id="kode_mk_1" onkeyup="search_kode_mk(1)" autocomplete="off" placeholder="Kode Mata Kuliah" required>
                <div id="result_kode_mk_1"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">            
                <label for="exampleInputEmail1">Nama Mata Kuliah 1</label>
                <input type="text" class="form-control" name="nama_mk[]" id="nama_mk_1" placeholder="Nama Mata Kuliah" readonly required>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">            
                <label for="exampleInputEmail1">SKS 1</label>
                <input type="text" class="form-control" name="sks[]" id="sks_1" placeholder="SKS" readonly required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="exampleInputEmail1">Grade</label>
                <select name="grade[]" class="form-control" onchange="calculate_ips(1, this.value)" required>
                  <option selected disabled>-- Pilih Nilai --</option>
                  <option value="A">A</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B">B</option>
                  <option value="B-">B-</option>
                  <option value="C+">C+</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                </select>
              </div>
            </div>
          </div>
          <div class="field-nilai"></div>
          <button type="button" class="btn btn-sm btn-success mt-3" onclick="add_field()"><i class="fas fa-plus"></i></button>
          <button type="button" class="btn btn-sm btn-danger mt-3" id="btn-remove-input" onclick="remove_field()"><i class="fas fa-minus"></i></button>
          <hr>
          <div class="row mt-3">
            <div class="col">
              <p>Total SKS : <b><span id="total_sks">0</span></b></p>
            </div>
            <div class="col">
              <p>Total Bobot * SKS : <b><span id="total_bobot">0</span></b></p>
            </div>
            <div class="col">
              <p>IPS : <b><span id="ips">0.00</span></b></p>
            </div>
          </div>
          <input type="hidden" name="total_sks">
          <input type="hidden" name="ips">
        </div>
        <div class="card-footer">          
          <button type="submit" id="btn-submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </section>
</div>
<?= $this->endSection(); ?>