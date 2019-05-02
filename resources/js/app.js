let $ = require('jquery');
let mask = require('inputmask');
let autocomplete = require('devbridge-autocomplete');
let popper = require('popper.js');
let bootstrap = require('bootstrap');

$(document).ready(function() {
    // parte 1
    var config = {
        apiUrl: 'http://localhost:8000/'
    };

    mask('999.999.999-99').mask($('#cpf'));
    mask('99/99/9999').mask($('#data_nascimento'));
    mask('99999-999').mask($('#cep'));
    mask('(99) 9999[9]-9999').mask($('#telefone'));
    mask('R$ 9[9],99').mask($('#valor'));

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
        console.log(config.apiUrl + '/api/endereco/' + cep);
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

    // parte 2
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
