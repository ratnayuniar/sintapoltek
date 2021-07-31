<?php if ($this->session->userdata('level') == 1) { ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Sidang Tugas Akhir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Jadwal Sidang Tugas Akhir</li>
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
                <h3 class="card-title">Jadwal Sidang Tugas Akhir</h3>
              </div>
              <div class="card-body">
                <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                  <div style="text-align:right;margin-bottom: 10px ">
                    <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Jadwal Sidang</a>
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
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($query->result() as $row) {
                        $waktu = explode(" ", $row->jadwal_sidang);
                        echo
                        " <tr>
											      <td>" . $no . "</td>
											      <td>" . $row->ruang_sidang . "</td>
										      	<td>" . longdate_indo($waktu[0]) . "</td>
                            <td>" . $row->jam . "</td>
											      <td>" . $row->nim . "</td>
                            <td>" . $row->nama . "</td>
										      								
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
          <h4 class="modal-title">Jadwal Sidaang Tugas Akhir</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url() . 'jadwal_sidang/cek_jadwal_sidang'; ?>" method="post" class="form-horizontal" role="form">
          <div class="card-body">
            <div class="row">
              <div class="form-group col-12">
                <input type="hidden" id="id_master_ta" name="id_master_ta">
                <label class="control-label">Nama Mahasiswa</label>
                <select class="nim form-control select2bs4" style="width: 100%;" data-live-search="true" data-style="btn-white" id="nim" name="nim" required>
                  <option>-- Pilih Mahasiswa --</option>
                  <?php foreach ($mahasiswa->result() as $row) : ?>
                    <option value="<?php echo $row->nim; ?>"><?php echo $row->nama; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-12">
                <label for="" class="control-label">Penguji 1</label>
                <select class="penguji1_sidang form-control" name="penguji1_sidang" id="penguji1_sidang" readonly>
                  <option value="">Pilih Mahasiswa Terlebih Dahulu</option>
                </select>
              </div>

              <div class="form-group col-12">
                <label for="penguji2_sidang" class="ccontrol-label">Penguji 2</label>
                <select class="penguji2_sidang form-control" name="penguji2_sidang" id="penguji2_sidang" readonly>
                  <option value="">Pilih Mahasiswa Terlebih Dahulu</option>
                </select>
              </div>

              <div class="form-group col-12">
                <label for="" class="control-label">Penguji 3</label>
                <select class="penguji3_sidang form-control" name="penguji3_sidang" id="penguji3_sidang" readonly>
                  <option value="">Pilih Mahasiswa Terlebih Dahulu</option>
                </select>
              </div>

              <div class="form-group col-12">
                <label class="control-label">Jadwal</label>
                <input type="date" name="jadwal_sidang" class="form-control" id="jadwal_sidang">
              </div>

              <div class="form-group col-12">
                <label class="control-label">Waktu</label>
              </div>

              <div class="col-4">
                <input type="time" name="waktu_mulai" class="form-control">
              </div>

              <div class="col-4">
                <input type="time" name="waktu_akhir" class="form-control">
              </div>

              <div class="form-group col-12">
                <label class="control-label">Ruang</label>
                <input type="text" name="ruang_sidang" class="form-control" id="ruang_sidang">
              </div>

              <div class="form-group col-12">
                <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
              </div>
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
        <form action="<?php echo base_url() . 'jadwal_sidang/delete'; ?>" method="post" class="form-horizontal" role="form">
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

  <!-- <link href="<?php echo base_url() ?>assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script> -->

  <script type="text/javascript">
    $(document).ready(function() {
      $('.nim').change(function() {
        var id = $(this).val();
        $.ajax({
          url: "<?= base_url('jadwal_sidang/getDosenPenguji'); ?>",
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
              html += '<option value="' + data[i].penguji1_sidang + '">' + data[i].nama + '</option>';
            }
            $('.penguji1_sidang').html(html);
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
          url: "<?= base_url('jadwal_sidang/getDosenPenguji2'); ?>",
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
              html += '<option value="' + data[i].penguji2_sidang + '">' + data[i].nama + '</option>';
            }
            $('.penguji2_sidang').html(html);
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
          url: "<?= base_url('jadwal_sidang/getDosenPenguji3'); ?>",
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

  <script type="text/javascript">
    function choose() {
      var zoo = document.getElementById('nama').value;
      document.getElementById('output').value = zoo;
    }
  </script>

  <script type="text/javascript">
    function SetInput(id_master_ta, nim, jadwal_sidang) {
      document.getElementById('id_master_ta').value = id_master_ta;
      document.getElementById('nim').value = nim;
      document.getElementById('jadwal_sidang').value = jadwal_sidang;
    }

    function SetInputs(id_master_ta, nim, jadwal_sidang) {
      document.getElementById('id_master_ta2').value = id_master_ta;
      document.getElementById('nim2').value = nim;
      document.getElementById('jadwal2').value = jadwal;
    }

    function ResetInput(id_master_ta, nim, jadwal_sidang, ruang_sidang) {
      document.getElementById('id_master_ta').value = "";
      document.getElementById('nim').value = "";
      document.getElementById('jadwal_sidang').value = "";
      document.getElementById('ruang_sidang').value = "";
    }
  </script>

  <script>
    $('#jadwal_sidang').datetimepicker({
      format: "yyyy-mm-dd HH:ii",
      autoclose: 1,
      startView: 2,
      showMeridian: 0
    })
  </script>
<?php } else { ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jadwal Sidang Tugas Akhir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Jadwal Sidang Tugas Akhir</li>
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
                <h3 class="card-title">Jadwal Sidang Tugas Akhir</h3>
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
                    foreach ($jadwal_sidang_user->result() as $row) {
                      $waktu = explode(" ", $row->jadwal_sidang);
                      echo "
                      <tr>
											<td>" . $no . "</td>
											<td>" . $row->nim . "</td>
											<td>" . $row->nama . "</td>
											<td>" . longdate_indo($waktu[0]) . " " . $waktu[1] . "</td>							
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
          <h4 class="modal-title">Jadwal Sidang Tugas Akhir</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url() . 'jadwal_sidang/add'; ?>" method="post" class="form-horizontal" role="form">
          <div class="card-body">

            <div class="form-group">
              <input type="hidden" id="id_jadwal" name="id_jadwal">
              <label class="col-md-3 control-label">NIM</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="nim" name="nim" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Jadwal</label>
              <div class="input-group col-md-9">
                <div class="input-group-append" data-target="#jadwal" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <input type="text" name="jadwal" class="form-control" id="jadwal" value="<?php echo date("Y-m-d H:i") ?>" readonly>
              </div>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
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
        <form action="<?php echo base_url() . 'jadwal_sidang/delete'; ?>" method="post" class="form-horizontal" role="form">
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
<?php } ?>