<?php

class CadastroController{ 

    function abrirConexao (){

        $options = array(
            PDO::MYSQL_ATTR_SSL_CA => '../certificates/DigiCertGlobalRootCA.crt.pem' // path to certificate
        );

        $dns = 'mysql:host=phpcrudestacio.mysql.database.azure.com;port=3306;dbname=loggin';
        $usuario='gustavo';
        $senha='Minixbetterthanminix00$';

        try{
            $conexao= new PDO($dns,$usuario,$senha, $options);
            echo 'Conexão realizada com sucesso!';
            return $conexao;
        }catch(PDOException $e){
            echo 'Falha na conexão ==> '.$e->getMessage();
        }
    }

    function inserir($login, $email, $cpf, $dataNascimento) {
        $conexao = $this->abrirConexao();

        try {
            $sql = "INSERT INTO USUARIOS (LOGIN, EMAIL, CPF, DATA_NASCIMENTO) VALUES (:login, :email, :cpf, :dataNascimento)";

            $preparedSql = $conexao->prepare($sql);
            $preparedSql->bindParam(":login", $login);
            $preparedSql->bindParam(":email", $email);
            $preparedSql->bindParam(":cpf", $cpf);
            $preparedSql->bindParam(":dataNascimento", $dataNascimento);

            $query = $preparedSql->execute();
            if ($query > 0) {
                echo "$query registros foram inclusos!";
            }
        } catch (PDOException $excecao) {
            echo 'Erro ao inserir devido a '.$excecao->getMessage();
        }
    }

    function getUsuarioCadastrado($login) {
        $conexao = $this->abrirConexao();

        try {
            $sql = "SELECT ID, LOGIN, CPF FROM USUARIOS WHERE LOGIN = :login";

            $preparedSql = $conexao->prepare($sql);
            $preparedSql->bindParam(":login", $login);

            $preparedSql->execute();

            foreach ($preparedSql as $row) {
                echo "ID $row[0] --- Login $row[1] --- CPF $row[2]";
            }

        } catch (PDOException $excecao) {
            echo 'Erro ao inserir devido a '.$excecao->getMessage();
        }
    }
}

$servidor = new CadastroController();

$login = $_POST['login'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento'];

if ($login && $email && $cpf && $dataNascimento) {

    try {
        $servidor->inserir($login, $email, $cpf, $dataNascimento);
        $servidor->getUsuarioCadastrado($login);
    }
    catch(PDOException $e) {
        echo "<h1>Erro ao inserir--- </h1>".$e->getMessage();
    }
}

?>