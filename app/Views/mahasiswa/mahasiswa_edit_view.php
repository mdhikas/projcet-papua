<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Data Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card card-solid">
      <form role="form" id="form-update-mahasiswa">
        <div class="card-body">
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">Tahun</label>
                <input type="number" class="form-control" name="tahun" value="<?= $mahasiswa['tahun'] ?>" placeholder="Tahun Angkatan">
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="exampleInputEmail1">N.I.M</label>
                <input type="number" class="form-control" name="nim" value="<?= $mahasiswa['nim'] ?>" placeholder="NIM Mahasiswa">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= $mahasiswa['nama'] ?>" placeholder="Nama Mahasiswa">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempat_lahir" value="<?= $mahasiswa['tempat_lahir'] ?>" placeholder="Tempat Lahir">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggal_lahir" value="<?= $mahasiswa['tanggal_lahir'] ?>" placeholder="Tanggal Lahir">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $mahasiswa['email'] ?>" placeholder="Email">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                  <option selected disabled>-- Pilih Jenis Kelamin --</option>
                  <?php if ($mahasiswa['jenis_kelamin'] == "Laki-Laki") : ?>
                    <option value="Laki-Laki" selected>Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  <?php else : ?>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan" selected>Perempuan</option>
                  <?php endif; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">N.I.K</label>
                <input type="number" class="form-control" name="nik" value="<?= $mahasiswa['nik'] ?>" placeholder="N.I.K">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="exampleInputEmail1">Jurusan</label>
                <select name="jurusan" id="jurusan" class="form-control select2">
                  <option selected disabled>-- Pilih Jurusan --</option>
                  <?php foreach ($jurusan as $k) : ?>
                    <?php if ($k['kode_jurusan'] == $mahasiswa['kode_jurusan']) : ?>
                      <option value="<?= $k['kode_jurusan'] ?>" selected><?= $k['jenjang'] ?> <?= $k['nama_jurusan'] ?></option>
                    <?php else : ?>
                      <option value="<?= $k['kode_jurusan'] ?>"><?= $k['jenjang'] ?> <?= $k['nama_jurusan'] ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Perbaharui</button>
        </div>
      </form>
    </div>
  </section>
</div>
<?= $this->endSection(); ?>