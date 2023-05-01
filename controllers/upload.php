<?php
    include('../models/conn.php');
    include('../src/assets/helpers/scripts.php');

    $arquivo = $_FILES['arquivo'] ?? FALSE;

    for($k=0; $k < count($arquivo['name']); $k++){
        if($arquivo['size'][$k] <= $_POST['select_tamanho_arquivo'] && $arquivo['type'][$k] === "image/png"){
                if($nome = md5Random($arquivo['name'][$k])){
                    $destino = "../src/uploads/".$nome.".png";
                    if(move_uploaded_file($arquivo['tmp_name'][$k], $destino)){
                        mysqli_query($conn, "INSERT INTO imagesPNG(dir) values('$destino')");
                        header("location:../views/inicio.php");
                    }else{
                        echo "Erro ao enviar o arquivo!<br>".
                            "<a href='../views/inicio.php'>Voltar</a>";
                    }
                }
        }else{
            echo "Tamanho ou tipo de arquivo inválido<br><br>".
                     "<a href='../views/inicio.php'>Voltar</a>";
        }
    }
?>