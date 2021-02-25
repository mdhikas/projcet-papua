<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('admin/create'); ?>" class="btn btn-primary"><i class="fas fa-plus mr-2"></i>Tambah Data User</a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <!-- <th>Fullname</th> -->
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $user->username; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <?php if (!($user->name == null)) : ?>
                                            <td><?= $user->name; ?></td>
                                        <?php else : ?>
                                            <td></td>
                                        <?php endif; ?>
                                        <td>
                                            <?php if ($user->name == 'superadmin') : ?>
                                            <?php else : ?>
                                                <a href="<?= base_url('admin/edit/' . $user->userid); ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="<?= base_url('admin/delete/' . $user->userid); ?>" method="POST" id="form-delete-data" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button type="submit" class="btn btn-danger btn-hapus"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>