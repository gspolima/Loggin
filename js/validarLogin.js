function validarLogin(valor) {
    if (valor === null || valor === '') {
        return false;
    }
    return true;
}

function validarCampoLogin(valor) {
    $(function () {
        const $campoErro = $('#erroLogin');

        if(validarLogin(valor) === false) {
            $campoErro.addClass('uk-text-danger').text('Login não pode ser vazio.');
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}