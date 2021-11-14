function validarLogradouro(valor) {
    if (valor === null || valor === '')
        return 'Insira uma rua/avenida';

    let tamanho = valor.length;
    if (tamanho < 5)
        return 'Endereço deve ter pelo menos 5 caracteres';

    if (tamanho >= 40)
        return 'Endereço deve ter no máximo 40 caracteres';

    return true;
}

function validarCampoLogradouro(valor) {
    $(function () {
        const $campoErro = $('#erroLogradouro');
        const retorno = validarLogradouro(valor);

        if(retorno !== true) {
            $campoErro.addClass('uk-text-danger').text(retorno);
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}