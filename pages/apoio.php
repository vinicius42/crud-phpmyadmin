<?php 
    require_once('./functions/crudpessoas.php');
    
    $pessoas = fetchtable('pessoas');

    foreach($pessoas as $key => $pessoa){
        echo "<h1>Você deseja realmente deletar?</h1>";
        echo "<a href='./?p=formpessoa&delete=".$pessoa["id"]."'> DELETAR </a>";
    };
?>