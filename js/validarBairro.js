function validarBairro(valor) {
    if (valor === null || valor === '')
        return 'Insira um bairro ou distrito';
    
    let tamanho = valor.length;
    if (tamanho < 2)
        return 'Bairro deve ter pelo menos 2 caracteres';

    if (tamanho >= 40)
        return 'Bairro deve ter no máximo 40 caracteres';

    return true;
}

function validarCampoBairro(valor) {
    $(function () {
        const $campoErro = $('#erroBairro');
        const retorno = validarBairro(valor);

        if(retorno !== true) {
            $campoErro.addClass('uk-text-danger').text(retorno);
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}