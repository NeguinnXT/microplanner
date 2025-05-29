document.getElementById("campo-data-nascimento").addEventListener("change", function() {
    const dataNascimento = new Date(this.value);
    const hoje = new Date();

    let idade = hoje.getFullYear() - dataNascimento.getFullYear();
    const m = hoje.getMonth() - dataNascimento.getMonth();

    if (m < 0 || (m === 0 && hoje.getDate() < dataNascimento.getDate())) {
        idade--;
    }

    // Define a idade no campo
    if (!isNaN(idade)) {
        document.getElementById("campo-idade").value = idade;
    } else {
        document.getElementById("campo-idade").value = '';
    }
});
document.querySelectorAll("form").forEach(form => {
    form.addEventListener("submit", function() {
        const btn = this.querySelector("button[type='submit']");
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = "Salvando...";
        }
    });
});