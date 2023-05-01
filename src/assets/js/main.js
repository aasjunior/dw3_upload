$('#select_tamanho_arquivo').on('change', function(){
    $('#MAX_FILE_SIZE').val(this.value);
});

$('#file').on('change', function(){
    $('#uploads').empty();
    filePreview(this);
});

filePreview = (input) => {
    for(let i=0; i<input.files.length; i++){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#uploads').append("<img class='w-25 my-3' src='" + e.target.result + "'/>");
        };
        reader.readAsDataURL(input.files[i]);
    }
}