let $ = require('jquery');
let mask = require('inputmask');

class Revistas {

    constructor(body) {
        this.body = body;
    }

    init() {
        this.maskFields();
    }

    maskFields() {
        mask('R$ 9[9],99').mask($(this.body).find('#valor'));
    }
}

module.exports = Revistas;
