<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>My Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="header-title">Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="img">
                                <img src="<?= base_url(); ?>\img\<?= user()->image; ?>" class="img-profile img-center" alt="Profile Image">
                            </div>
                            <div class="detail">

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">NIM</label>
                                            <input type="text" class="form-control" id="nim" name="nim" value="<?= (user()->nim == null) ? "" : $user->usernim; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= (user()->nim == null) ? "" : $user->nama; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Tempat</label>
                                            <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" value="<?= (user()->nim == null) ? "" : $user->tempat_lahir; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= (user()->nim == null) ? "" : $user->tanggal_lahir; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= user()->email; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <label for="inputState">Jenis Kelamin</label>
                                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" disabled>
                                            <?php if (user()->nim == null) : ?>
                                                <option value="" read-only></option>
                                            <?php else : ?>
                                                <option value="<?= $user->jenis_kelamin; ?>" read-only><?= $user->jenis_kelamin; ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>