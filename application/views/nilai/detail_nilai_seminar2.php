<?php if (($this->session->userdata('level') == 3) || ($this->session->userdata('level') == 4)) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Input Nilai Mahasiswa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Nilai Seminar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <div class="card card-info ">
                            <div class="card-header">
                                <h3 class="card-title">Data Nilai Seminar Proposal</h3>
                            </div>
                            <form action="<?php echo base_url() . 'nilai_seminar/add'; ?>" method="post" class="form-horizontal" role="form">
                                <div class="card-body">
                                    <?php
                                    $this->db->select('*');
                                    $this->db->from('nilai_sempro');
                                    $this->db->where(array('id_dosen' => $this->session->userdata('id_dosen')));
                                    $this->db->where('nim', $this->uri->segment(3));
                                    $result = $this->db->get()->row();
                                    ?>
                                    
                                    <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Perumusan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="perumusan" name="perumusan" min="0" max="100" value="<?php if (empty($result->perumusan)) echo "";
                                                                                                                                        else echo $result->perumusan ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Teori</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="teori" name="teori" min="0" max="100" value="<?php if (empty($result->teori)) echo "";
                                                                                                                                        else echo $result->teori ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Pemecahan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="pemecahan" name="pemecahan" min="0" max="100" value="<?php if (empty($result->pemecahan)) echo "";
                                                                                                                                                else echo $result->pemecahan ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Penulisan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="penulisan" name="penulisan" min="0" max="100" value="<?php if (empty($result->penulisan)) echo "";
                                                                                                                                                else echo $result->penulisan ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Daftar Pustaka</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="pustaka" name="pustaka" min="0" max="100" value="<?php if (empty($result->pustaka)) echo "";
                                                                                                                                            else echo $result->pustaka ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Presentasi</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="presentasi" name="presentasi" min="0" max="100" value="<?php if (empty($result->presentasi)) echo "";
                                                                                                                                                    else echo $result->presentasi ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Penguasaan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="penguasaan" name="penguasaan" min="0" max="100" value="<?php if (empty($result->penguasaan)) echo "";
                                                                                                                                                    else echo $result->penguasaan ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Nilai Rata - Rata</label>
                                        <div class="col-sm-5">
                                            <input readonly type="text" class="form-control" id="rata_rata" name="rata" placeholder="Nilai rata rata " 
                                            value="<?php if (empty($result->rata)) echo "";
                                            else echo $result->rata ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label ">Nilai Akhir Laporan</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control " id="nilai" name="nilai_akhir" 
                                            value="<?php if (empty($result->nilai_akhir)) echo "";
                                            else echo $result->nilai_akhir ?>"readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" onclick="jumlahnilai()" class="btn btn-info float-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#perumusan, #teori, #pemecahan, #penulisan, #pustaka, #presentasi, #penguasaan").keyup(function() {
                var perumusan = $("#perumusan").val();
                var teori = $("#teori").val();
                var pemecahan = $("#pemecahan").val();
                var penulisan = $("#penulisan").val();
                var pustaka = $("#pustaka").val();
                var presentasi = $("#presentasi").val();
                var penguasaan = $("#penguasaan").val();

                var rata_rata = (parseInt(perumusan) + parseInt(teori) + parseInt(pemecahan) + parseInt(penulisan) + parseInt(pustaka)) / 5;
                var nilai_akhir = ((parseInt(rata_rata) * 3) + (2 * parseInt(presentasi)) + (2 * parseInt(penguasaan))) / 7;
                $("#rata_rata").val(Math.round(rata_rata));
                $("#nilai").val(Math.round(nilai_akhir));
            });
        });
    </script>

<?php } else { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <?php
                        $this->db->select('*');
                        $this->db->from('mahasiswa');
                        // $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
                        $this->db->where("mahasiswa.nim", $nilai_sempro->nim);
                        $result = $this->db->get()->row();
                        ?>
                        <h1>Nilai Mahasiswa <?php echo $result->nama ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda'); ?>">Beranda</a></li>
                            <li class="breadcrumb-item active">Data Nilai Seminar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $this->db->select('*');
        $this->db->from('nilai_sempro');
        $this->db->where('nim', $nilai_sempro->nim);
        $result = $this->db->get();
        foreach ($result->result() as $row) {
            $data['namadosen'] = $this->m_pembimbing->getdosen1($row->id_dosen);
        ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Data Nilai Penguji <?php echo $data['namadosen']->nama ?> Seminar Proposal</h3>
                                </div>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Perumusan Masalah, Tujuan dan Manfaat TA</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="perumusan" name="perumusan" value="<?= $row->perumusan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Kerangka Teori Penunjang</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="teori" name="teori" value="<?= $row->teori; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Pemecahan Masalah</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="pemecahan" name="pemecahan" value="<?= $row->pemecahan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Sistematika Penulisan dan Bahasa</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="penulisan" name="penulisan" value="<?= $row->penulisan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Sumber Pustaka</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="pustaka" name="pustaka" value="<?= $row->pustaka; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Penyajian / Presentasi</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="presentasi" name="presentasi" value="<?= $row->presentasi; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Penguasaan Materi dalam Menjawab Pertanyaan</label>
                                        <div class="col-sm-1">
                                            <input type="number" class="form-control" id="penguasaan" name="penguasaan" value="<?= $row->penguasaan; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Rata - Rata Nilai Isi</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="rata" name="rata" value="<?= $row->rata; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-5 col-form-label">Nilai Akhir Proposal TA</label>
                                        <div class="col-sm-2">
                                            <input type="number" class="form-control" id="nilai_akhir" name="nilai_akhir" value="<?= $row->nilai_akhir; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <?php
                                $this->db->select('*');
                                $this->db->from('mahasiswa');
                                // $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
                                $this->db->where("mahasiswa.nim", $nilai_sempro->nim);
                                $result = $this->db->get()->row();
                                ?>
                                <h3 class="card-title">Total Hasil Nilai Akhir Mahasiswa <?php echo $result->nama ?></h3>
                            </div>
                            <div class="card-body">
                                <?php
                                $this->db->select('AVG(rata) as rata, sum(nilai_akhir) as nilaiakhir');
                                $this->db->where('nim', $row->nim);
                                $result = $this->db->get('nilai_sempro')->row();
                                ?>
                                <?= $result->nilaiakhir ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <?php
                                $this->db->select('*');
                                $this->db->from('mahasiswa');
                                // $this->db->join('mahasiswa', 'mahasiswa.nim=user.nim');
                                $this->db->where("mahasiswa.nim", $nilai_sempro->nim);
                                $result = $this->db->get()->row();
                                ?>
                                <h3 class="card-title">Rata - Rata Nilai Akhir Mahasiswa <?php echo $result->nama ?></h3>
                            </div>
                            <div class="card-body">
                                <?php
                                $this->db->select('AVG(rata) as rata, sum(nilai_akhir) as nilaiakhir');
                                $this->db->where('nim', $row->nim);
                                $result = $this->db->get('nilai_sempro')->row();
                                $rata = number_format($result->rata, 1, '.', '');
                                ?>
                                <?= $rata ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>