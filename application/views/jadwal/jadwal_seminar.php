<?php if ($this->session->userdata('level') == 1) { ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Seminar Proposal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Jadwal Seminar Proposal</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jadwal Seminar Proposal</h3>
              </div>
              <div class="card-body">
                <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                  <div style="text-align:right;margin-bottom: 10px ">
                    <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Jadwal Seminar</a>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Ruang</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($query->result() as $row) {
                        $waktu = explode(" ", $row->jadwal_seminar);
                        echo
                        " <tr>
											      <td>" . $no . "</td>
											      <td>" . $row->ruang_seminar . "</td>
										      	<td>" . longdate_indo($waktu[0]) . "</td>
                            <td>" . $row->jam . "</td>
											      <td>" . $row->nim . "</td>
                            <td>" . $row->nama . "</td>
										      	<td>
												  	<a href='" . base_url('jadwal_seminar/delete/' . $row->id_master_ta) . "' id='btn-hapus' class='btn btn-sm btn-danger btn-xs' ><i class='fa fa-trash'></i> Hapus</a> 
											      </td>									
									    </tr>";
                        $no++;
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>


  <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Jadwal Seminar Proposal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url() . 'jadwal_seminar/cek_jadwal_seminar'; ?>" method="post" class="form-horizontal" role="form">
          <div class="card-body">
            <div class="form-group">
              <input type="hidden" id="id_master_ta" name="id_master_ta">
              <label class="control-label">Nama Mahasiswa</label>
              <select class="nim form-control select2bs4" style="width: 100%;" data-live-search="true" data-style="btn-white" id="nim" name="nim" required>
                <option>-- Pilih Mahasiswa --</option>
                <?php foreach ($mahasiswa->result() as $row) : ?>
                  <option value="<?php echo $row->nim; ?>"><?php echo $row->nama; ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-group">
              <label for="" class="control-label">Penguji 1</label>
              <select class="penguji1_sempro form-control" name="penguji1_sempro" id="penguji1_sempro" readonly>
                <option value="">Pilih Mahasiswa Terlebih Dahulu</option>
              </select>
            </div>

            <div class="form-group">
              <label for="penguji2_sempro" class="ccontrol-label">Penguji 2</label>
              <select class="penguji2_sempro form-control" name="penguji2_sempro" id="penguji2_sempro" readonly>
                <option value="">Pilih Mahasiswa Terlebih Dahulu</option>
              </select>
            </div>

            <div class="form-group">
              <label for="" class="control-label">Penguji 3</label>
              <select class="penguji3_sidang form-control" name="penguji3_sidang" id="penguji3_sidang" readonly>
                <option value="">Pilih Mahasiswa Terlebih Dahulu</option>
              </select>
            </div>

            <div class="form-group">
              <label class="control-label">Jadwal</label>
              <input type="date" name="jadwal_seminar" class="form-control" id="jadwal_seminar">
            </div>

            <div class="form-group">
              <label class="control-label">Waktu</label>
              <input type="time" name="waktu_mulai" class="form-control col-md-3">
            </div>

            <div class="form-group">
              <input type="time" name="waktu_akhir" class="form-control col-md-3">
            </div>

            <div class="form-group">
              <label class="control-label">Ruang</label>
              <input type="text" name="ruang_seminar" class="form-control" id="ruang_seminar">
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="delete-modassl" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="width:55%;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="custom-width-modalLabel">Konfirmasi Hapus</h4>
        </div>
        <form action="<?php echo base_url() . 'jadwal_seminar/delete'; ?>" method="post" class="form-horizontal" role="form">
          <div class="modal-body">
            <p>Apakah anda yakin ingin menghapus?</p>
            <div>
              <input type="hidden" id="id_jadwal2" name="id_jadwal2">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-success waves-effect waves-light">Ya</button>
          </div>
      </div>
    </div>
  </div>


  <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Hapus</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-outline-light">Ya</button>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="<?php echo base_url(); ?>admin/plugins/jquery/jquery.min.js"></script>
  <link href="<?php echo base_url() ?>assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script> -->
  <!-- jQuery -->

  <!-- ajax untuk ambil dosen penguji -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('.nim').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('jadwal_seminar/getDosenPenguji'); ?>",
          method: "POST",
          data: {
            id: id
          },
          async: true,
          dataType: "JSON",
          success: function(data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<option value="' + data[i].penguji1_sempro + '">' + data[i].nama + '</option>';
            }
            $('.penguji1_sempro').html(html);
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.nim').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('jadwal_seminar/getDosenPenguji2'); ?>",
          method: "POST",
          data: {
            id: id
          },
          async: true,
          dataType: "JSON",
          success: function(data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<option value="' + data[i].penguji2_sempro + '">' + data[i].nama + '</option>';
            }
            $('.penguji2_sempro').html(html);
          }
        });
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.nim').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('jadwal_seminar/getDosenPenguji3'); ?>",
          method: "POST",
          data: {
            id: id
          },
          async: true,
          dataType: "JSON",
          success: function(data) {
            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<option value="' + data[i].penguji3_sidang + '">' + data[i].nama + '</option>';
            }
            $('.penguji3_sidang').html(html);
          }
        });
      });
    });
  </script>

  <script>
    var date = new Date();
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;
    var today = year + "-" + month + "-" + day;
    document.getElementById('jadwal_seminar').value = today;
  </script>

  <script type="text/javascript">
    function choose() {
      var zoo = document.getElementById('nama').value;
      document.getElementById('output').value = zoo;
    }
  </script>



  <script type="text/javascript">
    function SetInput(id_master_ta, nim, jadwal) {
      document.getElementById('id_master_ta').value = id_master_ta;
      document.getElementById('nim').value = nim;
      document.getElementById('jadwal').value = jadwal;
    }

    function SetInputs(id_jadwal, nim, jadwal) {
      document.getElementById('id_jadwal2').value = id_jadwal;
      document.getElementById('nim2').value = nim;
      document.getElementById('jadwal2').value = jadwal;
    }

    function ResetInput(id_master_ta, nim, jadwal, ruang_seminar) {
      document.getElementById('id_master_ta').value = "";
      document.getElementById('nim').value = "";
      document.getElementById('jadwal').value = "";
      document.getElementById('ruang_seminar').value = "";
    }
  </script>

  <script>
    // $('#jadwal_sidang').datetimepicker({
    //   format: "yyyy-mm-dd",
    //   autoclose: 1,
    //   startView: 2,
    //   showMeridian: 0
    // })

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })




    //Date range picker
    $('#hari').datetimepicker({
      format: 'L'
    });
  </script>
<?php } else { ?>
  <!-- USER MAHASISWA -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Seminar Proposal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Jadwal Seminar Proposal</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Jadwal Seminar Proposal</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Jadwal</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($jadwal_seminar_user->result() as $row) {
                      $waktu = explode(" ", $row->jadwal_seminar);
                      echo
                      "<tr>
											    <td>" . $no . "</td>
											    <td>" . $row->nim . "</td>
                          <td>" . $row->penguji1_sempro . "</td>
											    <td>"  . longdate_indo($waktu[0]) . " " . $waktu[1] . "</td>				
									    </tr>";
                      $no++;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php } ?>