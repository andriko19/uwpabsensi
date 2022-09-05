      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <a href="http://ict.uwp.ac.id/" target="_blank">TIK UWP</a>.
        </div>
        <div class="footer-right">
          1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/stisla.js"></script>
  <script src="<?= base_url(); ?>assets/sbadmin/sb-admin-2.min.js"></script>
  <!-- Data Tables -->
  <script src="<?= base_url(); ?>assets/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url(); ?>assets/datatables/datatables-demo.js"></script>


  <!-- Template JS File -->
  <script src="<?= base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url(); ?>assets/js/page/index-0.js"></script>

   <!-- Template Sweetalert2 JS-->
  <script src="<?= base_url(); ?>assets/Sweetalert2/Sweetalert2.min.js"></script>

  <script type="text/javascript">
    var flash = $('#flash').data('flash');
    if (flash) {
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: flash,
        showClass: {
          popup: 'animate__animated animate__swing'
        },
        hideClass: {
          popup: 'animate__animated animate__flipOutY'
        }
      })
    }

    $(document).on('click', '#btn-hapus', function(e) {
      e.preventDefault();
      var link = $(this).attr('href');

      Swal.fire({
      title: 'Apakah anda yakin?',
      text: "Data akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#00a65a',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
       window.location = link;
      }
    })
    })
  </script>

  <script type="text/javascript">
    var d = new Date();
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();
    var hari = d.getDay();
    var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    hariIni = namaHari[hari];
    var tanggal = ("0" + d.getDate()).slice(-2);
    var month = new Array();
    month[0] = "Januari";
    month[1] = "Februari";
    month[2] = "Maret";
    month[3] = "April";
    month[4] = "Mei";
    month[5] = "Juni";
    month[6] = "Juli";
    month[7] = "Agustus";
    month[8] = "September";
    month[9] = "Oktober";
    month[10] = "Nopember";
    month[11] = "Desember";
    var bulan = month[d.getMonth()];
    var tahun = d.getFullYear();
    var date = Date.now(),
        second = 1000;

    function pad(num) {
        return ('0' + num).slice(-2);
    }

    function updateClock() {
        var clockEl = document.getElementById('clock'),
            dateObj;
        date += second;
        dateObj = new Date(date);
        clockEl.innerHTML = '' + hariIni + '.  ' + tanggal + ' ' + bulan + ' ' + tahun + '. ' + pad(dateObj.getHours()) + ':' + pad(dateObj.getMinutes()) + ':' + pad(dateObj.getSeconds());
    }
    setInterval(updateClock, second);
  </script>

  <script type="text/javascript">
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>

</body>
</html>
