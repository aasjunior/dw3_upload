<?php
    include('../models/conn.php');

    $query = mysqli_query($conn, "SELECT dir FROM imagesPNG WHERE id=".$_POST['id']);
    
    if(mysqli_query($conn, "DELETE FROM imagesPNG WHERE id=".$_POST['id'])){
        while($dir = mysqli_fetch_array($query)){
            unlink($dir[0]);
        }
        echo "Arquivo excluído com sucesso";
    }else{
        echo "Não foi possível excluir o arquivo";
    }
?>