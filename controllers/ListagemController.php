<?php

include_once './DbContext.php';

class ListagemController extends DbContext {

    private PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->abrirConexao();
    }

    function getListaUsuarios() {
        
    }
}

$controller = new ListagemController();

?>