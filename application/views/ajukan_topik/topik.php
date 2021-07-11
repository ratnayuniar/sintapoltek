<!-- USER KAPRODI -->
<?php if ($this->session->userdata('level') == 4) { ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Topik Tugas Akhir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
              <li class="breadcrumb-item active">Data Topik</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Topik Tugas Akhir</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Konfirmasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($topik_dosen->result() as $row) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row->nim ?></td>
                      <td><?= $row->nama ?></td>
                      <td><?= $row->judul ?></td>
                      <td><?= $row->lokasi ?></td>
                      <td>
                        <?php if ($row->status == '1') {
                          echo '<span class="badge badge-primary">Menunggu</span>';
                        } else if ($row->status == '2') {
                          echo '<span class="badge badge-info">Diterima</span>';
                        } else if ($row->status == '4') {
                          echo '<span class="badge badge-warning">Direvisi</span>';
                        } else {
                          echo '<span class="badge badge-success">Disetujui</span>';
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($row->status == '0') {
                          echo '<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-topik" id="select_topik"
                          data-id_topik="' . $row->id_topik . '"
                          data-status="' . $row->status . '"
                          class="btn btn-warning btn-sm">
                          Konfirmasi
                          </a>';
                        } else if ($row->status == '1') {
                          echo '<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-reply" id="reply-message"
                          data-topik_id="' . $row->id_topik . '"
                          data-id_topik_id="' . $row->id_topik . '"
                          data-judul="' . $row->judul . '"
                          data-deskripsi="' . $row->deskripsi . '"
                          data-nim="' . $row->nim . '"
                          class="btn btn-info btn-sm">
                          Validasi
                          </a>';
                        } else if ($row->status == '2') {
                          echo '<a href="javascript:void(0);" class="btn btn-success btn-sm">
                          Selesai
                          </a>';
                        } else {
                          echo '<a href="javascript:void(0);" class="btn btn-success btn-sm">
                          Selesai
                          </a>';
                        }
                        ?>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="modal-topik">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Topik</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('topik/save_topik_waiting') ?>" method="POST" enctype="multipart/form-data">

            <div class="modal-body">
              <input type="hidden" name="id_topik" id="id_topik" class="form-control">
              <input type="hidden" name="status" value="1" class="form-control">
            </div>

            <button type="submit" id="tombol" class="btn btn-primary btn-sm " style="float: right;">Ya</button>
            <button type="reset" class="btn btn-danger btn-sm">Tidak</button>

          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-reply">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Komentar Topik</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('topik/save_close_topik') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="id_topik" id="id_topik_id" class="form-control">
              <input type="hidden" name="nim" id="nim" class="form-control">
              <div class="form-group">
                <label for="judul">Judul Topik</label>
                <input type="text" id="judul" class="form-control" readonly>
              </div>
              <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" class="form-control" readonly></textarea>
              </div>
              <div class="form-group">
                <label for="deskripsi">Validasi</label>&nbsp; &nbsp; &nbsp;
                <input class="control" type="radio" name="status" id="radioDiterima" value="3">
                <label class="form-check-label" for="radioDiterima">
                  Diterima
                </label>
                &nbsp; &nbsp;
                <input class="control" type="radio" name="status" id="radioDirevisi" value="4">
                <label class="form-check-label" for="radioDirevisi">
                  Direvisi
                </label>
              </div>
              <div class="form-group">
                <label for="deskripsi">Komentar</label>
                <textarea name="komentar" class="form-control"></textarea>
              </div>
            </div>
            <button type="submit" id="tombol" class="btn btn-primary btn-sm " style="float: right;">Kirim</button>
            <button type="reset" class="btn btn-danger btn-sm">Batal</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalclosetopik">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Yakin Menerima topik?</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('topik/save_close_topik') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="nim" id="closenim">
              <input type="hidden" name="judul" id="closejudul">
              <input type="hidden" name="id_topik" id="closetopik" class="form-control">
              <input type="hidden" name="status" value="3" class="form-control">
            </div>
            <button type="submit" id="tombol" class="btn btn-primary btn-sm" style="float: right;">Ya</button>
            <button type="reset" class="btn btn-danger btn-sm">Tidak</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modaltolaktopik">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Yakin Menolak topik?</h5>
          <button class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('topik/save_tolak_topik') ?>" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="id_topik" id="tolaktopik" class="form-control">
              <input type="hidden" name="status" value="4" class="form-control">
            </div>
            <button type="submit" id="tombol" class="btn btn-primary btn-sm">Ya</button>
            <button type="reset" class="btn btn-danger btn-sm">Tidak</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#select_topik', function() {
        var id_topik = $(this).data('id_topik');
        var status = $(this).data('status');

        $('#id_topik').val(id_topik);
        $('#status').val(status);
      })

      $(document).on('click', '#reply-message', function() {
        var id_topik = $(this).data('id_topik');
        var id_topik_id = $(this).data('id_topik_id');
        var judul = $(this).data('judul');
        var deskripsi = $(this).data('deskripsi');
        var nim = $(this).data('nim');

        $('#id_topik').val(id_topik);
        $('#id_topik_id').val(id_topik_id);
        $('#judul').val(judul);
        $('#deskripsi').val(deskripsi);
        $('#nim').val(nim);
      })

      $(document).on('click', '#ctopik', function() {
        var closetopik = $(this).data('closetopik');
        var closestatus = $(this).data('closestatus');
        var closenim = $(this).data('closenim');
        var closejudul = $(this).data('closejudul');

        $('#closenim').val(closenim);
        $('#closejudul').val(closejudul);

        $('#closetopik').val(closetopik);
        $('#closestatus').val(closestatus);

      })

      $(document).on('click', '#tlktopik', function() {
        var tolaktopik = $(this).data('tolaktopik');
        var closestatus = $(this).data('closestatus');

        $('#tolaktopik').val(tolaktopik);
        $('#closestatus').val(closestatus);

      })
    })
  </script>
  <!-- USER MAHASISWA -->
