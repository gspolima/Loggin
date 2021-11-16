<?php

use FFI\Exception;

include_once './DbContext.php';

class DadosParaEdicaoController extends DbContext {

    public PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->abrirConexao();
    }

    function getDadosUsuario($id) {
        $sql =  "SELECT ".
                "U.ID, U.LOGIN, U.EMAIL, U.CPF, U.DATA_NASCIMENTO, ".
                "E.CEP, E.LOGRADOURO, E.NUMERO, E.BAIRRO, E.CIDADE, E.UF ".
                "FROM USUARIOS U ".
                "INNER JOIN ENDERECOS E ".
                "ON E.USUARIO_ID = U.ID ".
                "WHERE U.ID = :id LIMIT 1";

        $queryPreparada = $this->dbConnection->prepare($sql);
        $queryPreparada->bindParam(":id", $id);
        $sucesso = $queryPreparada->execute();

        if ($sucesso) {

            $result = $queryPreparada->fetchAll();
            return $result;
        }

    }

    function retornarListaEmJSON($arrayDadosUsuario) {
        header("HTTP/1.1 200 OK");
        $dadosEmJSON = json_encode($arrayDadosUsuario[0]);
        echo $dadosEmJSON;
    }
}


$controller = new DadosParaEdicaoController();

$usuarioId = $_GET['id'];

if ($usuarioId) {
    try {
        $usuarioExiste = $controller->usuarioExiste($usuarioId);

        if ($usuarioExiste) {
            $dadosUsuario = $controller->getDadosUsuario($usuarioId);
            $controller->retornarListaEmJSON($dadosUsuario);
        }
    }
    catch(Exception $e) {
        echo "<h1>Erro ao puxar dados para edição --- ".$e->getMessage()."</h1>";
    }
}

?>