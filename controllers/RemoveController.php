<?php

include_once './DbContext.php';

class RemoveController extends DbContext {

    private PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->abrirConexao();
    }

    function usuarioExiste($id) {
        
        $sql = "SELECT ID FROM USUARIOS WHERE ID = :id LIMIT 1";
        $queryPreparada = $this->dbConnection->prepare($sql);
        $queryPreparada->bindParam(':id', $id);

        $sucesso = $queryPreparada->execute();
        $resultado = $queryPreparada->fetchAll();

        if($sucesso && (count($resultado) == 1))
            return true;

        return false;
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

        $this->removerEnderecoUsuario($id);

        $sql = "DELETE FROM USUARIOS WHERE ID = :id";
        $queryPreparada = $this->dbConnection->prepare($sql);
        $queryPreparada->bindParam(':id', $id);

        $sucesso = $queryPreparada->execute();

        if ($sucesso)
            echo "Usuário ID $id removido com sucesso<br>";
    }

    function testeRedirect() {
        $host = $_SERVER['HTTP_HOST'];
        echo $host;

        if ($host === 'localhost')
            header("Location: /Loggin/pages/cadastro.php", true);
        else {
            header("Location: /pages/cadastro.php", true, 302);
        }
    }
}

$id = $_GET['id'];

$controller = new RemoveController();
$controller->testeRedirect();
// $existe = $controller->usuarioExiste($id);

// if ($existe)
//     $controller->removerUsuario($id);
?>