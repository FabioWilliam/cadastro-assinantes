let $ = require('jquery');
let mask = require('inputmask');
let bootstrap = require('bootstrap');

class Assinantes {

    constructor(body) {
        this.apiUrl = 'http://localhost:8000';
        this.body = body;
    }

    init() {
        this.maskFields();

        $(this.body).find('#select_all').on('click', this.selectAll.bind(this));
        $(this.body).find('.checkboxItem').on('click', this.enableDeleteButton.bind(this));
        $(this.body).find('#remover').on('click', this.deleteMarkedAssinante.bind(this));
        $(this.body).find('#search_ativo').on('change', this.changeStatusFilterAssinante.bind(this));
        $(this.body).find('#cep').on('change', this.changeAddressFields.bind(this));
    }

    changeAddressFields() {
        var cep = $(this.body).find('#cep').val();
        cep = cep.replace('-', '');

        var req = $.ajax({
            method: 'GET',
            headers: {'X-Token': 'u0f73fh4tr2hphnafi8rpcjv8652nvg7'},
            url: this.apiUrl + '/api/endereco/' + cep
        });

        req
            .done(this.fillAddress.bind(this))
            .catch(this.showError.bind(this))
            .fail(this.showFailError.bind(this));
    }

    fillAddress(response) {
        $(this.body).find('#tipo_logradouro').val(response.data.tipo_logradouro);
        $(this.body).find('#logradouro').val(response.data.logradouro);
        $(this.body).find('#bairro').val(response.data.bairro);
        $(this.body).find('#cidade').val(response.data.cidade);
        $(this.body).find('#estado').val(response.data.estado);
        $(this.body).find('#cep_nao_encontrado').html('');
    }

    showError(response) {
        var data = response.responseJSON;
        $(this.body).find('#cep_nao_encontrado').html(data.message);
    }

    showFailError() {
        alert('Houve um erro grave na sua aplicação.');
    }

    changeStatusFilterAssinante() {
        var status = $(this.body).find('#search_ativo').val();
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
    }

    enableDeleteButton() {
        var hasAssinantesChecked = this.hasAssinantesChecked();
        $(this.body).find('#remover').prop('disabled', !hasAssinantesChecked);
    }

    selectAll() {
        var flag = $(this.body).find('#select_all').is(':checked');
        $(this.body).find('.checkboxItem').prop('checked', flag);

        var hasAssinantesChecked = this.hasAssinantesChecked();
        $(this.body).find('#remover').prop('disabled', !hasAssinantesChecked);
    }

    hasAssinantesChecked() {
        var flag = false;

        $(this.body).find('.checkboxItem').each(function(index, elm) {
            if ($(this.body).find(elm).is(':checked') === true) {
                flag = true;
                return;
            }
        }.bind(this));

        return flag;
    }

    deleteMarkedAssinante() {
        var ids = '';

        if (! confirm('Você deseja realmente apagar este assinante?')) {
            return false;
        }

        $(this.body).find('.checkboxItem').each(function(index, elm) {
            if ($(this.body).find(elm).is(':checked') === true) {
                ids = ids + $(this.body).find(elm).val() + '|';
            }
        }.bind(this));

        $(this.body).find('#itens_marcados').val(ids);
        $(this.body).find('#excluir_itens_do_formulario').submit();
    }

    maskFields() {
        mask('999.999.999-99').mask($(this.body).find('#cpf'));
        mask('99/99/9999').mask($(this.body).find('#data_nascimento'));
        mask('99999-999').mask($(this.body).find('#cep'));
        mask('(99) 9999[9]-9999').mask($(this.body).find('#telefone'));
    }
}

module.exports = Assinantes;
