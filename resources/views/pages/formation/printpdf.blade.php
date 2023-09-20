
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>PDF</title>

    <style>

        .tableperso
        {
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .tableperso, th, td
        {
            border: 1px solid #000;
        }

        .image {
            text-align: center; /* Centre l'image horizontalement */
            margin-top: 15px; /* Ajustez la valeur en fonction de vos besoins (par exemple, 5px ou 15px) */
            margin-bottom: 0; /* Assurez-vous que le margin-bottom est à 0 pour que l'image soit au top */
        }

        .image img
        {
            max-width: 100%; /* Assurez-vous que l'image ne dépasse pas la largeur du contenant */
        }

    </style>
    @php
        $nowa = \Carbon\Carbon::now();
        $now = $nowa->format('d/m/Y');
    @endphp
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 d-flex justify-content-center align-items-center">
                {{-- <div class="image">
                    <img src="./build/assets/images/presidence-logo.jpg" alt="R" srcset="" class="img-fluid">
                </div> --}}
            </div>
        </div>
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h2 class="text-center text">Fiche de Présence</h2>
        </div>

        <p>
            <b><u>Formation</u></b> : {{ $formation->module }}
            <br>
            <b><u>Date</u></b> : {{ $now }}
        </p>
        <br><br>
        <div class="row">

            <table class="tableperso">
                <thead>
                    <tr>
                        <th style="width: 30%px">Matricule</th>
                        <th style="width: 50%px">Nom et Prénom</th>
                        <th style="width: 20%px">Signature</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personnesFormations as $pf)
                    <tr>
                        <td>{{ $pf->matricule }}</td>
                        <td>{{ $pf->demande->nom }} {{ $pf->demande->prenom }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>


