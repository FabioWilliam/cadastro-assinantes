<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>

        body {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .table th, .table td {
            text-align: center;
        }

        form {
            box-sizing: border-box;
            margin-top: 20px;
            width: 800px;
        }

        .row {
            border-bottom: 1px solid #e1e1e1!important;
            margin-left: 0!important;
            padding-bottom: 15px;
        }

        .form-action .btn {
            margin-left: 285px;
            padding-left: 80px;
            padding-right: 80px;
        }

    </style>
    <title>Sistema de Assinantes</title>
</head>
<body>
    <nav class="navbar navbar-expand fixed-top navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Editora Virtual</a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('assinantes.index') }}">Assinantes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Revistas</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

