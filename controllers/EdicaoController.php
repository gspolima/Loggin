<?php

include_once './DbContext.php';

class EdicaoController extends DbContext {

    public PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->abrirConexao();
    }

    function atualizarUsuario($id, $email, $dataNascimento) {
        try {
            $sql = 
            "
                UPDATE USUARIOS
                SET EMAIL = :email, DATA_NASCIMENTO = :dataNascimento
                WHERE ID = :id;
            ";

            $queryPreparada = $this->dbConnection->prepare($sql);
            $queryPreparada->bindParam(":email", $email);
            $queryPreparada->bindParam(":dataNascimento", $dataNascimento);
            $queryPreparada->bindParam(":id", $id);

            $result = $queryPreparada->execute();
            if ($result > 0) {
                echo "<script>console.log('$result usuário foi ATUALIZADO');</script>";
            }

        } catch (PDOException $excecao) {
            echo "Erro ao inserir usuário devido a ".$excecao->getMessage()."<br>";
        }
    }

    function atualizarEnderecoUsuario($usuarioId, $cep, $logradouro, $numero, $bairro, $cidade, $uf) {
        try {
            $sql = 
            "
                UPDATE ENDERECOS
                SET 
                    CEP = :cep,
                    LOGRADOURO = :logradouro,
                    NUMERO = :numero,
                    BAIRRO = :bairro,
                    CIDADE = :cidade,
                    UF = :uf
                WHERE USUARIO_ID = :usuarioId;
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
                echo "<script>console.log('$result endereço foi ATUALIZADO');</script>";
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

$controller = new EdicaoController();

$usuarioId = $_POST['usuarioId'];
$email = $_POST['email'];
$dataNascimento = $_POST['dataNascimento'];

$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];

try {
    $usuarioExiste = $controller->usuarioExiste($usuarioId);

    if ($usuarioExiste) {
        $controller->atualizarUsuario($usuarioId, $email, $dataNascimento);
        $controller->atualizarEnderecoUsuario($usuarioId, $cep, $logradouro, $numero, $bairro, $cidade, $uf);
        $controller->redirecionarParaConsulta();
    }
}
catch(PDOException $e) {
    echo "<h1>Erro Catastrófico --- </h1>".$e->getMessage();
}

?>