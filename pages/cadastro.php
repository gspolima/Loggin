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
        <div class="uk-section uk-section-default">
            <div class="uk-container">

                <h2><span uk-icon="icon: file-text; ratio: 1.5"></span> &nbsp Cadastro</h2>
                <form action="../controllers/CadastroController.php" method="POST">
                    <div class="uk-margin">
                        <div>
                            <label for="cpf">Login</label>
                        </div>
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: user"></span>
                            <input autofocus class="uk-input" type="text" id="login" name="login" placeholder="gustavo.sampaio" onblur="validarCampoLogin(this.value)">
                        </div>
                        <div class="validacao">
                            <small id="erroLogin"></small>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div>
                            <label for="email">Email</label>
                        </div>
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: mail"></span>
                            <input class="uk-input" type="email" id="email" name="email" onblur="validarCampoEmail(this.value)">
                        </div>
                        <div class="validacao">
                            <small id="erroEmail"></small>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div>
                            <label for="cpf">CPF</label>
                        </div>
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: link"></span>
                            <input class="uk-input" type="number" id="cpf" name="cpf" placeholder="Somente dígitos" onblur="validarCampoCPF(this.value)">
                        </div>
                        <div class="validacao">
                            <small id="erroCPF"></small>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div>
                            <label for="cpf">Data de Nascimento</label>
                        </div>
                        <div class="uk-inline">
                            <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                            <input class="uk-input" type="date" id="dataNascimento" name="dataNascimento" onblur="validarCampoDataNascimento()">
                        </div>
                        <div class="validacao">
                            <small id="erroDataNascimento"></small>
                        </div>
                    </div>

                    <hr class="uk-divider-icon">

                    <fieldset class="uk-fieldset">
                        <legend class="uk-legend">Endereço</legend>

                        <div class="uk-margin">
                            <div>
                                <label for="cep">CEP</label>
                            </div>
                            <div class="uk-inline">
                                <span class="uk-form-icon" uk-icon="icon: location"></span>
                                <input class="uk-input" type="numeric" id="cep" name="cep" placeholder="Somente dígitos" onblur="validarCampoCEP(this.value)">
                            </div>
                            <div class="validacao">
                                <small id="erroCEP"></small>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div>
                                <label for="endereco">Endereço</label>
                            </div>
                            <div class="uk-inline">
                                <input class="uk-input" type="text" id="endereco" name="endereco">
                            </div>
                            <div class="validacao">
                                <small id="erroEndereco"></small>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div>
                                <label for="numero">Número</label>
                            </div>
                            <div class="uk-inline">
                                <input class="uk-input" type="numeric" id="numero" name="numero">
                            </div>
                            <div class="validacao">
                                <small id="erroNumero"></small>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div>
                                <label for="bairro">Bairro</label>
                            </div>
                            <div class="uk-inline">
                                <input class="uk-input" type="text" id="bairro" name="bairro">
                            </div>
                            <div class="validacao">
                                <small id="erroBairro"></small>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div>
                                <label for="cidade">Cidade</label>
                            </div>
                            <div class="uk-inline">
                                <input readonly disabled class="uk-input" type="text" id="cidade" name="cidade">
                            </div>
                            <div class="validacao">
                                <small id="erroCidade"></small>
                            </div>
                        </div>

                        <div class="uk-margin">
                            <div>
                                <label for="uf">UF</label>
                            </div>
                            <div class="uk-inline">
                                <input readonly disabled class="uk-input" type="text" id="uf" name="uf">
                            </div>
                            <div class="validacao">
                                <small id="erroUF"></small>
                            </div>
                        </div>

                    </fieldset>
                    <input autofocus class="uk-button uk-button-primary" type="submit" name="salvar" value="Salvar">
                </form>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="../dependencies/jquery/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/validarLogin.js"></script>
    <script type="text/javascript" src="../js/validarEmail.js"></script>
    <script type="text/javascript" src="../js/validarCPF.js"></script>
    <script type="text/javascript" src="../js/validarDataNascimento.js"></script>
    <script type="text/javascript" src="../js/validarCEP.js"></script>
    <script type="text/javascript" src="../js/validarFormulario.js"></script>
</body>
</html>