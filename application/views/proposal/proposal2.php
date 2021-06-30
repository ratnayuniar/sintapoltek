<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Proposal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            margin: 70px 50px;
        }


        .body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
            white-space: pre-line;
        }

        .header {
            position: fixed;
            left: 0px;
            top: -70px;
            right: 0px;
            height: 100px;
            text-align: center;
        }

        .footer {
            position: fixed;
            left: 0px;
            bottom: -50px;
            right: 0px;
            height: 50px;
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
            margin-bottom: 4px;
            text-align-last: left;
        }

        .tabel2 {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: justify;
            margin-top: 1px;
            margin-bottom: 10px;
            margin-left: 3px;
            margin-right: 3px;
            line-height: 35px;

        }

        .tabel3 {
            line-height: 20px;
            font-family: 'Times New Roman', Times, serif;
            color: black;
            font-size: 12pt;
            text-align: justify;
            text-align-last: right;
            margin-top: 1px;
            margin-bottom: 10px;
            margin-left: 3px;
            margin-right: 3px;
        }
    </style>

</head>

<body>

    <div class="header">
    </div>

    <div class="footer">
        <font size="4,5" face="Times New Roman" color="black"><span class="pagenum"></span></font>
    </div>

    <main>
        <table border="0" width="700 px">
            <tbody>
                <tr>
                    <td>
                        <font size="4,5" face="Times New Roman" color="black">
                            <b>A. LATAR BELAKANG</b><br>
                            <p class="tabel2">
                                <?= $proposal_user->latar_belakang; ?>
                            </p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font size="4,5" face="Times New Roman" color="black">
                            <b>B. RUMUSAN MASALAH</b><br>
                            <p class="tabel2" style="text-align: justify;">
                                <?= $proposal_user->rumusan_masalah; ?>
                            </p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font size="4,5" face="Times New Roman" color="black">
                            <b>C. BATASAN MASALAH</b><br>
                            <p class="tabel2" style="text-align: justify;">
                                <?= $proposal_user->batasan_masalah; ?>
                            </p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font size="4,5" face="Times New Roman" color="black">
                            <b>D. TUJUAN</b><br>
                            <p class="tabel2" style="text-align: justify;">
                                <?= $proposal_user->tujuan; ?>
                            </p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font size="4,5" face="Times New Roman" color="black">
                            <b>E. TINJAUAN PUSTAKA / LANDASAN TEORI</b><br>
                            <p class="tabel2" style="text-align: justify;">
                                <?= $proposal_user->teori; ?>
                            </p>
                        </font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font size="4,5" face="Times New Roman" color="black">
                            <b>F. METODE PENELITIAN</b><br>
                            <p class="tabel2" style="text-align: justify;">
                                <?= $proposal_user->metode; ?>
                            </p>
                        </font>
                    </td>
                </tr>

                <!-- <tr class="tabel2"> -->
                <!-- <?= $proposal_user->rumusan_masalah; ?> -->
                <!-- </tr>
                <tr class="tabel2"> -->
                <!-- <?= $proposal_user->latar_belakang; ?> -->
                <!-- </tr> -->
            <tbody>
        </table>
    </main>
</body>

</html>