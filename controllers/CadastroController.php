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
            echo 'Falha na concexão ==> '.$e->getMessage();
        }
    }

    function inserir($matricula,$nome, $cpf){
        $conexao = $this->abrirConexao();
        if($matricula != null &&  $nome != null){

            try {
                $cont = $conexao->exec(
                    "INSERT INTO ALUNO (MATRICULA, NOME, CPF) VALUES ($matricula, '$nome', '$cpf')");
                if ($cont < 1) {
                    echo 'erro';
                }
                else {
                    echo "$cont Registros foram inclusos!";
                }
            } catch (PDOException $excecao) {

                echo 'Erro ao inserir devido a '.$excecao->getMessage();
            }    
        }
    }

    function atualizar($matricula, $nome) {
        if ($matricula != null && $nome != null) {
            $conexao = $this->abrirConexao();
            $cont = $conexao->exec("UPDATE ALUNO SET NOME = '$nome' WHERE MATRICULA = $matricula");

            if($cont > 0) {
                echo "<p>$cont atualizados com sucesso</p>";
            } else {
                echo "<p>Não foi possível atualizar</p>";
            }
        }
    }

}

$servidor = new CadastroController();
$servidor->abrirConexao();

// if ($_POST['matricula'] && $_POST['nome']){

//     $matricula = $_POST['matricula'];
//     $nome = $_POST['nome'];
//     $cpf = $_POST['cpf'];

//     try {
//         $servidor->inserir($matricula,$nome, $cpf);    
//     }
//     catch(PDOException $e) {
//         echo "<h1>Erro --- </h1>".$e->getMessage();
//     }
// }
?>