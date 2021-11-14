<?php

include_once './DbContext.php';

class RemoveController extends DbContext {

    private PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->abrirConexao();
    }

    function removerEnderecoUsuario($usuarioId) {
        $sql = "DELETE FROM ENDERECOS WHERE USUARIO_ID = :usuarioId";
        $queryPreparada = $this->dbConnection->prepare($sql);
        $queryPreparada->bindParam(':usuarioId', $usuarioId);

        $sucesso = $queryPreparada->execute();

        if ($sucesso)
            echo "Um Endereço do usuário ID $usuarioId foi removido com sucesso<br>";
    }

    function removerUsuario($id) {

        $sql = "DELETE FROM USUARIOS WHERE ID = :id";
        $queryPreparada = $this->dbConnection->prepare($sql);
        $queryPreparada->bindParam(':id', $id);

        $sucesso = $queryPreparada->execute();

        if ($sucesso)
            echo "Usuário ID $id removido com sucesso<br>";
    }

    function redirecionarParaConsulta() {
        $host = $_SERVER['HTTP_HOST'];

        if ($host === "localhost") {
            $destino = "http://".$host."/Loggin/pages/consulta.php?del=1";
            echo "<script>window.location.href = '$destino'</script>";
        }
        else {
            $destino = "https://".$host."/pages/consulta.php?del=1";
            echo "<script>window.location.href = '$destino'</script>";
        }
    }
}

$id = $_GET['id'];

$controller = new RemoveController();
$existe = $controller->usuarioExiste($id);

if ($existe === true) {
    $controller->removerEnderecoUsuario($id);
    $controller->removerUsuario($id);
    $controller->redirecionarParaConsulta();
}
?>