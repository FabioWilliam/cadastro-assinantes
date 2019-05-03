let $   = require('jquery');
let app = {};

// let popper = require('popper.js');
// let bootstrap = require('bootstrap');

app['assinantes']  = require('./pages/assinantes');
app['assinaturas'] = require('./pages/assinaturas');
app['revistas']    = require('./pages/revistas');

$(document).ready(function() {
    var module = $('body').data('module');

    if (app[module]) {
        var currentModule = new app[module](document.body);
        currentModule.init();
    } else {
        console.log("Module '%s' could not be loaded.", module);
    }
});
