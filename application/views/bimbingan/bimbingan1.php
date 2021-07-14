<!-- USER DOSEN -->
<?php if (($this->session->userdata('level') == 3) or ($this->session->userdata('level') == 4)) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bimbingan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Bimbingan</li>
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
                            <h3 class="card-title">Bimbingan</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Konfirmasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bimbingan_user_dosen->result() as $row) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->nim ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->tanggal ?></td>
                                            <td>
                                                <?php if ($row->status == '0') {
                                                    echo '<span class="badge badge-warning">Belum Dikomentari</span>';
                                                } else if ($row->status == '1') {
                                                    echo '<span class="badge badge-success">Sudah dikomentari</span>';
                                                } else {
                                                    echo "";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row->status == '0') {
                                                    echo '<a href="javascript:void(0);" data-toggle="modal" data-target="#modal-reply" id="reply-message"
                                                data-bimbingan_id="' . $row->id_bimbingan . '"
                                                data-id_bimbingan_id="' . $row->id_bimbingan . '"
                                                data-tanggal="' . $row->tanggal . '"
                                                data-masalah="' . $row->masalah . '"
                                                data-file="' . $row->file . '"
                                                class="btn btn-info btn-sm">
                                                Komentari
                                                </a>';
                                                } else {
                                                    echo '<a href="javascript:void(0);" class="btn btn-success btn-sm">
                                                Sudah Dikomentari
                                                </a>';
                                                }
                                                ?>
                                            </td>
                                            <!-- <td>
                                                <a href="<?= base_url('bimbingan1/detail_bimbingan/' . $row->id_bimbingan) ?>" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-search"></i>
                                            </td> -->
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach;
                                    ?>
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
                    <h5 class="modal-title">Yakin konfirmasi bimbingan?</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('bimbingan1/save_topik_waiting') ?>" method="POST" enctype="multipart/form-data">

                        <div class="modal-body">
                            <input type="hidden" name="id_bimbingan" id="id_bimbingan" class="form-control">
                            <input type="hidden" name="status" value="1" class="form-control">
                        </div>

                        <button type="submit" id="tombol" class="btn btn-primary btn-sm">Ya</button>
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
                    <h5 class="modal-title">Solusi</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('bimbingan1/save_komentar') ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id_bimbingan" id="id_bimbingan_id" class="form-control">
                            <!-- <input type="hidden" name="bimbingan_id" id="bimbingan_id" class="form-control"> -->
                            <div class="form-group">
                                <label for="judul">Tanggal</label>
                                <input type="text" id="tanggal" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Masalah Yang Dikonsultasikan</label>
                                <textarea id="masalah" rows="5" class="form-control" readonly></textarea>
                            </div>

                            <?php if ($row->file != 'NULL') {
                                echo "<div class='form-group'>
                                <label for='deskripsi'>File Bimbingan</label><br>
                                <a id='file' href='" . base_url('assets/berkas/bimbingan/' . $row->file) . "' class='btn btn-primary' download>Unduh</a>
                            </div>";
                            } else {
                            }
                            ?>


                            <!-- <div class="form-group">
                                <label for="deskripsi">File Bimbingan</label><br>
                                <a id="file" href="<?php echo base_url('assets/berkas/bimbingan/' . $row->file); ?>" class="btn btn-primary" download>Unduh</a>
                            </div> -->
                            <div class="form-group">
                                <label for="deskripsi">Solusi</label>
                                <textarea name="solusi" rows="5" class="form-control"></textarea>
                            </div>
                        </div>

                        <button type="submit" id="tombol" class="btn btn-primary btn-sm">Kirim</button>
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
                    <h5 class="modal-title">Yakin Menyetujui Bimbingan?</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('bimbingan1/save_close_topik') ?>" method="POST" enctype="multipart/form-data">

                        <div class="modal-body">
                            <input type="hidden" name="id_bimbingan" id="closetopik" class="form-control">
                            <input type="hidden" name="status" value="3" class="form-control">
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
                var id_bimbingan = $(this).data('id_bimbingan');
                var status = $(this).data('status');

                $('#id_bimbingan').val(id_bimbingan);
                $('#status').val(status);
            })

            $(document).on('click', '#reply-message', function() {
                var id_bimbingan = $(this).data('id_bimbingan');
                var id_bimbingan_id = $(this).data('id_bimbingan_id');
                var tanggal = $(this).data('tanggal');
                var masalah = $(this).data('masalah');
                var file = $(this).data('file');

                $('#id_bimbingan').val(id_bimbingan);
                $('#id_bimbingan_id').val(id_bimbingan_id);
                $('#tanggal').val(tanggal);
                $('#masalah').val(masalah);
                $('#file').val(file);
            })

            $(document).on('click', '#ctopik', function() {
                var closetopik = $(this).data('closetopik');
                var closestatus = $(this).data('closestatus');

                $('#closetopik').val(closetopik);
                $('#closestatus').val(closestatus);

            })
        })
    </script>
    <!-- USER MAHASISWA -->
