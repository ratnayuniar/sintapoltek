<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Liste des personnes</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            margin: 100px 50px;
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
            top: -100px;
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
    </style>

</head>

<body>
    {{-- -------------------------------------------------------- --}}
    {{-- pour ajouter une entete et un pied de page au pdf g?n?r? --}}
    {{-- -------------------------------------------------------- --}}
    <div class="header">
        <h2>Liste des personnes</h2>
    </div>
    <div class="footer">

        Page <span class="pagenum"></span>
    </div>

    <table class="table table-striped">
        <tbody>

            @foreach($liste_personnes as $personne)

            <tr>
                <td class="text-center">
                    <img style="height: 80px" src="{{ asset($personne->nom_photo_vignette) }}" alt="pas de photo">
                </td>
                <td>
                    <strong>{{ $personne->nom.' '.$personne->prenom }}</strong><br>
                    {{ $personne->adresse1 }}<br>
                    {{ $personne->code_postal.' '.$personne->commune }}
                </td>
                <td>
                    n?(e) le {{ $personne->date_naissance_dmY }}<br>
                    {{ $personne->libelle_role }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>