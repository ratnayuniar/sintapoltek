<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Verifikasi Perdaftaran Wisuda</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active"> Verifikasi Pendaftaran Wisuda</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content col-15">
        <div class="container-fluid col-15">
            <div class="row col-15">
                <div class="col-15">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Verifikasi Pendaftaran Wisuda</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" width=50%>
                                <thead>
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Nama Wisuda</th>
                                        <th colspan="3">File TA</th>
                                        <th colspan="3">File Jurnal</th>
                                        <th colspan="3">Lap.TA</th>
                                        <th colspan="3">Aplikasi</th>
                                        <th colspan="3">File PPT</th>
                                        <th colspan="3">File Video</th>
                                        <th rowspan="3">Aksi</th>
                                    </tr>
                                    <tr>
                                        <th>Blm</th>
                                        <th>Krg</th>
                                        <th>Lgkp</th>
                                        <th>Blm</th>
                                        <th>Krg</th>
                                        <th>Lgkp</th>
                                        <th>Blm</th>
                                        <th>Krg</th>
                                        <th>Lgkp</th>
                                        <th>Blm</th>
                                        <th>Krg</th>
                                        <th>Lgkp</th>
                                        <th>Blm</th>
                                        <th>Krg</th>
                                        <th>Lgkp</th>
                                        <th>Blm</th>
                                        <th>Krg</th>
                                        <th>Lgkp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Wisuda</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>
                                            <a href="<?= base_url('bks_wisuda/detail_verif_wisuda/' . $row->nim) ?>" class="btn btn-primary btn-sm">
                                                <i class="fa fa-search"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>