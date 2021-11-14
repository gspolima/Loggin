function validarLogin(valor) {
    if (valor === null || valor === '')
        return 'Insira um login';

    let tamanho = valor.length;
    if (tamanho < 4)
        return 'Login deve ter pelo menos 4 caracteres';

    if (tamanho >= 70)
        return 'Login deve ter no máximo 70 caracteres';

    return true;
}

function validarCampoLogin(valor) {
    $(function () {
        const $campoErro = $('#erroLogin');
        const retorno = validarLogin(valor);

        if(retorno !== true) {
            $campoErro.addClass('uk-text-danger').text(retorno);
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}