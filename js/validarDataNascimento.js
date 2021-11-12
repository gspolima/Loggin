function validarDataNascimento() {

    var elemento = document.getElementById("dataNascimento").value;
    //console.info(elemento);
    //elemento.setYear(elemento.getYear() + 17);
    var date = new Date(elemento.split('/').reverse().join('/'));
    //console.info(elemento);
    var novaData = new Date();
    //console.info(date.getFullYear()+17);

    if (date > novaData) {
        console.warn("Motivo: Essa data ainda não chegou!");
        return `Datas no futuro não são aceitas`;
    }

    date.setYear(date.getFullYear() + 17);
    console.info(`Adicionar 17 anos a data selecionada -> ${date}`);

    if (!(date < novaData)) {
        console.warn("Você é menor de idade");
        return `Você é menor de idade`;
    }

    return '';
}

function validarCampoDataNascimento() {
    $(function () {
        const $campoErro = $('#erroDataNascimento');
        const motivoFalha = validarDataNascimento();

        if(motivoFalha !== '') {
            $campoErro.addClass('uk-text-danger').text(`${motivoFalha}`);
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}