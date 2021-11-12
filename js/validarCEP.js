function validarCEP(valor) {

    // Remove tudo o que não é número para fazer a pesquisa
    let cep = valor.replace(/[^0-9]/, "");

    if (cep.length != 8) {
        return false;
    }

    let url = `https://viacep.com.br/ws/${cep}/json/`;

    $.getJSON(url, function (dadosRetorno) {
        try {
            // Preenche os campos de acordo com o retorno da pesquisa
            $("#logradouro").val(dadosRetorno.logradouro);
            $("#bairro").val(dadosRetorno.bairro);
            $("#cidade").val(dadosRetorno.localidade);
            $("#uf").val(dadosRetorno.uf);
            return true;
        } catch (ex) {
            return false;
        }
    });
}

function validarCampoCEP(valor) {
    $(function () {
        const $campoErro = $('#erroCEP');

        if(validarCEP(valor) === false) {
            $campoErro.addClass('uk-text-danger').text('CEP deve ser preenchido');
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}