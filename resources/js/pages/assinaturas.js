let $ = require('jquery');
let mask = require('inputmask');
let bootstrap = require('bootstrap');
let autocomplete = require('devbridge-autocomplete');

class Revistas {

    constructor(body) {
        this.body = body;
    }

    init() {
        this.maskFields();
        this.prepareAutocomplete();

        $('#revista').on('change', this.changeValueAssinatura.bind(this));
        $('#nome_assinante').on('change', this.cleanAssinanteId.bind(this));
    }

    maskFields() {
        mask('R$ 9[9],99').mask($(this.body).find('#valor'));
    }

    prepareAutocomplete() {
        var service = (window.location.hostname == 'localhost') ? 'http://localhost:8000/api/assinante/':'https://editoravirtual.online/api/assinante';
        $('#nome_assinante').autocomplete({
            serviceUrl: service,
            minLength: 1,
            onSelect: function (suggestion) {
                var idAssinante = suggestion.data;
                $('#assinante_id').val(idAssinante);
            }
        });
    }

    cleanAssinanteId() {
        $(this.body).find('#assinante_id').val('');
    };

    changeValueAssinatura() {
        var valor = $(this.body).find('option:selected', this).data('valor');
        $(this.body).find('#valor').val(valor);
    }
}

module.exports = Revistas;
