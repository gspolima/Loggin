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
        const $campo = $('#cep');
        let valorLimpo = removerPontosTracos(valor);

        $campo.val(valorLimpo);

        if(validarCEP(valorLimpo) === false) {
            $campoErro.addClass('uk-text-danger').text('CEP Inválido');
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}

 function removerPontosTracos(valorCru) {
    let limpo = false;
    let valorAtual = valorCru;
    const regex = /[^0-9]/;

    while(limpo === false) {
        valorAtual = valorAtual.replace(regex, "");
        let contemPontoTraco = valorAtual.includes(".") || valorAtual.includes("-");

        if (contemPontoTraco === false)
            limpo = true;
    }

    return valorAtual;
}