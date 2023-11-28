<main id="main" class="main">
  <div class="pagetitle">
    <h1>Absen Digital</h1>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="<?= base_url('fotouser/') . $user['fotouser'] ?>" alt="Profile" class="rounded-circle">
            <span style="font-size:25px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><?= $user['nama_user'] ?></span>
            <span style="font-size:20px;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"><?= $user['nip_user'] ?></span>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#absen">Data Absensi</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile">Profil Lengkap</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-edit pt-3" id="absen">
                <a href="<?= base_url('user/absen') ?>" type="button" class="btn btn-primary" style="font-size:12px;">
                  Add</i>
                </a>
                <table class="table datatable" style="font-size: x-small;">
                  <thead>
                    <tr style="text-align: center;">
                      <th scope="col">No</th>
                      <th scope="col">Foto Absen</th>
                      <th scope="col">Status</th>
                      <th scope="col">Catatan</th>
                      <th scope="col">Tanggal Absensi</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    <?php $no = 1;
                    // $user = $this->db->query("SELECT * FROM user where fk_role = '2'");
                    foreach ($absen as $absens) : ?>
                      <tr style="text-align: center;">
                        <td><?= $no; ?></td>
                        <td><img class="img-fluid" src="<?= base_url('fotouser/') . $absens['foto_absen'] ?>" alt="" style="width:75px ;"></td>
                        <!-- <td><?= $absens['nip_user'] ?></td> -->
                        <td><?= $absens['status'] ?> - <?= $absens['work_status'] ?> - <?= $absens['att_status'] ?></td>
                        <td><?= $absens['reason'] ?></td>
                        <td><?= $absens['create_date'] ?></td>
                      </tr>
                    <?php $no++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>

              <div class="tab-pane fade profile-overview" id="profile">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                  <div class="col-lg-9 col-md-8"><?= $user['nama_user'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">No. Hp</div>
                  <div class="col-lg-9 col-md-8"><?= $user['nohp_user'] ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Alamat</div>
                  <div class="col-lg-9 col-md-8"><?= $user['alamat_user'] ?></div>
                </div>
              </div>



            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->