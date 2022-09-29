<?php
require_once('dbcontext.php');

function create($pessoa)
{
    try {
        if (
            isset($pessoa) && $pessoa['name'] != '' && $pessoa['document'] != ''
            && $pessoa['type'] != ''
        ) {

            $pdo = conn_db();
            $sql = $pdo->prepare("INSERT INTO pessoas VALUES(null, ?, ?, ?)");
            $sql->execute(array_values($pessoa));
        } else {
            throw new Exception("Preencha todos os campos");
        }
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}


function delete($pessoa)
{
    try {
        if ($pessoa['id']) {
            $pessoa['id'] = (int) $_GET['delete'];
            $teste = $pessoa['id'];

            $pdo = conn_db();
            $pdo->exec("DELETE FROM PESSOAS WHERE ID = $teste");
            
            echo "Pessoa ".$teste['nome']. "deletada ";         
        };
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}

function edit($pessoa)
{
    try {
        if (isset($pessoa)) {
            if ($pessoa['name'] == '') {
                throw new Exception("Falta preencher o nome");
            }
            if ($pessoa['document'] == '') {
                throw new Exception("Falta preencher o document");
            }
            if ($pessoa['type'] == '') {
                throw new Exception("Falta preencher o tipo");
            }

            $pdo = conn_db();
            $pdo->exec('UPDATE 
            pessoas SET name ="' . $_POST['name'] . '",
            document="' . $_POST['document'] . '",
            type="' . $_POST['type'] . '" 
            WHERE id="' . $_GET['editar'] . '"');
            echo "Alterado com Sucesso!<br>";
        }
    } catch (Exception $e) {
        echo "Erro :" . $e->getMessage();
    }
}
?>