<?php
    $file = $_GET['deletarArquivo'];
    $dir = "arquivos/";
    unlink($dir . $file);
    header("location:./inicio.php");
?>