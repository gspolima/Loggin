function validarCPF(cpf) {
    var i;
    var s = cpf;
    var cpf = s.substr(0, 9);
    var dv = s.substr(9, 2);
    var d1 = 0;
    var v = false;

    for (i = 0; i < 9; i++) {
        d1 += cpf.charAt(i) * (10 - i);
    }
    if (d1 === 0) {
        console.error("CPF Inválido");
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9)
        d1 = 0;
    if (dv.charAt(0) != d1) {
        console.error("CPF Inválido");
        v = true;
        return false;
    }

    d1 *= 2;
    for (i = 0; i < 9; i++) {
        d1 += cpf.charAt(i) * (11 - i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9)
        d1 = 0;
    if (dv.charAt(1) != d1) {
        console.error("CPF Inválido")
        v = true;
        return false;
    }
    if (!v) {
        console.info(cpf + " CPF Válido")
        return true;
    }
}

function validarCampoCPF(valor) {
    $(function () {
        const $campoErro = $('#erroCPF');

        if(validarCPF(valor) === false) {
            $campoErro.addClass('uk-text-danger').text('CPF Inválido');
        }
        else {
            $campoErro.removeClass('uk-text-danger').text('');
        }
    });
}