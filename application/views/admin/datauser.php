<main id="main" class="main">

  <section class="section dashboard">
    <div class="row">

      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <h5 class="card-title">User Data</h5>
            <a href="<?= base_url('admin/adduser') ?>" type="button" class="btn" style="font-size:25px;">
              <i class="bi bi-plus-circle"></i>
            </a>
          </div>
          <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Foto Pegawai</th>
                <th scope="col">NIP</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">No. Hp</th>
                <th scope="col">Alamat Pegawai</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php $no = 1;
              // $user = $this->db->query("SELECT * FROM user where fk_role = '2'");
              foreach ($user as $users) : ?>
                <tr style="text-align: center;">
                  <td><?= $no; ?></td>
                  <td><img class="img-fluid" src="<?= base_url('fotouser/') . $users['fotouser'] ?>" alt="" style="width:75px ;"></td>
                  <td><?= $users['nip_user'] ?></td>
                  <td><?= $users['nama_user'] ?></td>
                  <td><?= $users['nohp_user'] ?></td>
                  <td><?= $users['alamat_user'] ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('admin/edit/' . $users['id_user']) ?>" type="button" class="bi bi-pencil-square" style="color:limegreen">
                    </a>
                    <a href="<?= base_url('admin/delete/' . $users['id_user']) ?>" type="button" class="bi bi-trash-fill" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
                    </a>
                  </td>
                </tr>
              <?php $no++;
              endforeach; ?>
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
    <!-- </div> -->
  </section>

</main><!-- End #main -->