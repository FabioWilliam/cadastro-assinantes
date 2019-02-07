<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/inputmask@4.0.6/dist/jquery.inputmask.bundle.js"></script>
    <script>

        $(document).ready(function() {
            $('#cpf').inputmask('999.999.999-99');
            $('#data_nascimento').inputmask('99/99/9999');
            $('#cep').inputmask('99999-999');
            $('#telefone').inputmask('(99) 99999-9999');
        });

    </script>
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

        .field-optional {
            color: #aaa;
            font-size: 15px;
            margin-left: 5px;
        }

    </style>
    <title>Sistema de Assinantes</title>
</head>
<body>
    @include('layouts.nav')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