<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bimbingan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Bimbingan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog" style="width:55%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajukan Bimbingan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('bimbingan1/create') ?>" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="hidden" id="id_bimbingan" name="id_bimbingan">
                                            <input type="hidden" id="minggu" name="minggu">
                                            <input type="hidden" id="judul" name="judul">
                                            <input type="hidden" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <input type="hidden" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputjudul1">Dosen</label>
                                            <?php
                                            $no = 1;
                                            foreach ($query2->result() as $row) {
                                                $data['user'] = $this->m_pembimbing->getmahasiswabyid($row->nim);
                                                $data['dosen1'] = $this->m_pembimbing->getdosen1($row->pembimbing1);
                                                echo
                                                " 
											<input type='text' class='form-control' id='dosen' readonly name='dosen' placeholder='Nama Dosen' value='" . $data['dosen1']->nama . "'></td>
											<input type='hidden' class='form-control' id='id_dosen' readonly name='id_dosen' placeholder='Nama Dosen' value='" . $data['dosen1']->id_dosen . "'></td>
											";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputjudul1">Tanggal</label>
                                            <div class="input-group col-md-9">
                                                <input class="form-control" type="date" name="tanggal" placeholder="Tanggal" id="tanggal" value="<?= set_value('tanggal') ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputjudul1">Masalah Yang Dikonsultasikan</label>
                                            <textarea class="form-control" rows="3" id="masalah" name="masalah" placeholder="Masukkan Masalah Yang Dikonsultasikan"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputjudul1">File</label><br>
                                            <input type="file" id="file" name="file">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php $cek = $this->db->get_where('master_ta', array('nim' => $this->session->userdata('email')))->row_array(); ?>
                <?php if (isset($cek['pembimbing1']) != NULL && $cek['pembimbing2'] != NULL) { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Ajukan Bimbingan</h3>
                                </div>
                                <div class="card-body">
                                    <div style="text-align:right;margin-bottom: 10px ">
                                        <a href="#" class="on-default edit-row btn btn-info pull-right" data-toggle="modal" pull="right" data-target="#custom-width-modal" onclick="ResetInput()"><i class="fa fa-plus"></i> &nbsp;Ajukan Bimbingan</a>
                                        <a href="<?= site_url('bimbingan1/cetak_kartu') ?>" target="_blank" type="button" class="btn btn-primary"><i class="fas fa-print"></i> &nbsp;Cetak Lembar Bimbingan</a>
                                        <!-- <?php
                                                foreach ($bimbingan_user->result() as $row) { ?>
                                            <a href="https://wa.me/<?= $row->hp ?>" target="_blank" class="btn btn-success"> <i class="fab fa-whatsapp"></i></a>
                                        <?php } ?> -->


                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Masalah yang Dikonsultasikan</th>
                                                <th>Solusi</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($bimbingan_user->result() as $row) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->masalah  ?></td>
                                                    <td><?= $row->solusi ?></td>
                                                    <td> <?php
                                                            $waktu = explode(" ", $row->tanggal);
                                                            echo
                                                            ""  . shortdate_indo($waktu[0]) . " ";
                                                            ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row->status == '0') {
                                                            echo '<span class="badge badge-warning">Belum Dikomentasi</span>';
                                                        } else if ($row->status == '1') {
                                                            echo '<span class="badge badge-success">Sudah Dikomentari</span>';
                                                        } else {
                                                            echo "";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($row->status == '0') {
                                                            echo "<a onclick='return confirm('Yakin akan hapus?');' href='" . base_url('bimbingan1/delete_bimbingan_ta/' . $row->id_bimbingan) . "' id='btn-hapus' class='btn btn-danger btn-sm'>
                                                            <i class='fa fa-trash'></i>
                                                        </a>";
                                                        } else {
                                                            echo " ";
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
                <?php } else { ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Pemberitahuan</h3>
                                </div>
                                <div class="card-body">
                                    Pembimbing anda belum ditetapkan, silahkan hubungi admin
                                </div>
                            </div>
                        </div>
                    </div>



                <?php } ?>

                <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="<?php echo base_url() . 'bimbingan/delete'; ?>" method="post" class="form-horizontal" role="form">
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus?</p>
                                    <div>
                                        <input type="hidden" id="id_dosen2" name="id_dosen2">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-outline-light">Ya</button>
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
                            <form action="<?php echo base_url() . 'topik/delete'; ?>" method="post" class="form-horizontal" role="form">
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus?</p>
                                    <div>
                                        <input type="hidden" id="id_bimbingan2" name="id_bimbingan2">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-outline-light">Ya</button>
                                </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <link href="<?php echo base_url() ?>assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="<?php echo base_url() ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript">
        function ResetInput(id_bimbingan, nim, bidang, judul, lokasi, deskripsi) {
            document.getElementById('id_bimbingan').value = "";
            document.getElementById('nim').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('nim2').value = <?php echo $this->session->userdata('email'); ?>;
            document.getElementById('bidang').value = "";
            document.getElementById('judul').value = "";
            document.getElementById('lokasi').value = "";
            document.getElementById('deskripsi').value = "";
        }
    </script>
    <script>
        $(".tanggal").datepicker({
            dateFormat: "dd/mm/yyyy"
        });
    </script>
<?php } ?>