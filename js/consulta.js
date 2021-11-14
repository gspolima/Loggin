let uri = window.location;
if (uri.search.includes('del=1'))
    UIkit.notification({ message: "<span uk-icon='icon: check'></span>  Removido com sucesso", status: 'primary', pos: 'bottom-center', timeout: 4000});

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
        uriRemover = `http://${host}/Loggin/controllers/RemoveController.php?id=${usuarioId}`;
    }
    else {
        uriRemover = `https://${host}/controllers/RemoveController.php?id=${usuarioId}`;
    }
    console.log(uriRemover);

    $('#botaoConfirmar').click(function (event) {

        window.location.href = uriRemover;
    });
});