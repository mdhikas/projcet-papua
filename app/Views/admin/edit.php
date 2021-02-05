<?= $this->extend('layout/body'); ?>
<?= $this->section('content'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">User List</li>
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
                        <form action="<?= base_url('admin/update'); ?>" method="POST">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Input Username" value="<?= (old('username')) ? old('username') : $user->username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Input Email" value="<?= (old('email')) ? old('email') : $user->email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Input Nama Lengkap" value="<?= $user->fullname ? $user->fullname : (old('fullname')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control">
                                    <option selected disabled>Pilih Role</option>
                                    <?php foreach ($groups as $g) : ?>
                                        <?php if ($g->id == $user->groupsid) : ?>
                                            <option value="<?= $g->id; ?>" selected><?= $g->name ?></option>
                                        <?php else : ?>
                                            <option value="<?= $g->id; ?>"><?= $g->name ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>