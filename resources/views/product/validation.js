$(document).ready(function () {
    $("#form_products").validate({
        rules: {
            name: {
                required: true,
                rangelength: [3, 40]
            },
            value: {
                required: true,
            },
        },
        messages: {
            name: {
                required: 'Necessário informar nome do produto.',
                rangelength: 'O nome do produto precisa ter entre 3 a 40 caracteres.'
            },
            value: {
                required: 'Necessário informar um valor.',
            },
        }
    });
});