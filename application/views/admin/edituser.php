<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard/') ?>">Home</a></li>
                <li class="breadcrumb-item active">Tambah Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <br />
            <!-- Vertical Form -->
            <form method="POST" action="<?= base_url('admin/edit/' . $user["id_user"]) ?>" class="row g-3" enctype="multipart/form-data">
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">NIP</label>
                    <input type="text" name="nip" class="form-control" id="nip" value="<?= $user["nip_user"] ?>">
                    <?= form_error('nip', '<small class="form-text text-danger">', '</small>'); ?>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Nama Karyawan</label>
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $user["nama_user"] ?>">
                    <?= form_error('nama', '<small class="form-text text-danger">', '</small>'); ?>

                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" value="<?= $user["password"] ?>">
                    <?= form_error('password', '<small class="form-text text-danger">', '</small>'); ?>

                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">No. Hp</label>
                    <input type="text" name="nohp" class="form-control" id="nohp" value="<?= $user["nohp_user"] ?>">
                    <?= form_error('nohp', '<small class="form-text text-danger">', '</small>'); ?>

                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Alamat Karyawan</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" min="0" value="<?= $user["alamat_user"] ?>">
                    <?= form_error('alamat', '<small class="form-text text-danger">', '</small>'); ?>

                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <br>
                            <label for="inputPassword4" class="form-label"><span class="text-danger">*</span>Foto User</label>
                            <input type="file" multiple="true" name="fotouser" class="form-control" id="fotouser" accept=".png, .jpg, .jpeg" onchange="readURL(this);">
                        </div>
                        <div class="col-6">
                            <br>
                            <img class="img-responsive img-portfolio img-hover" id="blah" src="<?= base_url() ?>fotouser/<?= $user["fotouser"] ?>" alt="your image" width="150px" height="auto" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Role</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1" name="role" value="<?= $user["role"] ?>">
                        <option value="1" <?= ('1' == $user['id_role']) ? "selected" : "" ?>>Admin</option>
                        <option value="2" <?= ('2' == $user['id_role']) ? "selected" : "" ?>>Karyawan</option>
                    </select>
                    <?= form_error('role', '<small class="form-text text-danger">', '</small>'); ?>

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</main><!-- End #main -->