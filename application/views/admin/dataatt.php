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
                <th scope="col">Status Bekerja</th>
                <th scope="col">Status Absen</th>
                <th scope="col">Catatan</th>
                <th scope="col">Tanggal Absen</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody class="list">
              <?php $no = 1;
              // $user = $this->db->query("SELECT * FROM user where fk_role = '2'");
              foreach ($att as $atts) : ?>
                <tr style="text-align: center;">
                  <td><?= $no; ?></td>
                  <td><img class="img-fluid" src="<?= base_url('fotouser/') . $atts['foto_absen'] ?>" alt="" style="width:75px ;"></td>
                  <td><?= $atts['nip_user'] ?></td>
                  <td><?= $atts['nama_user'] ?></td>
                  <td><?= $atts['work_status'] ?></td>
                  <td><?= $atts['att_status'] ?></td>
                  <td><?= $atts['reason'] ?></td>
                  <td><?= $atts['create_date'] ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('admin/deleteatt/' . $atts['id_absen']) ?>" type="button" class="bi bi-trash-fill" style="color:red" onclick="return confirm('Are you sure to delete this row ?')">
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