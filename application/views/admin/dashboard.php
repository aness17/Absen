<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Attendance <span>| Today</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar-event"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $att ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Sales Card -->
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Employee <span>| Today</span></h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar-event"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $attday ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Sales Card -->
          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Employee</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar-event"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $user ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Sales Card -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="card-body pb-0">
                <h5 class="card-title">Riwayat Absensi <span>| Hari Ini</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr style="text-align: center;">
                      <th scope="col">Preview</th>
                      <th scope="col">NIP</th>
                      <th scope="col">Nama Karyawan</th>
                      <th scope="col">Tanggal Absen</th>
                      <th scope="col">Status Bekerja</th>
                      <th scope="col">Status Absen</th>
                      <th scope="col">Location</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($atthistory as $a) : ?>
                      <tr style="text-align: center;">
                        <th scope="row"><a href="#"><img class="img-fluid" src="<?= base_url('fotouser/') . $a['foto_absen'] ?>" alt=""></a></th>
                        <td><?= $a['nip_user'] ?></td>
                        <td><?= $a['nama_user'] ?></td>
                        <td><?= $a['create_date'] ?></td>
                        <td><?= $a['work_status'] ?></td>
                        <td><?php if ($a['att_status'] == 'Hadir') { ?>
                            <span class="badge bg-success"><?= $a['att_status'] ?></span>
                          <?php } elseif ($a['att_status'] == 'Sakit') { ?>
                            <span class="badge bg-warning"><?= $a['att_status'] ?></span>
                          <?php } else { ?>
                            <span class="badge bg-danger"><?= $a['att_status'] ?></span><?php } ?>
                        </td>
                        <td><a href="https://www.google.com/maps/search/<?= $a['latitude'] ?>,<?= $a['longitude'] ?>">Lihat Lokasi</a> </td>
                      </tr>
                    <?php $no++;
                    endforeach; ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->