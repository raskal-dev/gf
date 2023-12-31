
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
    </style>
  </head>
  <body>
    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text">Relever de Note</h1>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <span class="fw-bold">Nom : </span><span>{{ $evaluation->personne->demande->nom }}</span>

                <br>

                <span class="fw-bold">Prénom : </span><span>{{ $evaluation->personne->demande->prenom }}</span>

            </div>
        </div>

        <div class="row">

            <table class="tableperso">
                <thead>
                    <tr>
                        <th style="width: 50%px">Label</th>
                        <th style="width: 50%px">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($notes as $note)
                    <tr>
                        <td>{{ $note->label }}</td>
                        <td>{{ $note->note }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total : </td>
                        <td>{{ $notestotal }}</td>
                    </tr>
                    <tr>
                        <td>Moyenne : </td>
                        <td>{{ $moyentype }}</td>
                    </tr>


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


