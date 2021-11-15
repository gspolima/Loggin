let usuarioId = $('#usuarioId').attr('value');
console.log(usuarioId);
let host = window.location.hostname;
let uriRemover = '';

if (host === 'localhost') {
    uriRemover = `/Loggin/controllers/DadosParaEdicaoController.php?id=${usuarioId}`;
}
else {
    uriRemover = `/controllers/DadosParaEdicaoController.php?id=${usuarioId}`;
}
console.log(uriRemover);

$.ajax({
    type: "GET",
    url: uriRemover
})
.done(function (data) {
    let dados = JSON.parse(data);
    $('#login').val(dados.LOGIN);
    $('#email').val(dados.EMAIL);
    $('#cpf').val(dados.CPF);
    $('#dataNascimento').val(dados.DATA_NASCIMENTO);
    $('#cep').val(dados.CEP);
    $('#logradouro').val(dados.LOGRADOURO);
    $('#numero').val(dados.NUMERO);
    $('#bairro').val(dados.BAIRRO);
    $('#cidade').val(dados.CIDADE);
    $('#uf').val(dados.UF);
});