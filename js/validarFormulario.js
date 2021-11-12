function validarFormulario($campos, $mensagensErro, $botaoSalvar) {

    const campos = [];
    const mensagensErro = [];

    $campos.each((i, campo) => {
        campos.push(campo.value);
    });

    $mensagensErro.each((i, msg) => {
        mensagensErro.push(msg.innerHTML);
    });

    const preenchido = campos.every((campo) => campo !== '');
    const semErro = mensagensErro.every((msg) => msg === '');

    preenchido && semErro
        ? $botaoSalvar.removeAttr('disabled')
        : $botaoSalvar.attr('disabled', true);
}

const $campos = $('form').find('.uk-input');
const $mensagensErro = $('form').find('small');
const $botaoSalvar = $('.uk-button-primary');

$botaoSalvar.attr('disabled', true);

$('.uk-input').blur(function() {
    validarFormulario($campos, $mensagensErro, $botaoSalvar);
});