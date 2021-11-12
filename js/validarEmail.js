function validarEmail(valor) {

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
        //alert("email valido");
        //document.getElementById("msgemail").value = '';
    } else {
        // alert("E-mail invalido");
        // document.getElementById("email").value = '';
        return false
    }
}

function validarCampoEmail(valor) {
    $(function () {
        const $campoErro = $('#erroEmail');

        if(validarEmail(valor) === false) {
            $campoErro.addClass('uk-text-danger').text('Email Inválido');
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}