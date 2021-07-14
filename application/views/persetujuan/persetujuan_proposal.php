<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Persetujuan Proposal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Persetujuan Proposal</li>
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
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Dosen Pembimbing 1</th>
                                        <th>Dosen Pembimbing 1</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $no = 1;
                                    foreach ($query3->result() as $row) :
                                        $data['user'] = $this->m_pembimbing->getmahasiswabyid($row->nim);
                                        $data['dosen1'] = $this->m_pembimbing->getdosen1($row->pembimbing1);
                                        $data['dosen2'] = $this->m_pembimbing->getdosen2($row->pembimbing2); ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $data['user']->nama ?></td>
                                            <td><?= $data['dosen1']->nama ?></td>
                                            <td><?= $data['dosen2']->nama ?></td>


                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>