<?php } else { ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Ajukan Judul</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                <li class="breadcrumb-item active">Data Topik</li>
              </ol>
            </div>
          </div>
        </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;width: 100%;">
            <div class="modal-dialog modal-m" style="width: 100%;">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Ajukan Topik Mahasiswa</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <form action="<?php echo base_url() . 'topik/add'; ?>" method="post" class="form-horizontal" role="form">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputjudul1">Topik Tugas Akhir</label>
                      <input type="hidden" id="id_topik" name="id_topik">
                      <input type="hidden" class="form-control" id="nim" name="nim" placeholder="NIM">
                      <input type="hidden" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                      <textarea class="form-control" rows="3" id="judul" name="judul" placeholder="Masukkan Topik Tugas Akhir"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputjudul1">Deskripsi</label>
                      <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi Tugas Akhir"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputjudul1">Tempat Penelitian</label>
                      <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Tempat Penelitian ">
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Topik Tugas Akhir</h3>
              </div>
              <div class="card-body">
                <div style="text-align:right;margin-bottom: 10px ">

                  <!-- ambil topik terakhir berdasarkan nim mahasiswa login -->
                  <?php $cek = $this->db->select('*')->order_by('id_topik', 'DESC')->get_where('topik', array('nim' => $this->session->userdata('email')))->row_array(); ?>

                  <!-- Jika mahasiswa belum mengajukan topik atau topik ditolak, maka tampilkan button ajukan judul -->
                  <?php if (isset($cek['status']) == NULL) { ?>
                    <a href='#' class='on-default edit-row btn btn-success pull-right' data-toggle='modal' pull='right' data-target='#custom-width-modal' onclick='ResetInput()'><i class='fa fa-plus'></i> Ajukan Judul</a>
                  <?php } ?>

                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Topik Tugas Akhir</th>
                      <th>Deskripsi</th>
                      <th>Tempat Penelitian</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($topik_user->result() as $row) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row->judul ?></td>
                        <td><?= $row->deskripsi ?></td>
                        <td><?= $row->lokasi ?></td>
                        <td>
                          <?php if ($row->status == '1') {
                            echo '<span class="badge badge-primary">Menunggu</span>';
                          } else if ($row->status == '2') {
                            echo '<span class="badge badge-primary">Diterima</span>';
                          } else if ($row->status == '4') {
                            echo '<span class="badge badge-warning">Direvisi</span>';
                          } else {
                            echo '<span class="badge badge-success">Disetujui</span>';
                          }
                          ?>
                          <?php if ($cek['status'] == 4) {
                            echo " <a href ='#' class ='badge badge-success' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('" . $row->id_topik . "','" . $row->nim . "','" . $row->judul . "','" . $row->deskripsi . "','" . $row->lokasi . "')\"> Edit</a>";
                          } else {
                            echo "";
                          }
                          ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>

  <script type="text/javascript">
    function SetInput(id_topik, nim, judul, deskripsi, lokasi, ) {
      document.getElementById('id_topik').value = id_topik;
      document.getElementById('nim').value = nim;
      document.getElementById('judul').value = judul;
      document.getElementById('deskripsi').value = deskripsi;
      document.getElementById('lokasi').value = lokasi;
    }

    function SetInputs(id_topik, nim, bidang, judul, lokasi, deskripsi) {
      document.getElementById('id_topik2').value = id_topik;
      document.getElementById('nim2').value = nim;
      document.getElementById('bidang2').value = bidang;
      document.getElementById('judul2').value = judul;
      document.getElementById('lokasi2').value = lokasi;
      document.getElementById('deskripsi2').value = deskripsi;
    }

    function ResetInput(id_topik, nim, bidang, judul, lokasi, deskripsi) {
      document.getElementById('id_topik').value = "";
      document.getElementById('nim').value = <?php echo $this->session->userdata('email'); ?>;
      document.getElementById('nim2').value = <?php echo $this->session->userdata('email'); ?>;
      document.getElementById('bidang').value = "";
      document.getElementById('judul').value = "";
      document.getElementById('lokasi').value = "";
      document.getElementById('deskripsi').value = "";
    }
  </script>
  <script>
    function deletedata(id_topik) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "<?php echo base_url('topik/delete/') ?>"
          })
        }
      })
    }
  </script>
<?php } ?>