<?php 

echo
'
<header>
    <nav class="uk-navbar-container" uk-navbar>
        <div class="uk-navbar-left">

            <a class="uk-navbar-item uk-logo" href="../index.php">Loggin</a>
            <ul class="uk-navbar-nav">
                <li>
                    <a href="#">Usuários</a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="#">Consultar</a></li>
                            <li><a href="../pages/cadastro.php">Cadastrar</a></li>
                            <li><a href="#">Editar</a></li>
                            <li><a href="#">Excluir</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
'
?>