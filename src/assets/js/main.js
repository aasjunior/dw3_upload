$('#select_tamanho_arquivo').on('change', function(){
    $('#MAX_FILE_SIZE').val(this.value);
});

$('#file').on('change', function(){
    let maxSize = document.getElementById('MAX_FILE_SIZE').value;
    $('#uploads').empty();
    filePreview(this, maxSize);
});

$('#modal-delete').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let id = button.data('id');
    let modal = $(this);
    modal.find('#deletar').data('id', id);
});

$('#deletar').on('click', function(event){
    let id = $(this).data('id');
    $('#modal-delete').modal('hide');
    $.ajax({
        url: '../controllers/delete.php',
        type: 'POST',
        data: { id: id },
        success: function(response){
            showAlert(response, true);
        },
        error: function(xhr, status, error) {
            showAlert('Ocorreu um erro ao processar a solicitação');
            console.error(xhr.responseText);
        }
    });
});

// Functions

filePreview = (input, maxSize) => {
    for(let i=0; i<input.files.length; i++){
        if(input.files[i].type === "image/png" && input.files[i].size <= maxSize){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#uploads').append("<img class='w-25 my-3' src='" + e.target.result + "'/>");
            };
            reader.readAsDataURL(input.files[i]);
        }else{
            let msg = "Tamanho e tipo de arquivo invalido";
            if(input.files[i].type !== "image/png"){
                msg = "Tipo de arquivo invalido";
            }else if(input.files[i].size > maxSize){
                msg = "Tamanho de arquivo invalido";
            }
            showAlert(msg);
            input.value = "";
        }
    }
}

showAlert = (msg, reload = false) => {
    const alert = document.getElementById('alert');

    alert.querySelector("#modal-text").textContent = msg;
    $('#alert').modal('show');

    if(reload==true){
        $('#alert').on('hidden.bs.modal', function(){
            window.location.reload();
        });
    }
}