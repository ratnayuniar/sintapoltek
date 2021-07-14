<div class="content-wrapper">
    <section class="content-header">
        <div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profil Tugas Akhir</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Profil Tugas Akhir</li>
                        </ol>
                    </div>
                </div>
            </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Profil Tugas Akhir</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6" style="float :left">
                                <strong><i class="fas fa-book mr-1"></i> Judul</strong>
                                <p class="text-muted">
                                    <?= $judul->row()->judul ?>
                                </p>
                                <hr>
                                <?php
                                $no = 1;
                                foreach ($query_pembimbing->result() as $row) {
                                    $data['user'] = $this->m_pembimbing->getmahasiswabyid($row->nim);
                                    $data['dosen1'] = $this->m_pembimbing->getdosen1($row->pembimbing1);
                                    $data['dosen2'] = $this->m_pembimbing->getdosen2($row->pembimbing2);
                                    echo
                                    "
                                <strong><i class='fas fa-user-tie'></i> Dosen Pembimbing 1</strong>
                                <p class='text-muted'>" . $data['dosen1']->nama . "</p><hr>
                                <strong><i class='fas fa-user-tie'></i> Dosen Pembimbing 2</strong>
                                <p class='text-muted'>" . $data['dosen2']->nama . "</p><hr>";
                                }
                                ?>
                            </div>
                            <div class="col-md-6" style="float :right">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Penelitian</strong>
                                <p class="text-muted"><?= $tempat->row()->lokasi ?></p>
                                <hr>
                                <?php
                                $no = 1;
                                foreach ($query2->result() as $row) {
                                    $data['user'] = $this->m_penguji->getmahasiswabyid($row->nim);
                                    $data['dosen1'] = $this->m_penguji->getdosen1($row->penguji1_sempro);
                                    $data['dosen2'] = $this->m_penguji->getdosen2($row->penguji2_sempro);
                                    $data['dosen3'] = $this->m_penguji->getdosen3($row->penguji3_sempro);
                                    echo
                                    "
                                <strong><i class='fas fa-user-edit'></i> Dosen Penguji 1 Seminar Proposal</strong>
                                <p class='text-muted'>" . $data['dosen1']->nama . "</p><hr>
                                <strong><i class='fas fa-user-edit'></i> Dosen Penguji 2 Seminar Proposal</strong>
                                <p class='text-muted'>" . $data['dosen2']->nama . "</p><hr>
                                <strong><i class='fas fa-user-edit'></i> Dosen Penguji 3 Seminar Proposal</strong>
                                <p class='text-muted'>" . $data['dosen3']->nama . "</p><hr>
                                ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>