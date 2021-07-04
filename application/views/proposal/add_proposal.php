<script type="text/javascript" src="<?= base_url("assets/ckeditor/ckeditor.js") ?>"></script>

<!-- summernote -->
<link rel="stylesheet" href="<?php echo base_url(); ?>admin/plugins/summernote/summernote-bs4.min.css">
<style>
    pre {
        white-space: pre-wrap;
        word-wrap: break-word;
        font-family: inherit;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ajukan Proposal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Ajukan Proposal</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3"></h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Latar Belakang</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Rumusan Masalah</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Batasan Masalah</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Tujuan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Teori</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Metode</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <form class="form-horizontal" action="<?php echo base_url() . 'proposal/add'; ?>" method="post">
                                    <div class="card-body">
                                        <button type="submit" name="submit" class="btn btn-info float-right">Simpan</button><br>
                                        <div class="form-group">
                                            <input type="hidden" id="id_proposal" name="id_proposal">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                                            <h5> <label for="exampleInputjudul1">Latar Belakang</label></h5>
                                            <textarea class="form-control" rows="5" id="latar_belakang" name="latar_belakang" placeholder="Masukkan Latar Belakang"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_2">
                                <form class="form-horizontal" action="<?php echo base_url() . 'proposal/add_rumusan'; ?>" method="post">
                                    <div class="card-body">
                                        <button type="submit" name="submit" class="btn btn-info float-right">Simpan</button><br>
                                        <div class="form-group">
                                            <input type="hidden" id="id_proposal" name="id_proposal">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                                            <h5><label for="exampleInputjudul1">Rumusan Masalah</label></h5>
                                            <textarea class="form-control" rows="5" id="rumusan_masalah" name="rumusan_masalah" placeholder="Masukkan Latar Belakang"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <form class="form-horizontal" action="<?php echo base_url() . 'proposal/add_batasan'; ?>" method="post">
                                    <div class="card-body">
                                        <button type="submit" onclick="process()" name="submit" class="btn btn-info float-right">Simpan</button><br>
                                        <!-- <a href="<?= site_url('proposal/cetak_kartu') ?>" type="button" target="_blank" class="btn btn-info float-right">Print</a><br> -->
                                        <div class="form-group">
                                            <input type="hidden" id="id_proposal" name="id_proposal">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                                            <h5><label for="exampleInputjudul1">Batasan Masalah</label></h5>
                                            <textarea class="form-control" rows="5" id="batasan_masalah" name="batasan_masalah" placeholder="Masukkan Latar Belakang"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_4">
                                <form class="form-horizontal" action="<?php echo base_url() . 'proposal/add_tujuan'; ?>" method="post">
                                    <div class="card-body">
                                        <button type="submit" onclick="process()" name="submit" class="btn btn-info float-right">Simpan</button><br>
                                        <!-- <a href="<?= site_url('proposal/cetak_kartu') ?>" type="button" target="_blank" class="btn btn-info float-right">Print</a><br> -->
                                        <div class="form-group">
                                            <input type="hidden" id="id_proposal" name="id_proposal">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                                            <h5><label for="exampleInputjudul1">Tujuan</label></h5>
                                            <textarea class="form-control" rows="5" id="tujuan" name="tujuan" placeholder="Masukkan Latar Belakang"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_5">
                                <form class="form-horizontal" action="<?php echo base_url() . 'proposal/add_teori'; ?>" method="post">
                                    <div class="card-body">
                                        <button type="submit" onclick="process()" name="submit" class="btn btn-info float-right">Simpan</button><br>
                                        <!-- <a href="<?= site_url('proposal/cetak_kartu') ?>" type="button" target="_blank" class="btn btn-info float-right">Print</a><br> -->
                                        <div class="form-group">
                                            <input type="hidden" id="id_proposal" name="id_proposal">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                                            <h5><label for="exampleInputjudul1">Landasan Teori</label></h5>
                                            <textarea class="form-control" rows="5" id="teori" name="teori" placeholder="Masukkan Latar Belakang"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tab_6">
                                <form class="form-horizontal" action="<?php echo base_url() . 'proposal/add_metode'; ?>" method="post">
                                    <div class="card-body">
                                        <button type="submit" onclick="process()" name="submit" class="btn btn-info float-right">Simpan</button>
                                        <a href="<?= site_url('proposal/cetak_kartu') ?>" type="button" target="_blank" class="btn btn-info float-right">Print</a><br>
                                        <div class="form-group">
                                            <input type="hidden" id="id_proposal" name="id_proposal">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim" name="nim" placeholder="NIM">
                                            <input type="hidden" value="<?php echo $this->session->userdata('email'); ?>" class="form-control" id="nim2" name="nim2" readonly placeholder="NIM">
                                            <h5><label for="exampleInputjudul1">Metode Pengembangan</label></h5>
                                            <textarea class="form-control" rows="5" id="metode" name="metode" placeholder="Masukkan Latar Belakang"></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- ./card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END CUSTOM TABS -->
    </section>
</div>
<script type="text/javascript">
    CKEDITOR.replace('latar_belakang', {
        width: '100%',
        height: 500,
        enterMode: CKEDITOR.ENTER_P,

    });

    CKEDITOR.replace('rumusan_masalah', {
        width: '100%',
        height: 500,
    });

    CKEDITOR.replace('batasan_masalah', {
        width: '100%',
        height: 500,
    });

    CKEDITOR.replace('tujuan', {
        width: '100%',
        height: 500,
    });

    CKEDITOR.replace('teori', {
        width: '100%',
        height: 500,
    });

    CKEDITOR.replace('metode', {
        width: '100%',
        height: 500,
    });
</script>
<script>
    function process() {
        var textareaText = $('#latar_belakang').val();
        $('#output1').html(textareaText);

        textareaText = textareaText.replace(/\r?\n/g, '<br />');
        $('#output2').html(textareaText);
    }
</script>