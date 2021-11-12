function validarNumero(valor) {
    if (valor === null || valor === '')
        return 'Insira S/N se não houver número';
    
    return true;
}

function validarCampoNumero(valor) {
    $(function () {
        const $campoErro = $('#erroNumero');
        const retorno = validarNumero(valor);

        if(retorno !== true) {
            $campoErro.addClass('uk-text-warning').text(retorno);
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}
