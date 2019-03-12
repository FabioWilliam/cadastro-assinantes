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
                $(".checkboxItem").prop('checked', flag);

                var hasAssinantesChecked = hasAssChecked();
                $('#remover').prop('disabled', !hasAssinantesChecked);
             });

             $('.checkboxItem').on('click', function() {
                var hasAssinantesChecked = hasAssChecked();
                $('#remover').prop('disabled', !hasAssinantesChecked);
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

            $('#remover').on('click', function() {
                var ids = '';

                if (! confirm('Você deseja realmente apagar este assinante?')) {
                    return false;
                }

                $('.checkboxItem').each(function(index, elm) {
                    if ($(elm).is(':checked') === true) {
                        ids = ids + $(elm).val() + '|';
                    }
                });
                $('#assinantes_marcados').val(ids);
            });

            // function setParam(param, value)
            // {
            //     var url = window.location.href;
            //     var urlFragments = url.split('?');
            //     var hasQueryString = !(typeof urlFragments[1] === 'undefined');
            //     var queryString = hasQueryString ? urlFragments[1] : '';
            //     var params = hasQueryString ? queryString.split('&') : [];
            //     var queryObject = {};
            //     var serializedQueryString = '';

            //     params.forEach(function(value) {
            //         var current = value.split('=');
            //         queryObject[current[0]] = current[1];
            //     });

            //     queryObject[param] = value;
            //     serializedQueryString = $.param(queryObject);

            //     return serializedQueryString;
            // }

            // $('#search_ativo').on('change', function(e) {
            //     var status = $(e.target).val();
            //     var querString = setParam('status', status);

            //     location.href = location.origin + location.pathname + '?' + querString;
            // });

            $('#search_ativo').on('change', function() {
                var status = $('#search_ativo').val();
                var search = window.location.search;
                var currentUrl = window.location.href;
                var url = '';

                if  (search == '') {
                    window.location.href = currentUrl + '?status=' + status;
                    return true;
                }

                var url = currentUrl;
                url = url.replace('=todos', '=' + status);
                url = url.replace('=ativos', '=' + status);
                url = url.replace('=inativos', '=' + status);

                window.location.href = url;
            });

            $('#cep').on('change', function() {

            }
            )
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

