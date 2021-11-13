<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./dependencies/uikit/css/uikit.min.css" />
    <script src="./dependencies/uikit/js/uikit.min.js"></script>
    <script src="./dependencies/uikit/js/uikit-icons.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <link rel="stylesheet" href="./styles.css" />
    <title>Loggin</title>
</head>
<body onload="UIkit.notification({message: document.getElementById('phpversion').innerHTML, status: 'success', pos: 'bottom-left', timeout: 2500})">
    <div id="phpversion" hidden><a class="uk-text-large uk-text-success" target="_blank" href="https://www.php.net/releases/8.0/en.php"><span uk-icon="server"></span>  <?php echo 'PHP '.PHP_VERSION ?></a></div>
    <header class="uk-text-bold">
        <nav class="uk-navbar-container" uk-navbar>
            <a class="uk-navbar-item uk-logo" href="./index.php">Loggin</a>
            <div class="uk-navbar-left">

                <ul class="uk-navbar-nav">
                    <li>
                        <a href="#">Usuários</a>
                        <div class="uk-navbar-dropdown">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li><a href="./pages/consulta.php"><span uk-icon="icon: search"></span>Consultar</a></li>
                                <li><a href="./pages/cadastro.php"><span uk-icon="icon: plus"></span>Cadastrar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <section>
        <div class="uk-section uk-section-default">
            <div class="uk-container">

                <h2>Bem-vindo ao Loggin</h2>

                <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
                    <div>
                        <p>Aqui você pode cadastrar, editar, remover e visualizar usuários cadastrados.</p>
                    </div>
                    <div>
                        <p>Utilize o menu USUÁRIOS na barra superior para utilizar as operações disponíveis.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>