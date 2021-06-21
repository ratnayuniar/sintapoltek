<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Program Studi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/#">Home</a></li>
            <li class="breadcrumb-item active">Data Program Studi</li>
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
              <h3 class="card-title">Data Program Studi</h3>
            </div>
            <div class="card-body">
              <div style="text-align:right;margin-bottom: 10px ">
                <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i></a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Jurusan</th>
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($query->result() as $row) {
                    echo "
                    <tr>
											<td>" . $no . "</td>
                      <td>" . $row->kode_jurusan . "</td>
											<td>" . $row->kode_prodi . "</td>
											<td>" . $row->nama_prodi . "</td>
											<td>
                          <a href ='#' class ='on-default edit-row btn btn-primary' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('" . $row->id_prodi . "','" . $row->id_jurusan . "','" . $row->kode_prodi . "','" . $row->nama_prodi . "')\"><i class ='fa fa-edit'></i></a>
													<a href ='#' class ='on-default remove-row btn btn-danger' data-toggle='modal' data-target='#delete-modal'onClick=\"SetInputs('" . $row->id_prodi . "','" . $row->id_jurusan . "','" . $row->kode_prodi . "','" . $row->nama_prodi . "')\"><i class ='fa fa-trash'></i></a>
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
        <h4 class="modal-title">Tambah Data Program Studi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url() . 'prodi/add'; ?>" method="post" class="form-horizontal" role="form">
        <div class="modal-body">
          <input type="hidden" id="id_jurusan" name="id_jurusan" value="<?php echo $_GET['id']; ?>">

          <div class="form-group">
            <input type="hidden" id="id_prodi" name="id_prodi">
            <label class="col-md-3 control-label">Kode Jurusan</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" value="<?php echo $_GET['id']; ?>" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Kode Prodi</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="kode_prodi" name="kode_prodi" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Nama Prodi</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
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



<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url() . 'prodi/delete'; ?>" method="post" class="form-horizontal" role="form">
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus?</p>
          <div>
            <input type="hidden" id="id_prodi2" name="id_prodi2">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-outline-light">Ya</button>
        </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function SetInput(id_jurusan, kode_jurusan, id_prodi, kode_prodi, nama_prodi) {
    document.getElementById('id_jurusan').value = id_jurusan;
    document.getElementById('id_prodi').value = id_prodi;
    document.getElementById('kode_prodi').value = kode_prodi;
    document.getElementById('nama_prodi').value = nama_prodi;
  }

  function SetInputs(id_jurusan, id_prodi, kode_prodi, nama_prodi) {
    document.getElementById('id_jurusan2').value = id_jurusan;
    document.getElementById('id_prodi2').value = id_prodi;
    document.getElementById('kode_prodi2').value = kode_prodi;
    document.getElementById('nama_prodi2').value = nama_prodi;
  }

  function ResetInput() {
    document.getElementById('id_jurusan').value = "";
    document.getElementById('id_prodi').value = "";
    document.getElementById('kode_prodi').value = "";
    document.getElementById('nama_prodi').value = "";
  }
</script>