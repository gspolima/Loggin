function validarNumero(valor) {
    if (valor === null || valor === '')
        return 'Insira S/N se não houver número';

    let tamanho = String(valor).length;

    if (tamanho >= 10)
        return 'Não pode ter mais do que 10 caracteres';
    
    return true;
}

function validarCampoNumero(valor) {
    $(function () {
        const $campoErro = $('#erroNumero');
        const retorno = validarNumero(valor);

        if(retorno !== true) {
            $campoErro.addClass('uk-text-danger').text(retorno);
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}
