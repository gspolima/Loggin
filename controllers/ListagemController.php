<?php

include_once '../controllers/DbContext.php';

class ListagemController extends DbContext {

    private PDO $dbConnection;

    public function __construct()
    {
        $this->dbConnection = $this->abrirConexao();
    }

    function getListaDeUsuarios() {
        $sql =  "SELECT ".
                "U.ID, U.LOGIN, U.EMAIL, U.CPF, U.DATA_NASCIMENTO, ".
                "E.LOGRADOURO, E.NUMERO, E.BAIRRO, E.CIDADE, E.UF ".
                "FROM USUARIOS U ".
                "INNER JOIN ENDERECOS E ".
                "ON E.USUARIO_ID = U.ID";

        $queryPreparada = $this->dbConnection->prepare($sql);
        $sucesso = $queryPreparada->execute();
        $result = $queryPreparada->fetchAll();

        if ($sucesso)
            return $result;
    }

    function comporTabelaComDados($listaDeUsuarios) {

        $dataAtual = new DateTime('now');

        echo "
            <div class='uk-overflow-auto'>
                <table class='uk-table uk-table-small uk-table-divider uk-table-striped uk-table-hover'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Login</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Idade</th>
                            <th>Endereço</th>
                            <th>Cidade</th>
                            <th>UF</th>
                            <th>Editar</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
        ";

        foreach ($listaDeUsuarios as $linha) {
            $dataNascimento = DateTime::createFromFormat('Y-m-d', $linha['DATA_NASCIMENTO']);
            $idade = $dataAtual->diff($dataNascimento)->format('%Y');

            $cpfMascarado = formatarCpf($linha['CPF']);

            echo "
                        <tr>
                            <td class='uk-table-shrink'>".$linha['ID']."</td>
                            <td class='uk-table-shrink'>".$linha['LOGIN']."</td>
                            <td class='uk-table-shrink'>".$linha['EMAIL']."</td>
                            <td class='uk-table-shrink uk-text-nowrap'>".$cpfMascarado."</td>
                            <td class='uk-table-shrink uk-text-nowrap'>".$idade." anos</td>
                            <td class='uk-table-shrink'>".$linha['LOGRADOURO']." ".$linha['NUMERO']." ".$linha['BAIRRO']."</td>
                            <td class='uk-table-shrink'>".$linha['CIDADE']."</td>
                            <td class='uk-table-shrink'>".$linha['UF']."</td>
                            <td class='uk-table-shrink uk-text-nowrap'><a class='uk-text-primary' href='#'><span uk-icon='icon: pencil; ratio: 1.4'></span></a></td>
                            <td class='uk-table-shrink uk-text-nowrap'><a data-usuario-id=".$linha['ID']." uk-toggle href='#removerModal' class='botaoRemover uk-text-danger'><span uk-icon='icon: trash; ratio: 1.4'></span></a></td>
                        </tr>
            ";
        }

        echo "
                </table>
            </div>
        ";
    }
}

function formatarCpf($doc) {
 
    $doc = preg_replace("/[^0-9]/", "", $doc);
    $qtd = strlen($doc);

    if($qtd === 11 ) {

        $docFormatado = substr($doc, 0, 3) . '.' .
                        substr($doc, 3, 3) . '.' .
                        substr($doc, 6, 3) . '-' .
                        substr($doc, 9, 2);

        return $docFormatado;
    }
    return 'doc invalido';   
}


$controller = new ListagemController();
$usuarios = $controller->getListaDeUsuarios();
$controller->comporTabelaComDados($usuarios);

?>