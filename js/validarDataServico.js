function validarDataServico() {
    $('#data_entrada').change(function () {
        var elemento = document.getElementById("data_entrada").value;
        //alert(elemento);
        var date = new Date(elemento.split('/').reverse().join('/'));
        //alert(date);
        var novaData = new Date();
        //alert(novaData);
        if (date > novaData) {
            alert("Essa data ainda não chegou!");
            document.getElementById('data_entrada').value = ''; // Limpa o campo
            elemento.innerHTML = '';
        }
    });
}