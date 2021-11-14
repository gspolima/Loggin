$('.botaoRemover').click(function(event) {
    let clickado = event.target;
    let $clickado = $(clickado);
    console.log($clickado);
    let usuarioId = $clickado.attr('data-usuario-id');
    console.log(`usuario selecionado ${usuarioId}`);

    let host = window.location.hostname;
    console.log(`Host ${host}`);
    let uriRemover;

    if (host === 'localhost') {
        uriRemover = `/Loggin/controllers/RemoveController.php?id=${usuarioId}`;
    }
    else {
        uriRemover = `/controllers/RemoveController.php?id=${usuarioId}`;
    }
    console.log(uriRemover);

    $('#botaoConfirmar').click(function (event) {
        $.ajax({
            type: 'GET',
            url: uriRemover,
        })
        .done(function (event) { 
            console.warn('Request de remoção finalizada.');
            console.warn('Recarregando a página...')

            window.location.reload();
        })
        .fail(function (error) { alert(`ERRO AO TENTAR DELETAR DEVIDO A ${error}`)});
    });
});