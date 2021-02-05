<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">User List</li>
                        <li class="breadcrumb-item active">Create User</li>
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
                        <p>Tambah Data User</p>
                    </div>
                    <div class="card-body">
                        <form action="<?= route_to('register') ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.username') ?>" name="username" value="<?= old('username') ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" name="password" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" name="pass_confirm" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row float-md-right">
                                <!-- /.col -->
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>