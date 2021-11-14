function validarEmail(valor) {

    let tamanho = String(valor).length;
    if (tamanho >= 70)
        return 'Email deve ter no máximo 70 caracteres';

	usuario = valor.substring(0, valor.indexOf("@"));
    dominio = valor.substring(valor.indexOf("@") + 1, valor.length);

    if ((usuario.length >= 1) &&
            (dominio.length >= 3) &&
            (usuario.search("@") == -1) &&
            (dominio.search("@") == -1) &&
            (usuario.search(" ") == -1) &&
            (dominio.search(" ") == -1) &&
            (dominio.search(".") != -1) &&
            (dominio.indexOf(".") >= 1) &&
            (dominio.lastIndexOf(".") < dominio.length - 1)) {

        return true;
    } else {
        return 'Email em formato inválido';
    }
}

function validarCampoEmail(valor) {
    $(function () {
        const $campoErro = $('#erroEmail');
        const retorno = validarEmail(valor);

        if(retorno !== true) {
            $campoErro.addClass('uk-text-danger').text(retorno);
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}