$(document).ready(function () {
    $("#form_clients").validate({
        rules: {
            name: {
                required: true,
                rangelength: [10, 50]
            },
            email: {
                required: true,
                email,
            },
            phone: {
                required: true
            }
        },
        messages: {
            name: {
                required: 'Necessário informar nome completo.',
                rangelength: 'O nome precisa ter entre 5 a 50 caracteres.'
            },
            email: {
                required: 'Necessário informar email.',
                email: 'Informe um email válido'
            },
            phone: {
                required: 'Necessário informar telefone.',
            }
        }
    });
    $("#phone").mask('(00) 00000-0000');
});