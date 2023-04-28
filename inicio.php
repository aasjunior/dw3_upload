<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<script src="./js/jquery/jquery-3.6.4.slim.min.js"></script>-->
    <title>PHP - Upload de Arquivos</title>
</head>
<body>
    <form name="upload" action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input type="file" name="arquivo[]" multiple="multiple" accept="image/png">
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <hr>
    <?php
        $path = "arquivos/";
        $diretorio = dir($path);
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>Arquivo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($arquivo = $diretorio->read()){
            ?>
                    <tr>
                        <td>
                            <a href="<?php echo $path.$arquivo ?>"><?php echo $arquivo ?></a>
                        </td>
                        <td>
                            <a href="delete.php?deletarArquivo=<?php echo $arquivo ?>">Excluir</a>
                        </td>
                    </tr>
            <?php
                }
                $diretorio->close();
            ?>
        </tbody>
    </table>
</body>
</html>