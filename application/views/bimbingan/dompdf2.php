<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Lembar Bimbingan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            margin-top: 50px;
            margin-left: 50px;
            margin-right: 50px;
            margin-bottom: 50px;
        }

        .body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        .header {
            position: fixed;
            left: 0px;
            top: -430px;
            right: 0px;
            /* height: 400px; */
            text-align: center;
            margin-bottom: 2cm;

        }

        .footer {
            position: fixed;
            left: 0px;
            bottom: -150px;
            right: 0px;
            height: 20px;
            text-align: center;
        }

        .footer .pagenum:before {
            content: counter(page);
        }

        .line-title {
            border: 0;
            border-style: inset;
            border-top: 3px solid #000;

        }

        .spasi {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            margin-bottom: 1px;

        }

        .tabel {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align-last: left;
        }

        .tabel2 {
            line-height: 30px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: left;
            margin-top: 5px;
            margin-bottom: 10px;
            margin-left: 4px;
            margin-right: 3px;
        }

        .tabel3 {
            line-height: 30px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: justify;
            text-align-last: right;
            margin-top: 10px;
            margin-bottom: 5px;
            margin-left: 5px;
            margin-right: 3px;
        }
    </style>

</head>

<body>
    <table border="0">
        <tr>
            <td width="100 px">
                <center><img src="http://localhost/sinta4/assets/img/PNM2.png" width="90" height="90"></center>
            </td>
            <td width="600 px" align="center">
                <font size="4,5" face="Times New Roman" color="black">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</font>
                <p class="spasi">
                    <font size="4"><b>POLITEKNIK NEGERI MADIUN</b><br></font>
                    <font size="4"><b>JURUSAN TEKNIK</b><br></font>
                    Jalan Serayu Nomor 84 Madiun Kode Pos 63133<br>
                    Telepon +62 351 452970 Faksimile +62 351 492960<br>
                    www.pnm.ac.id
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>
                    <hr class="line-title">
                </p>
            </td>
        </tr>

    </table>
    <table width="700 px" align="center">
        <tr>
            <td colspan="2">
                <center>
                    <p class="spasi" style="margin-bottom: 10px;">
                        <font size="4"><b>KARTU KONSULTASI / BIMBINGAN<br>
                                PENYUSUNAN TUGAS AKHIR MAHASISWA<br>
                                TAHUN AKADEMIK 2020 / 2021<br></b></font>
                    </p>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <p class="spasi">
                    Nama
                </p>
            </td>
            <td>
                <p class="spasi">
                    : <?= $get_mahasiswa->nama; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="spasi">
                    NPM
                </p>
            </td>
            <td>
                <p class="spasi">
                    : <?= $get_mahasiswa->nim; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td width="180 px">
                <p class="spasi">
                    Program Studi / Angkatan
                </p>
            </td>
            <td>
                <p class="spasi">
                    : <?= $get_mahasiswa->nama_prodi; ?> / <?= $get_mahasiswa->angkatan; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="spasi">
                    Alamat
                </p>
            </td>
            <td>
                <p class="spasi">
                    : <?= $get_mahasiswa->alamat; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="spasi">
                    TTL
                </p>
            </td>
            <td>
                <p class="spasi">
                    : <?= $get_mahasiswa->ttl; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="spasi">
                    No. HP
                </p>
            </td>
            <td>
                <p class="spasi">
                    : <?= $get_mahasiswa->hp; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="spasi">
                    Judul TA
                </p>
            </td>
            <td>
                <p class="spasi">
                    : <b><?= $topik_user->judul; ?>
                    </b></p>
            </td>
        </tr>
    </table>
    <main>
        <table border="1" width="700px" style="margin-top: 1cm;">
            <thead>
                <tr>
                    <th>
                        <p class="tabel" width="40px">
                            <b>No.</b>
                        </p>
                    </th>
                    <th width="100px">
                        <p class="tabel">
                            <b>Tgl</b>
                        </p>
                    </th>
                    <th width="230px">
                        <p class="tabel">
                            <b>Masalah Yang Dikonsultasikan</b>
                        </p>
                    </th>
                    <th width="230px">
                        <p class="tabel">
                            <b>Hasil Bimbingan</b>
                        </p>
                    </th>
                    <th width="100px">
                        <p class="tabel">
                            <b>Paraf</b>
                        </p>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($bimbingan_user_ta->result() as $row) { ?>

                    <tr class="tabel2">
                        <td>
                            <p class="tabel2">
                                <?= $no++ ?>.
                            </p>
                        </td>
                        <td>
                            <p class="tabel2">
                                <?php
                                $waktu = explode(" ", $get_tanggal->tanggal);
                                echo
                                ""  . shortdate_indo($waktu[0]) . " ";
                                ?>
                            </p>
                        </td>
                        <td>
                            <p class="tabel2">
                                <?= $row->masalah ?>
                            </p>
                        </td>
                        <td>
                            <p class="tabel2">
                                <?= $row->solusi ?>
                            </p>
                        </td>
                        <td>
                            <b></b>
                        </td>
                    </tr>
                <?php } ?>
            <tbody>
        </table>
    </main>

    <center>
        <table border="0" width="750px" style="margin-top: 2cm;">
            <tr class="tabel3">
                <td></td>
                <td>
                    <p>
                        Madiun,
                        <?php
                        $waktu = explode(" ", $get_tanggal->tanggal);
                        echo
                        ""  . mediumdate_indo($waktu[0]) . " ";
                        ?>
                    </p>
                </td>
            </tr>
            <tr class="tabel3">
                <td>Mengetahui,</td>
                <td>Menyetujui,</td>
            </tr>
            <tr class="tabel3">
                <td>

                    Ketua Jurusan <?= $get_mahasiswa->nama_jurusan; ?><br><br><br><br>

                </td>
                <td>

                    Pembimbing <?= $get_dosen->status_dosen; ?>, <br><br><br><br>

                </td>
            </tr>

            <tr class="tabel3">
                <td><b> Akbar Yanuar, S.ST., M.T.</b> </td>
                <td><b> <?= $get_dosen->nama; ?></b></td>
            </tr>
            <tr class="tabel3">
                <td>NIP 199601182014041111 </td>
                <td>NIP. <?= $get_dosen->nip; ?></td>
            </tr>
        </table>
    </center>

</body>

</html>