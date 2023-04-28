<?php
    $diretorio = "arquivos/";

    $arquivo = isset($_FILES['arquivo']) ? $_FILES['arquivo'] : FALSE;

    for($k=0; $k < count($arquivo['name']); $k++){
        if($arquivo['type'][$k] === "image/png"){

            if($nome = md5Random($arquivo['name'][$k])){
                $destino = $diretorio."/".$nome.".png";
                if(move_uploaded_file($arquivo['tmp_name'][$k], $destino)){
                    header("location:./inicio.php");
                }else{
                    echo "Erro ao enviar o arquivo!<br>".
                        "<a href='./inicio.php'>Voltar</a>";
                }
            }
        }else{
            echo "Tipo de arquivo inválido<br><br>".
                 "<a href='./inicio.php'>Voltar</a>";
        }
    }

    function md5Random($nome){
        $nomeRand = md5($nome . rand(0, 9999));
        $arquivos = glob('arquivos/*.png*');
    
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