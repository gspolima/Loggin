<?php

include_once './DbContext.php';

class CadastroController extends DbContext {

    public PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->abrirConexao();
    }

    function inserirUsuario($login, $email, $cpf, $dataNascimento) {
        try {
            $sql = 
            "
                INSERT INTO USUARIOS
                    (LOGIN, EMAIL, CPF, DATA_NASCIMENTO)
                VALUES
                    (:login, :email, :cpf, :dataNascimento)
            ";

            $queryPreparada = $this->dbConnection->prepare($sql);
            $queryPreparada->bindParam(":login", $login);
            $queryPreparada->bindParam(":email", $email);
            $queryPreparada->bindParam(":cpf", $cpf);
            $queryPreparada->bindParam(":dataNascimento", $dataNascimento);

            $result = $queryPreparada->execute();
            if ($result > 0) {
                echo "<script>console.log('$result usuário foi incluso');</script>";
            }

        } catch (PDOException $excecao) {
            echo "Erro ao inserir usuário devido a ".$excecao->getMessage()."<br>";
        }
    }

    function getUsuarioRecemCadastrado($login) {
        try {
            $sql = "SELECT ID, LOGIN FROM USUARIOS WHERE LOGIN = :login LIMIT 1";

            $queryPreparada = $this->dbConnection->prepare($sql);
            $queryPreparada->bindParam(":login", $login);

            $sucesso = $queryPreparada->execute();

            if ($sucesso) {
                return $queryPreparada->fetch()['ID'];
            }

        } catch (PDOException $excecao) {
            echo "Erro ao consultar usuário por login ".$login." devido a ".$excecao->getMessage()."<br>";
        }
    }

    function inserirEnderecoUsuario($usuarioId, $cep, $logradouro, $numero, $bairro, $cidade, $uf) {
        try {
            $sql = 
                "INSERT INTO ENDERECOS
                    (USUARIO_ID, CEP, LOGRADOURO, NUMERO, BAIRRO, CIDADE, UF)
                VALUES
                    (:usuarioId, :cep, :logradouro, :numero, :bairro, :cidade, :uf)
                ";

            $queryPreparada = $this->dbConnection->prepare($sql);
            $queryPreparada->bindParam(":usuarioId", $usuarioId);
            $queryPreparada->bindParam(":cep", $cep);
            $queryPreparada->bindParam(":logradouro", $logradouro);
            $queryPreparada->bindParam(":numero", $numero);
            $queryPreparada->bindParam(":bairro", $bairro);
            $queryPreparada->bindParam(":cidade", $cidade);
            $queryPreparada->bindParam(":uf", $uf);

            $result = $queryPreparada->execute();
            if ($result > 0) {
                echo "<script>console.log('$result endereço foi incluído');</script>";
            }

        } catch (PDOException $excecao) {

            echo "Erro ao inserir endereco do usuario $usuarioId devido a ".$excecao->getMessage()."<br>";
        }
    }

    function redirecionarParaConsulta() {
        $host = $_SERVER['HTTP_HOST'];

        if ($host === "localhost") {
            $destino = "http://".$host."/Loggin/pages/consulta.php";
            echo "<script>window.location.href = '$destino'</script>";
        }
        else {
            $destino = "https://".$host."/pages/consulta.php";
            echo "<script>window.location.href = '$destino'</script>";
        }
    }
}


$controller = new CadastroController();

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
        $controller->inserirUsuario($login, $email, $cpf, $dataNascimento);
        $novoUsuarioId = $controller->getUsuarioRecemCadastrado($login);
        $controller->inserirEnderecoUsuario($novoUsuarioId, $cep, $logradouro, $numero, $bairro, $cidade, $uf);
        $controller->redirecionarParaConsulta();
    }
    catch(PDOException $e) {
        echo "<h1>Erro Catastrófico --- </h1>".$e->getMessage();
    }
}

?>