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
                <?php 
                    include '../controllers/ListagemController.php';
                ?>
            </div>
        </div>
    </section>
    <!-- This is the modal -->
    <div id="my-id" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">
            <h2 class="uk-modal-title">Deseja mesmo remover?</h2>
            <button class="uk-button uk-button-danger" type="button">Remover</button>
            <button class="uk-button uk-button-muted uk-modal-close" type="button">Fechar</button>
        </div>
    </div>
    <?php include '../composers/scripts.php'?>
</body>
</html>