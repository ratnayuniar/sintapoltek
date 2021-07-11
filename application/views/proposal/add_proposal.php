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
        <div class="container-fluid">
            <?php $cek = $this->db->get_where('topik', array('nim' => $this->session->userdata('email')))->row_array(); ?>
            <?php if ($cek['status'] == 3) { ?>
                <div class="row">
                    <div class="col-4">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Upload Revisi</h3>
                            </div>
                            <?php echo form_open_multipart('revisi_upload/upload_berkas'); ?>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Upload Revisi</label>
                                    <div class="col-sm-4">
                                        <input type="file" name="file_revisi" id="file_revisi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </div>
                            </form>
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
                                Revisi Anda belum selesai, segera hubungi dosen penguji, selesaikan revisian Anda dan minta persetujuan ke dosen penguji Anda.
                            </div>
                        </div>
                    </div>
                </div>



            <?php } ?>
        </div>
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