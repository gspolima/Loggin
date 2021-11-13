<?php 
echo
'
<header class="uk-text-bold">
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">

            <a class="uk-navbar-item uk-logo" href="../index.php">Loggin</a>
            <ul class="uk-navbar-nav">
                <li>
                    <a href="#">Usuários</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="./consulta.php"><span uk-icon="icon: search"></span>Consultar</a></li>
                            <li><a href="./cadastro.php"><span uk-icon="icon: plus"></span>Cadastrar</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
'
?>