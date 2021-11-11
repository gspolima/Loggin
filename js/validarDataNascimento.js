function validarDataNascimento() {
    $('#data_nascimento').change(function () {
        var elemento = document.getElementById("data_nascimento").value;
        //alert(elemento);
        //elemento.setYear(elemento.getYear() + 17);
        var date = new Date(elemento.split('/').reverse().join('/'));
        //alert(elemento);
        var novaData = new Date();
        //alert(date.getFullYear()+17);
        if (date > novaData) {
            alert("Essa data ainda não chegou!");
            elemento.innerHTML = '';
        }
        date.setYear(date.getFullYear() + 17);
        //alert(date);
        if (!(date < novaData)) {
            alert("voce  é de menor");
            document.getElementById('data_nascimento').value = ''; // Limpa o campo
            elemento.innerHTML = '';
        }

    });
}