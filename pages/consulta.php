<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../composers/head.php'; ?>
    <title>Loggin</title>
</head>
<body>
    <?php include '../composers/navbar.php'; ?>
    <section>
        <div class="uk-section uk-section-small">
            <div class="uk-container uk-container-expand">
                <h1><span uk-icon="icon: search; ratio: 1.5"></span>&nbspConsulta</h1>
                <?php 
                    include '../controllers/ListagemController.php';
                ?>
            </div>
        </div>
    </section>
    <!-- This is the modal -->
    <div id="removerModal" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <h2 class="uk-modal-title">Deseja mesmo remover?</h2>
            <button id="botaoConfirmar" class="uk-button uk-button-danger" type="button">Remover</button>
            <button class="uk-button uk-modal-close" type="button">Voltar</button>
        </div>
    </div>
    <?php include '../composers/scripts.php'?>
    <script src="../js/consulta.js"></script>
</body>
</html>