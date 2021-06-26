<!-- <script type="text/javascript" src="<?= base_url("assets/ckeditor/ckeditor.js") ?>"></script> -->
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Ajukan Proposal</h3>
                        </div>
                        <form class="form-horizontal" action="<?php echo base_url() . 'proposal/add'; ?>" method="post">
                            <div class="card-body">
                                <a href="<?= site_url('proposal/cetak_kartu') ?>" type="button" class="btn btn-info float-right">Print</a><br>
                                <div class="form-group">
                                    <input type="hidden" id="id_proposal" name="id_proposal">
                                    <label for="exampleInputjudul1">Latar Belakang</label>
                                    <textarea class="form-control" rows="5" id="latar_belakang" name="latar_belakang" placeholder="Masukkan Latar Belakang"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Rumusan Masalah</label>
                                    <pre><textarea class="form-control" rows="5" id="rumusan_masalah" name="rumusan_masalah" placeholder="Masukkan Rumusan Masalah"></textarea></pre>
                                </div>
                                <div class=" form-group">
                                    <label for="exampleInputjudul1">Batasan Masalah</label>
                                    <pre><textarea class="form-control" rows="5" id="batasan_masalah" name="batasan_masalah" placeholder="Masukkan Batasan Masalah"></textarea></pre>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Tujuan</label>
                                    <pre><textarea class="form-control" rows="5" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan"></textarea></pre>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Tinjauan Pustaka / Landasan Teori</label>
                                    <pre><textarea class="form-control" rows="5" id="teori" name="teori" placeholder="Masukkan Tinjauan Pustaka"></textarea></pre>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Metodelogi Penelitian</label>
                                    <pre><textarea class="form-control" rows="5" id="metode" name="metode" placeholder="Masukkan Metodelogi Penelitian"></textarea></pre>
                                </div>

                            </div>
                            <div class="card-footer">
                                <!-- <button type="submit" class="btn btn-default ">Batal</button> -->
                                <button type="submit" onclick="process()" name="submit" class="btn btn-info float-right">Simpan</button>
                                <!-- <a href="<?= site_url('proposal/cetak_kartu') ?>" type="button" class="btn btn-primary">Print</a> -->
                                <!-- <a href="<?= base_url('proposal/halaman_cetak/' . $row->id_proposal) ?>" type="button" class="btn btn-primary">Cetak Proposal</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            </form>
            <!-- <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Isi Proposal</h3>
                        </div>
                        <form class="form-horizontal" action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" id="id_proposal" name="id_proposal">
                                    <label for="exampleInputjudul1">Latar Belakang</label>
                                    <textarea class="form-control" rows="5" id="latar_belakang" name="latar_belakang" readonly><?= $proposal_user->latar_belakang; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Rumusan Masalah</label>
                                    <textarea class="form-control" rows="5" id="rumusan_masalah" name="rumusan_masalah" readonly><?= $proposal_user->rumusan_masalah; ?></textarea>
                                </div>
                                <div class=" form-group">
                                    <label for="exampleInputjudul1">Batasan Masalah</label>
                                    <textarea class="form-control" rows="5" id="batasan_masalah" name="batasan_masalah" readonly><?= $proposal_user->batasan_masalah; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Tujuan</label>
                                    <textarea class="form-control" rows="5" id="tujuan" name="tujuan" readonly><?= $proposal_user->tujuan; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Tinjauan Pustaka / Landasan Teori</label>
                                    <textarea class="form-control" rows="5" id="teori" name="teori" readonly><?= $proposal_user->teori; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputjudul1">Metodelogi Penelitian</label>
                                    <textarea class="form-control" rows="5" id="metode" name="metode" readonly><?= $proposal_user->metode; ?></textarea>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default ">Batal</button>
                                <button type="submit" class="btn btn-info float-right">Simpan</button>
                                <a href="<?= site_url('proposal/cetak_kartu') ?>" type="button" class="btn btn-primary">Print</a> -->
            <!-- <a href="<?= base_url('proposal/halaman_cetak/' . $row->id_proposal) ?>" type="button" class="btn btn-primary">Cetak Proposal</a> -->
            <!-- </div>
                        </form>

                    </div>
                </div>
            </div> -->
        </div>
    </section>
</div>
<!-- <script type="text/javascript">
    CKEDITOR.replace('latar_belakang', {
        filebrowserImageBrowseUrl: "<?= base_url('assets/kcfinder/browse.php'); ?>",
        width: '100%',
        height: 500,
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
</script> -->
<!-- Summernote -->
<!-- <script src="<?php echo base_url(); ?>admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        //Add text editor
        $('#compose-textarea').summernote()
    })
</script> -->
<!-- <script type="text/javascript">
    $(function() {
        CKEDITOR.replace('latar_belakang', {
            filebrowserImageBrowseUrl: '<?php echo base_url('assets/kcfinder/browse.php'); ?>',
            height: '400px'
        });
    });
</script> -->
<!-- <link href="summernote.css" rel="stylesheet">
<script src="summernote.js"></script> -->
<script>
    function process() {
        var textareaText = $('#latar_belakang').val();
        $('#output1').html(textareaText);

        textareaText = textareaText.replace(/\r?\n/g, '<br />');
        $('#output2').html(textareaText);
    }
</script>