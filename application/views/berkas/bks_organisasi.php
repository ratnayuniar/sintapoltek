<?php if ($this->session->userdata('level') == 1) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Organisasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active"> Data Organisasi</li>
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
                                <h3 class="card-title">Data Organisasi</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $id_prodi = $this->session->userdata('id_prodi');
                                        foreach ($this->m_bks_organisasi->bks_organisasi_admin($id_prodi)->result() as $row) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nim ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->jumlah ?></td>
                                                <td><a href="<?= base_url('bks_organisasi/detail_bks_organisasi/' . $row->nim) ?>" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-search"></i>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
                    <h4 class="modal-title">Berkas Seminar Proposal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_seminar/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_seminar" name="id_bks_seminar">

                            <label for="exampleInputjudul1">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim" placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="berita_acara">Berita Acara</label><br>
                            <input type="file" name="berita_acara">
                        </div>
                        <div class="form-group">
                            <label for="persetujuan">Lembar Persetujuan</label><br>
                            <input type="file" name="persetujuan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Proposal</label><br>
                            <input type="file" name="proposal">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Presentasi</label><br>
                            <input type="file" name="presentasi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Monitoring</label><br>
                            <input type="file" name="monitoring">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
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
                <form action="<?php echo base_url() . 'mahasiswa/delete'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                        <div>
                            <input type="hidden" id="id_mhs2" name="id_mhs2">
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

    <script>
        $(document).on('click', '#btn-konfirmasi', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Apakah Anda Yakin ? ',
                text: "Data akan dikonfirmasi ?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = link;
                    Swal.fire(
                        'Sukses',
                        'Data berhasil di konfirmasi',
                        'success'
                    )
                }
            });
        });
    </script>
<?php } else { ?>
    <!-- PUNYA MAHASISWA -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Organisasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Berkas Organisasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div style="text-align:right;margin-bottom: 10px ">
                            <a href="#" class="on-default edit-row btn btn-success pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> Tambah Berkas</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Organisasi</h3>
                            </div>
                            <div class="card-body">
                                <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Nama Mahasiswa</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($bks_organisasi_user->result() as $row) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->nim ?></td>
                                                    <td><?= $row->nama ?></td>
                                                    <td class="text-center" width="160px">
                                                        <?php if ($row->status == '0') {
                                                            echo '<span class="badge badge-warning">Menunggu</span>';
                                                        } else if ($row->status == '1') {
                                                            echo '<span class="badge badge-info">Valid</span>';
                                                        } else {
                                                            echo '<span class="badge badge-danger">Tidak Valid</span>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center" width="160px">
                                                        <a href="<?php echo base_url('bks_organisasi/delete_users/' . $row->id_bks_org) ?>" id="btn-hapus" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                                        <!-- <a href="<?php echo base_url("bks_organisasi/ambil_id_user/{$row->id_bks_org}") ?>" data-toggle="tooltip" data-placement="bottom" title="edit data" class="btn btn-sm btn-warning btn-xs"><i class="fa fa-edit"></i>edit</a> -->
                                                        <!-- <a href="<?= base_url('bks_organisasi/detail_bks_organisasi/' . $row->id_bks_org) ?>" class="on-default edit-row btn btn-info pull-right btn-xs"><i class="fa fa-search"></i> Detail </a> -->
                                                    </td>
                                                </tr>
                                            <?php } ?>
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
                    <h4 class="modal-title">Data Organisasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('bks_organisasi/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" id="id_bks_org" name="id_bks_org">

                            <label for="exampleInputjudul1">NIM</label>
                            <input type="hidden" class="form-control" id="nim" name="nim" placeholder="NIM">
                            <input type="text" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                        </div>
                        <div class="form-group">
                            <label for="judul">Nama Organisasi</label><br>
                            <input type="text" class="form-control" id="nama_org" name="nama_org" placeholder="Contoh : Himpunan Mahasiswa Jurusan Teknik">
                        </div>
                        <div class="form-group">
                            <label for="judul">Tempat</label><br>
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Contoh : Politeknik Negeri Madiun">
                        </div>
                        <div class="form-group">
                            <label for="judul">Tahun Masuk</label><br>
                            <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Contoh : 2020">
                        </div>
                        <div class="form-group">
                            <label for="judul">Tahun Keluar</label><br>
                            <input type="text" class="form-control" id="tahun_keluar" name="tahun_keluar" placeholder="Contoh : 2021">
                        </div>
                        <div class="form-group">
                            <label for="judul">Jabatan</label><br>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Contoh : Sekretaris">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputjudul1">Surat Keterangan</label><br>
                            <input type="file" name="sk_org">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
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
                <form action="<?php echo base_url() . 'mahasiswa/delete'; ?>" method="post" class="form-horizontal" role="form">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus?</p>
                        <div>
                            <input type="hidden" id="id_mhs2" name="id_mhs2">
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
        function ResetInput(id_bks_org, nim, nama_org, tempat, tahun_masuk, tahun_keluar, jabatan, sk_org, foto_ijazah, foto_wisuda) {
            document.getElementById('id_bks_org').value = "";
            document.getElementById('nim').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('nim2').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('nama_org').value = "";
            document.getElementById('tempat').value = "";
            document.getElementById('tahun_masuk').value = "";
            document.getElementById('tahun_keluar').value = "";
            document.getElementById('jabatan').value = "";
            document.getElementById('sk_org').value = "";
        }
    </script>
<?php } ?>