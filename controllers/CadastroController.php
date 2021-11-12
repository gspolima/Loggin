<?php

include_once './DbContext.php';

class CadastroController extends DbContext {

    private PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->abrirConexao();
    }

    function inserirUsuario($login, $email, $cpf, $dataNascimento) {
        try {
            $sql = "INSERT INTO USUARIOS (LOGIN, EMAIL, CPF, DATA_NASCIMENTO) VALUES (:login, :email, :cpf, :dataNascimento)";

            $preparedSql = $this->dbConnection->prepare($sql);
            $preparedSql->bindParam(":login", $login);
            $preparedSql->bindParam(":email", $email);
            $preparedSql->bindParam(":cpf", $cpf);
            $preparedSql->bindParam(":dataNascimento", $dataNascimento);

            $result = $preparedSql->execute();
            if ($result > 0) {
                echo "$result usuário foi incluso<br>";
            }

        } catch (PDOException $excecao) {
            echo "Erro ao inserir usuário devido a ".$excecao->getMessage()."<br>";
        }
    }

    function getUsuarioCadastrado($login) {
        try {
            $sql = "SELECT ID, LOGIN FROM USUARIOS WHERE LOGIN = :login";

            $preparedSql = $this->dbConnection->prepare($sql);
            $preparedSql->bindParam(":login", $login);

            $sucesso = $preparedSql->execute();

            if ($sucesso) {
                return $preparedSql->fetch()['ID'];
            }

        } catch (PDOException $excecao) {
            echo "Erro ao consultar usuário por login ".$login." devido a ".$excecao->getMessage()."<br>";
        }
    }

    function inserirEnderecoUsuario($usuarioId, $cep, $logradouro, $numero, $bairro, $cidade, $uf) {
        try {
            $sql = "INSERT INTO ENDERECOS (USUARIO_ID, CEP, LOGRADOURO, NUMERO, BAIRRO, CIDADE, UF) VALUES (:usuarioId, :cep, :logradouro, :numero, :bairro, :cidade, :uf)";

            $preparedSql = $this->dbConnection->prepare($sql);
            $preparedSql->bindParam(":usuarioId", $usuarioId);
            $preparedSql->bindParam(":cep", $cep);
            $preparedSql->bindParam(":logradouro", $logradouro);
            $preparedSql->bindParam(":numero", $numero);
            $preparedSql->bindParam(":bairro", $bairro);
            $preparedSql->bindParam(":cidade", $cidade);
            $preparedSql->bindParam(":uf", $uf);

            $result = $preparedSql->execute();
            if ($result > 0) {
                echo "$result endereço foi incluído<br>";
            }

        } catch (PDOException $excecao) {

            echo "Erro ao inserir endereco do usuario $usuarioId devido a ".$excecao->getMessage()."<br>";
        }
    }
}


$servidor = new CadastroController();

$login = $_POST['login'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento'];

$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

if ($login && $email && $cpf && $dataNascimento) {

    try {
        $servidor->inserirUsuario($login, $email, $cpf, $dataNascimento);
        $novoUsuarioId = $servidor->getUsuarioCadastrado($login);
        $servidor->inserirEnderecoUsuario($novoUsuarioId, $cep, $logradouro, $numero, $bairro, $cidade, $uf);
    }
    catch(PDOException $e) {
        echo "<h1>Erro Catastrófico --- </h1>".$e->getMessage();
    }
}

?>