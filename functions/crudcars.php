<?php 
require_once('dbcontext.php');

function create($cars){
    $pdo = conn_db();
    $sql = $pdo -> prepare("INSERT INTO cars VALUES(null, ?, ?)");
    $sql -> execute(array_values($cars));    
}

function delete($id){
    if($id){
        $id = (int) $_GET['delete'];
        
        $pdo = conn_db();
        $pdo -> exec("DELETE FROM cars WHERE ID =$id");
        echo "Carro $id deletado";
    };
}

function edit($cars){
    if(isset($cars)){
        $pdo = conn_db();
        $pdo -> exec('UPDATE 
        cars SET carname ="'.$_POST['carname'].'",
        placa="'.$_POST['placa'].'" 
        WHERE id="'.$_GET['editar'].'"');
        echo "Alterado com Sucesso!<br>";
    }
}
