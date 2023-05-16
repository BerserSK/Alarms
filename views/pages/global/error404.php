<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/style/error404.css">
    <title>Document</title>
</head>

<body>
    <div class="cont_principal">
        <div class="cont_error">

            <h1>Oops</h1>
            <p>La pagina buscada no ha sido encontrada.</p>
            <a href="index.php?paginaGlobal=login" class="btn btn-primary btn-back">Volver</a>
        </div>
        <div class="cont_aura_1"></div>
        <div class="cont_aura_2"></div>

    </div>

    <script>
        window.onload = function () {
            document.querySelector('.cont_principal').className = "cont_principal cont_error_active";

        }
    </script>
</body>

</html>