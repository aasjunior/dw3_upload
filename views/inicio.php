<?php 
    include('../models/conn.php');
    include('./blades/header.php');
    include('./components/modal.php');

    if(!file_exists("../src/uploads")){
        mkdir("../src/uploads");
    }
?>
<main id="main" class="container bg-white mt-5 rounded-2 p-3 shadow-lg">
    <form id="forms" name="upload" action="../controllers/upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="1000000"> 
        <div class="row my-3">
            <div class="col-6">
                <label class="form-label">Selecione as imagens</label>    
                <input type="file" class="form-control" name="arquivo[]" multiple="multiple" accept="image/png" required>
            </div>
            <div class="col-4">
                    <label class="form-label" for="select_tamanho_arquivo">Selecione o tamanho maximo das imagens:</label>
                    <select id="select_tamanho_arquivo" name="select_tamanho_arquivo" class="form-select form-select-sm w-25 h-50 rounded-2" aria-label=".form-select-sm example">
                        <option selected value="1000000">1 MB</option>
                        <option value="5242880">5 MB</option>
                        <option value="10485760">10 MB</option>
                        <option value="52428800">50 MB</option>
                        <option value="104857600">100 MB</option>
                        <option value="524288000">500 MB</option>
                        <option value="1073741824">1 GB</option>
                    </select>
                </div>
            </div>
        </div>
        <input type="submit" id="btnEnviar" class="btn btn-primary" name="enviar" value="Enviar">
    </form>
    <hr>
    <table class="table table-bordered table-striped table-hover">
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
</main>
<?php
    include('./blades/footer.php'); 
?>