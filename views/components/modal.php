<?php
    function showAlert($msg=false){
?>
        <div id="alert" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Alerta</h5>
                    <button type="button" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <p id="modal-text"><?php echo $msg; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Ok</button>
                </div>
                </div>
            </div>
        </div>
<?php 
    }
?>