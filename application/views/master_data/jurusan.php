<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Jurusan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
            <li class="breadcrumb-item active">Data Jurusan</li>
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
              <h3 class="card-title">Data Jurusan</h3>
            </div>
            <div class="card-body">
              <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                <div style="text-align:right;margin-bottom: 10px ">
                  <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Jurusan</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <!-- <th>Kode Jurusan</th> -->
                      <th>Nama Jurusan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($query->result() as $row) {
                      echo "<tr>
											<td>" . $no . "</td>
											<td>" . $row->nama_jurusan . "</td>
											<td> 
                          <a href ='#' class ='btn btn-sm btn-primary btn-xs' data-toggle='modal' data-target='#custom-width-modal' onClick=\"SetInput('" . $row->id_jurusan . "','" . $row->nama_jurusan . "')\"><i class ='fa fa-edit'></i> Edit</a>
													<a href='" . base_url('jurusan/delete2/' . $row->id_jurusan) . "' id='btn-hapus' class='btn btn-sm btn-danger btn-xs' ><i class='fa fa-trash'></i> Hapus</a>
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
        <h4 class="modal-title">Data Jurusan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url() . 'jurusan/add'; ?>" method="post" class="form-horizontal" role="form">
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="id_jurusan" name="id_jurusan">
            <label class="col-md-5 control-label">Nama Jurusan</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" required>
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
      <form action="<?php echo base_url() . 'jurusan/delete'; ?>" method="post" class="form-horizontal" role="form">
        <div class="modal-body">
          <p>Apakah anda yakin ingin menghapus?</p>
          <div>
            <input type="hidden" id="id_jurusan2" name="id_jurusan2">
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


<script type="text/javascript">
  function SetInput(id_jurusan, nama_jurusan) {
    document.getElementById('id_jurusan').value = id_jurusan;
    document.getElementById('nama_jurusan').value = nama_jurusan;
  }

  function SetInputs(id_jurusan, nama_jurusan) {
    document.getElementById('id_jurusan2').value = id_jurusan;
    document.getElementById('nama_jurusan2').value = nama_jurusan;
  }

  function ResetInput(id_jurusan, nama_jurusan) {
    document.getElementById('id_jurusan').value = "";
    document.getElementById('nama_jurusan').value = "";
  }
</script>