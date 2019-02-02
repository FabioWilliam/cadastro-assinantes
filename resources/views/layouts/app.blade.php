<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .table th, .table td {
            text-align: center;
        }

        form {
            margin: 0 auto;
            width: 800px;
        }

        .row {
            border-bottom: 1px solid #e1e1e1!important;
            padding-bottom: 15px;
        }

    </style>
    <title>Sistema de Assinantes</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">Assinantes</a>
        </nav>
        @yield('content')
    </div>
</body>
</html>

