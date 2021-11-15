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

                <h1><span uk-icon="icon: file-edit; ratio: 1.5"></span>&nbspEdição</h1>
                <form class="uk-form-stacked" action="../controllers/EdicaoController.php" method="POST">

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Dados Pessoais</legend>
                        <hr/>

                        <input hidden type="text" id="usuarioId" name="usuarioId">

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="login">Login</label>
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: user"></span>
                                <input disabled class="uk-input uk-width-medium" type="text" id="login" name="login">
                            </div>
                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="email">Email</label>
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                <input autofocus class="uk-input uk-width-large" type="email" id="email" name="email" onblur="validarCampoEmail(this.value)">
                            </div>
                            <div class="validacao">
                                <small id="erroEmail"></small>
                            </div>
                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="cpf">CPF</label>
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: link"></span>
                                <input disabled class="uk-input" type="text" id="cpf" name="cpf" onblur="validarCampoCPF(this.value)">
                            </div>
                            <div class="validacao">
                                <small id="erroCPF"></small>
                            </div>
                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="cpf">Data de Nascimento</label>
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                                <input class="uk-input uk-width-medium" type="date" id="dataNascimento" name="dataNascimento" onblur="validarCampoDataNascimento()">
                            </div>
                            <div class="validacao">
                                <small id="erroDataNascimento"></small>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Endereço</legend>
                        <hr/>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="cep">CEP</label>
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: location"></span>
                                <input class="uk-input uk-width-small" type="numeric" id="cep" name="cep" onblur="validarCampoCEP(this.value)">
                            </div>
                            <div class="validacao">
                                <small id="erroCEP"></small>
                            </div>
                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="logradouro">Endereço</label>
                            <div class="uk-inline">
                                <input class="uk-input uk-width-medium" type="text" id="logradouro" name="logradouro" onblur="validarCampoLogradouro(this.value)">
                            </div>
                            <div class="validacao">
                                <small id="erroLogradouro"></small>
                            </div>
                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="numero">Número</label>
                            <div class="uk-inline">
                                <input class="uk-input uk-width-small" type="numeric" id="numero" name="numero" onblur="validarCampoNumero(this.value)">
                            </div>
                            <div class="validacao">
                                <small id="erroNumero"></small>
                            </div>
                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="bairro">Bairro</label>
                            <div class="uk-inline">
                                <input class="uk-input uk-width-medium" type="text" id="bairro" name="bairro" onblur="validarCampoBairro(this.value)">
                            </div>
                            <div class="validacao">
                                <small id="erroBairro"></small>
                            </div>
                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="cidade">Cidade</label>
                            <div class="uk-inline">
                                <input class="uk-input uk-width-medium" type="text" id="cidade" name="cidade" readonly>
                            </div>
                            <div class="validacao">
                                <small id="erroCidade"></small>
                            </div>
                        </div>

                        <div class="uk-margin-medium-bottom">
                            <label class="uk-form-label" for="uf">UF</label>
                            <div class="uk-inline">
                                <input class="uk-input uk-width-small" type="text" id="uf" name="uf" readonly>
                            </div>
                            <div class="validacao">
                                <small id="erroUF"></small>
                            </div>
                        </div>

                    </fieldset>
                    <input autofocus class="uk-button uk-button-primary" type="submit" name="salvar" value="Salvar Alterações">
                </form>
            </div>
        </div>
    </section>
    <?php include '../composers/scripts.php'?>
    <script type="text/javascript" src="../js/validarLogin.js"></script>
    <script type="text/javascript" src="../js/validarEmail.js"></script>
    <script type="text/javascript" src="../js/validarCPF.js"></script>
    <script type="text/javascript" src="../js/validarDataNascimento.js"></script>
    <script type="text/javascript" src="../js/validarCEP.js"></script>
    <script type="text/javascript" src="../js/validarLogradouro.js"></script>
    <script type="text/javascript" src="../js/validarNumero.js"></script>
    <script type="text/javascript" src="../js/validarBairro.js"></script>
    <script type="text/javascript" src="../js/validarFormulario.js"></script>
    <?php 
        $usuarioId = $_GET['id'];

        echo 
        "
            <script>
                $('#usuarioId').attr('value', $usuarioId);
                $('#usuarioId').attr('data-usuario-id', $usuarioId);
            </script>
        ";
    ?>
    <script src="../js/edicao.js"></script>
</body>
</html>