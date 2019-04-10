<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/inputmask@4.0.6/dist/jquery.inputmask.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.9/jquery.autocomplete.js"></script>
    <script>

        $(document).ready(function() {

            var config = {
                apiUrl: 'http://localhost:8000/'
            };

            $('#cpf').inputmask('999.999.999-99');
            $('#data_nascimento').inputmask('99/99/9999');
            $('#cep').inputmask('99999-999');
            $('#telefone').inputmask('(99) 9999[9]-9999');
            $('#valor').inputmask('R$ 9[9],99');

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
                $('#itens_marcados').val(ids);
                $('#excluir_itens_do_formulario').submit();
            });

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

                var cep = $('#cep').val();
                cep = cep.replace('-', '');

                var req = $.ajax({
                    method: 'GET',
                    url: config.apiUrl + '/api/endereco/' + cep
                });
                req
                    .done(fillAddress)
                    .catch(showError)
                    .fail(showFailError);
            });

            function fillAddress(response) {
                $('#tipo_logradouro').val(response.data.tipo_logradouro);
                $('#logradouro').val(response.data.logradouro);
                $('#bairro').val(response.data.bairro);
                $('#cidade').val(response.data.cidade);
                $('#estado').val(response.data.estado);
                $('#cep_nao_encontrado').html('');
            };

            function showError(response) {
                var data = response.responseJSON;
                $('#cep_nao_encontrado').html(data.message);
            }

            function showFailError() {
                alert('Houve um erro grave na sua aplicação.');
            }
        });
    </script>

    <script>
    //    Assinatura
        $(document).ready(function() {
            $('#revista').on('change', function(e) {
                var valor = $('option:selected', this).data('valor');
                $('#valor').val(valor);
            });

            $('#nome_assinante').on('change', function() {
                $('#assinante_id').val('');
            });

            $('#nome_assinante').autocomplete({
                serviceUrl: 'http://localhost:8000/api/assinante/',
                minLength: 1,
                onSelect: function (suggestion) {
                    var idAssinante = suggestion.data;
                    $('#assinante_id').val(idAssinante);
                }
            });
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

        .autocomplete-suggestions { border: 1px solid #999; background: #FFF; overflow: auto; }
        .autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
        .autocomplete-selected { background: #F0F0F0; }
        .autocomplete-suggestions strong { font-weight: normal; color: #3399FF; }
        .autocomplete-group { padding: 2px 5px; }
        .autocomplete-group strong { display: block; border-bottom: 1px solid #000; }
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

