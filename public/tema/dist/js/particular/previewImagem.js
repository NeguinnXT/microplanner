function previewImagem(input) {
    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}

// Atualiza o label do input customizado com o nome do arquivo
document.querySelector('.custom-file-input').addEventListener('change', function(e) {
    const fileName = e.target.files[0]?.name;
    const label = e.target.nextElementSibling;
    if (label && fileName) {
        label.innerText = fileName;
    }
});

// Atualiza o label com o nome do arquivo
document.getElementById('Imagem_eventos').addEventListener('change', function(e) {
    const fileName = e.target.files[0]?.name;
    const label = e.target.nextElementSibling;
    if (label && fileName) {
        label.innerText = fileName;
    }
});

// Exibe preview da nova imagem selecionada
function previewNovaImagem(input) {
    const preview = document.getElementById('preview_nova_imagem');
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.classList.add('d-none');
    }
}