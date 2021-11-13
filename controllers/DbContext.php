<?php

class DbContext {

    
    public function abrirConexao() {
        $dsn = '';
        $usuario = '';
        $senha = '';

        $envirVar = getenv();

        foreach ($envirVar as $key => $value) {
            if ($key === 'LOGGIN_DSN') {
                $dsn = $value;
            }
            else if ($key === 'LOGGIN_USERNAME') {
                $usuario = $value;
            }
            else if ($key === 'LOGGIN_PASSWORD') {
                $senha = $value;
            }
        }

        $options = array(
            PDO::MYSQL_ATTR_SSL_CA => '../certificates/DigiCertGlobalRootCA.crt.pem'
        );

        try {
            $conexao= new PDO($dsn, $usuario, $senha, $options);
            $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "[Conexão realizada com sucesso!]<br>";
            return $conexao;

        } catch(PDOException $e) {
            echo "Falha na conexão ------- ".$e->getMessage();
        }
    }
}

?>