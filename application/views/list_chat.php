<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Diskusi Bimbingan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('beranda'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Diskusi Bimbingan</li>
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
                            <h3 class="card-title">Diskusi Bimbingan</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Mahasiswa</th>
                                        <th>Dosen Pembimbing 1</th>
                                        <th>Dosen Pembimbing 2</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;
                                    foreach ($query->result() as $row) :
                                        $data['user'] = $this->m_pembimbing->getmahasiswabyid2($row->nim);
                                        $data['dosen1'] = $this->m_pembimbing->getdosen1($row->pembimbing1);
                                        $data['dosen2'] = $this->m_pembimbing->getdosen2($row->pembimbing2);
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['user']->nama; ?></td>
                                            <td><?php echo $data['dosen1']->nama; ?></td>
                                            <td><?php echo $data['dosen2']->nama; ?></td>
                                            <td><a href='<?php echo site_url('bimbingandosen/reply/' . $row->nim); ?>' class='on-default edit-row btn btn-primary'>Masuk Diskusi</a>
                                            </td>
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
        </div>
    </section>
</div>