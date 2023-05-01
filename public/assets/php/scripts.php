<?php
    function md5Random($nome){
        $nomeRand = md5($nome . rand(0, 9999));
        $arquivos = glob('../public/uploads/*.png*');
    
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