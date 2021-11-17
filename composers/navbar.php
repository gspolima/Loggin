<?php 
echo
'
<header class="uk-text-bold">
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">

            <a class="uk-navbar-item uk-logo" href="../index.php">Loggin</a>
            <ul class="uk-navbar-nav">
                <li>
                    <a href="#"><span uk-icon="icon: users"></span> Usuários</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="./consulta.php"><span uk-icon="icon: search"></span>Consultar</a></li>
                            <li><a href="./cadastro.php"><span uk-icon="icon: plus-circle"></span>Cadastrar</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="https://github.com/gspolima/loggin" target="_blank"><span uk-icon="icon: code"></span>Código fonte</a></li>
            </ul>
        </div>
    </nav>
</header>
'
?>