<?php
    include('../models/conn.php');

    $arquivo = $_FILES['arquivo'] ?? FALSE;

    for($k=0; $k < count($arquivo['name']); $k++){
        if($arquivo['size'][$k] <= $_POST['select_tamanho_arquivo'] && $arquivo['type'][$k] === "image/png"){
                if($nome = md5Random($arquivo['name'][$k])){
                    $destino = "../public/assets/uploads/".$nome.".png";
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

    function md5Random($nome){
        $nomeRand = md5($nome . rand(0, 9999));
        $arquivos = glob('../public/assets/uploads/*.png*');
    
        if(count($arquivos) > 0){
            foreach($arquivos as $arquivo){
                if(strpos($arquivo, $nomeRand) != false){
                    md5Random($nome);
                }else{
                    return $nomeRand;
                }
            }
        }else{
            return $nomeRand;
        }
    }
?>