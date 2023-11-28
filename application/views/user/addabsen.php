<main id="main" class="main">
  <div class="pagetitle">
    <h1>Absen Digital</h1>
  </div><!-- End Page Title -->

  <div class="container">
    <div class="row justify-content-center">
      <form id="form" method="POST" class="row g-3" enctype="multipart/form-data">
        <div class="col-12">
          <span style="text-align: center;"><?= $user['nama_user'] ?></span><br />
          <span><?= $user['nip_user'] ?></span>
          <input type="hidden" id="id" name="id" value="<?= $user['id_user'] ?>" />
          <input type="hidden" id="lat" name="lat" value="" />
          <input type="hidden" id="long" name="long" value="" />
        </div>
        <div class="col-12">
          <span id="my_camera"></span>
        </div>
        <div class="col-12">
          <div>
            <legend class="col-form-label col-sm-2 pt-0">Jadwal kerja</legend>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stat" id="stat1" value="Masuk">
              <label class="form-check-label" for="stat1">Masuk</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stat" id="stat2" value="Pulang">
              <label class="form-check-label" for="stat2">Pulang</label>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div>
            <legend class="col-form-label col-sm-2 pt-0">Sistem Kerja</legend>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="status1" value="WFH">
              <label class="form-check-label" for="status1">WFH</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="status2" value="WFO">
              <label class="form-check-label" for="status2">WFO</label>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div>
            <legend class="col-form-label col-sm-2 pt-0">Keterangan</legend>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="att_status" id="att_status1" value="Hadir">
              <label class="form-check-label" for="att_status1">Hadir</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="att_status" id="att_status2" value="Izin">
              <label class="form-check-label" for="att_status2">Izin</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="att_status" id="att_status3" value="Sakit">
              <label class="form-check-label" for="att_status3">Sakit</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="att_status" id="att_status4" value="Alfa">
              <label class="form-check-label" for="att_status4">Alfa</label>
            </div>
          </div>
        </div>
        <div class="col-12">
          <legend class="col-form-label col-sm-2 pt-0">Catatan</legend>
          <textarea class="form-control" name="reason" id="reason" style="height: 100px"></textarea>
        </div>
        <div class="col-sm-12 d-md-none d-lg-none d-xl-none text-center">
          <input type="submit" id="simpan" value="Simpan" class="btn btn-block btn-lg btn-success" />
          <a href="<?php echo base_url('user/index') ?>" class="btn btn-block btn-lg btn-info">Lihat</a>
        </div>

      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <!-- webcamjs  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script language="JavaScript">
    // menampilkan kamera dengan menentukan ukuran, format dan kualitas 
    Webcam.set({
      width: 415,
      height: 415,
      image_format: 'jpeg',
      jpeg_quality: 90
    });

    //menampilkan webcam di dalam file html dengan id my_camera
    Webcam.attach('#my_camera');
  </script>
  <script type="text/javascript">
    // saat dokumen selesai dibuat jalankan fungsi update

    // console.log(reason);
    $(document).ready(function() {
      //update();
      let status = '';
      let att_status = '';
      let stat = '';
      getLocation();
      $('#form input').on('change', function() {
        status = $('input[name=status]:checked', '#form').val()
      });
      $('#form input').on('change', function() {
        status = $('input[name=att_status]:checked', '#form').val()
      });
      $('#form input').on('change', function() {
        status = $('input[name=stat]:checked', '#form').val()
      });
    });

    function getData() {

    }

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
      let lng = position.coords.longitude;
      let lat = position.coords.latitude;
      document.getElementById("lat").value = lat;
      document.getElementById("long").value = lng;
    }

    function showError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          $("#simpan").hide();
          alert("User denied the request for Geolocation.Please refresh and allow the geolocation permission");
          break;
        case error.POSITION_UNAVAILABLE:
          alert("Location information is unavailable.");
          break;
        case error.TIMEOUT:
          alert("The request to get user location timed out.");
          break;
        case error.UNKNOWN_ERROR:
          alert("An unknown error occurred.");
          break;
      }
    }

    // jalankan aksi saat tombol register disubmit
    $("#simpan").click(function() {
      event.preventDefault();

      document.getElementsByName('status').forEach(radio => {
        if (radio.checked) {
          status = radio.value;
        }
      });
      document.getElementsByName('att_status').forEach(radio => {
        if (radio.checked) {
          att_status = radio.value;
        }
      });
      document.getElementsByName('stat').forEach(radio => {
        if (radio.checked) {
          stat = radio.value;
        }
      });
      let catatan = document.getElementById('reason');

      let reason = catatan.value;


      let image = '';
      let id = $('#id').val();
      let lng = $('#long').val();
      let lat = $('#lat').val();
      reason = $('#reason').val();
      // console.log(lng);

      //memasukkan data gambar ke dalam variabel image
      Webcam.snap(function(data_uri) {
        image = data_uri;
      });
      if (image == "") {
        $("#form").html("Error: No Picture. Refresh the page!");
        return;
      }
      if (lng == "" || lat == "") {
        $("#form").html("Error: No Location. Refresh the page!");
        return;
      }

      //mengirimkan data ke file action.php dengan teknik ajax
      $.ajax({
        url: '<?php echo base_url('user/addabsen'); ?>',
        type: 'POST',
        data: {
          id: id,
          lng: lng,
          lat: lat,
          att_status: att_status,
          status: status,
          stat: stat,
          reason: reason,
          image: image
        },
        success: function(r) {
          console.log(r);
          $("#form").html("Success.<br /><a class='btn btn-lg btn-info' href='<?php echo base_url("user/index"); ?>'>View</a>");
        }
      })
    });
  </script>
</main><!-- End #main -->