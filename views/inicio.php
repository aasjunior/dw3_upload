<?php 
    include('../models/conn.php');
    include('./blades/header.php'); 
?>
    <form name="upload" action="../controllers/upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="1000000">
        <input type="file" name="arquivo[]" multiple="multiple" accept="image/png" required>
        <input type="submit" name="enviar" value="Enviar"><br>
        <label for="select_tamanho_arquivo">Selecione o tamanho maximo do arquivo:</label><br>
        <select id="select_tamanho_arquivo" name="select_tamanho_arquivo" class="form-select form-select-sm" aria-label=".form-select-sm example">
            <option selected value="1000000">1 MB</option>
            <option value="5242880">5 MB</option>
            <option value="10485760">10 MB</option>
            <option value="52428800">50 MB</option>
            <option value="104857600">100 MB</option>
            <option value="524288000">500 MB</option>
            <option value="1073741824">1 GB</option>
        </select><br>
        <div id="resultado"></div>
    </form>
    <hr>
    <table border="1">
        <thead>
            <tr>
                <th>Arquivo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = mysqli_query($conn, "SELECT * FROM imagesPNG ORDER BY imagesPNG.id DESC"); 
                while($exibe = mysqli_fetch_array($query)){
            ?>
                    <tr>
                        <td>
                            <?php
                                echo "<a href='" . $exibe[1] . "'>" . basename($exibe[1]) . "</a>";
                            ?>
                        </td>
                        <td>
                            <a href="../controllers/delete.php?id=<?php echo $exibe[0] ?>">Excluir</a>
                        </td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
<?php include('./blades/footer.php'); ?>