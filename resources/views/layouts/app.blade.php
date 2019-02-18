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
            $("#valor").inputmask( 'currency',{"autoUnmask": true,
                radixPoint:",",
                groupSeparator: ".",
                allowMinus: false,
                placeHolder: "0",
                digits: 2,
                digitsOptional: false,
                rightAlign: true,
                unmaskAsNumber: true
             });

            // Marca ou desmarca todos os checkbox
             $('#select_all').on('click', function() {
                var flag = $('#select_all').is(':checked');
                var hasAssinantesChecked = hasAssChecked();

                $(".checkboxItem").prop('checked', flag);
                $('#remove').prop('disabled', !hasAssinantesChecked);
             });

             $('.checkboxItem').on('click', function() {
                var hasAssinantesChecked = hasAssChecked();
                $('#remove').prop('disabled', !hasAssinantesChecked);
             });

             function hasAssChecked()
             {
                 var flag = false;
                $('.checkboxItem').each(function(index, elm) {
                    if ($(elm).is(':checked') === true) {
                        flag = true;
                        return;
                    }
                });

                return flag;
             }
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

        .form-list {
            width: 1140px;
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

