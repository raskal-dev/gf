
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Certificat | PDF</title>

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

        body
        {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .certificate {
            position: relative;
            width: 297mm; /* Largeur pour le format A4 */
            height: 210mm; /* Hauteur pour le format A4 */
            margin: 0 auto;
            overflow: hidden;
            page-break-after: always;
        }

        .certificate-bg {
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .content {
            position: relative;
            padding: 40px;
            width: 257mm;
            height: 210mm;
        }

        h1 {
            font-size: 24px;
            margin-top: 0;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 0;
        }

        h3 {
            font-size: 20px;
            color: #007BFF;
            margin-top: 10px;
        }

        p {
            font-size: 16px;
            margin: 5px 0;
        }

        .signature {
            margin-top: 20px;
            text-align: right;
        }

        .signature p {
            margin-bottom: 10px;
        }

        .signature img {
            width: 150px;
            height: auto;
        }
        .top-img
        {
            font-size: 2rem;
        }
    </style>
    @php
        $now = \Carbon\Carbon::now()->format('d F Y');
    @endphp
  </head>
  <body>

    <div class="certificate">
        {{-- <img src="./img/background-certificat.jpg" alt="Fond du Certificat" class="certificate-bg"> --}}
        <div class="content">
            <div class="image">
                <img src="./img/presidence-logo.jpg" alt="R" srcset="" class="top-img img-fluid">
            </div>

            <h1>Certificat de Réussite</h1>
            <p>Délivré à </p>
            <h2><b>{{ $evaluation->personne->demande->nom }} {{ $evaluation->personne->demande->prenom }}</b></h2>
            <p>pour avoir réussi avec succès au </p>
            <h3>{{ $evaluation->personne->formation->module }}</h3>
            <p>avec Mention : <b><u>{{ $mention }}</u></b></p>
            <p>le {{ $now }}</p>
            <div class="signature">
                <p>Signature du Directeur</p>
                <br>
                <br>
                <br>
            </div>
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


