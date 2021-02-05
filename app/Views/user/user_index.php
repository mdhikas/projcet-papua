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
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 float-left">
                                <img src="<?= base_url(); ?>\img\<?= user()->image; ?>" class="img-profile img-center" alt="Profile Image">
                            </div>
                            <div class="col-8 float-right">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">NIM</label>
                                            <input type="text" class="form-control" id="nim" name="nim" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">

                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Tempat</label>
                                            <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Jenis Kelamin</label>
                                            <input type="text" class="form-control" id="jenkel" name="jenkel" value="" readonly>
                                        </div>
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