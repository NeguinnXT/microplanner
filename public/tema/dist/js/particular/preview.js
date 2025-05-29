 // Atualiza o nome do arquivo e exibe a imagem de preview
 function previewFoto(input) {
    const file = input.files[0];
    if (file) {
        document.querySelector('.custom-file-label').textContent = file.name;

        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}