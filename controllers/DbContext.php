<?php

class DbContext {

    
    public function abrirConexao() {

        // Puxar dados de conexão com MySQL que ficam
        // armazenados em variáveis de ambiente.
        $dsn = getenv('MYSQL_LOGGIN_DSN');
        $usuario = getenv('MYSQL_LOGGIN_USERNAME');
        $senha = getenv('MYSQL_LOGGIN_PASSWORD');

        $options = array(
            PDO::MYSQL_ATTR_SSL_CA => '../certificates/DigiCertGlobalRootCA.crt.pem'
        );

        try {
            $conexao= new PDO($dsn, $usuario, $senha, $options);
            $conexao->setAttribute( PDO::ATTR_EMULATE_PREPARES, false);
            $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "<script>console.info('Conexão com banco realizada com sucesso')</script>";
            return $conexao;

        } catch(PDOException $e) {
            echo "Falha na conexão ---- ".$e->getMessage();
        }
    }
}

?>