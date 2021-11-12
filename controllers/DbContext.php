<?php

class DbContext {
    private $options = array(
        PDO::MYSQL_ATTR_SSL_CA => '../certificates/DigiCertGlobalRootCA.crt.pem'
    );

    private $dns = 'mysql:host=phpcrudestacio.mysql.database.azure.com;port=3306;dbname=loggin';
    private $usuario='gustavo';
    private $senha='Minixbetterthanminix00$';

    public function abrirConexao() {

        try {
            $conexao= new PDO($this->dns,$this->usuario,$this->senha, $this->options);
            $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "#1 Conexão realizada com sucesso!<br>";
            return $conexao;

        } catch(PDOException $e) {
            echo "Falha na conexão ==> ".$e->getMessage();
        }
    }
}

?>