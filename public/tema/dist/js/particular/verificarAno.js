document.addEventListener('DOMContentLoaded', function() {
    const anoEscolarSelect = document.getElementById('modal-editar-matriculas-AnoEscolar');
    const grupoCurso = document.getElementById('grupo-curso');

    function verificarAnoEscolar() {
        const valor = parseInt(anoEscolarSelect.value);

        if (!isNaN(valor) && valor >= 1 && valor <= 9) {
            grupoCurso.style.display = 'none';
        } else {
            grupoCurso.style.display = 'block';
        }
    }

    // Executa ao carregar
    verificarAnoEscolar();

    // Executa quando o valor mudar
    anoEscolarSelect.addEventListener('change', verificarAnoEscolar);
});

document.addEventListener('DOMContentLoaded', function() {
    const anoEscolarSelect = document.getElementById('AnoEscolar');
    const cursoSelect = document.getElementById('Curso');

    function verificarAnoEscolar() {
        const valorAno = parseInt(anoEscolarSelect.value);

        if (!isNaN(valorAno) && valorAno >= 1 && valorAno <= 9) {
            // Esconde o campo de Curso
            cursoSelect.closest('.form-group').style.display = 'none';
        } else {
            // Mostra o campo de Curso
            cursoSelect.closest('.form-group').style.display = 'block';
        }
    }

    // Executa ao carregar para ver se o valor já está preenchido
    verificarAnoEscolar();

    // Executa quando o valor do Ano Escolar mudar
    anoEscolarSelect.addEventListener('change', verificarAnoEscolar);
});

document.addEventListener("DOMContentLoaded", function() {
    const grupoUtilizador = document.getElementById("grupo_utilizador");
    const grupoDisciplinaContainer = document.getElementById("grupo_disciplina_container");
    const turmaSelect = document.getElementById("turma");
    const anoEscolarSelect = document.getElementById("ano_escola").parentNode; // Container do Ano Escolar
    const cursosSelect = document.getElementById("cursos").parentNode; // Pega o container do select de Cursos
    const tipoAtividadeSelect = document.getElementById("atividade_tipo_entrada").parentNode;

    // Esconde todos os campos inicialmente
    tipoAtividadeSelect.style.display = "none";
    anoEscolarSelect.style.display = "none"; // Esconde Ano Escolar
    turmaSelect.parentNode.style.display = "none"; // Esconde Turma
    cursosSelect.style.display = "none"; // Esconde Cursos
    grupoDisciplinaContainer.style.display = "none"; // Esconde Grupo Disciplinar

    const grupoUtilizadorOptions = ["Diretor", "Vice-diretor", "Secretaria", "Funcionaria", "Visitante"];

    // Função para exibir/ocultar campos dependendo do tipo de utilizador
    function toggleCampos() {
        const tipoUtilizador = grupoUtilizador.value;

        // Se o tipo de utilizador for "Aluno", exibe o campo Ano Escolar
        if (tipoUtilizador === "Aluno") {
            anoEscolarSelect.style.display = "block"; // Exibe o Ano Escolar
        } else {
            anoEscolarSelect.style.display = "none"; // Esconde o Ano Escolar se não for Aluno
        }

        // Esconde os outros campos caso o tipo de utilizador não seja "Aluno"
        turmaSelect.parentNode.style.display = "none";
        cursosSelect.style.display = "none";
        grupoDisciplinaContainer.style.display = "none";
        tipoAtividadeSelect.style.display = "none"; // Esconde Tipo de Atividade

        // Caso o utilizador seja "Aluno", ao selecionar um ano escolar, exibimos outros campos
        if (tipoUtilizador === "Aluno" && anoEscolarSelect.style.display === "block") {
            anoEscolarSelect.addEventListener("change", function() {
                const anoEscolar = anoEscolarSelect.querySelector("select").value;

                if (anoEscolar) {
                    turmaSelect.parentNode.style.display = "block"; // Exibe a Turma
                    tipoAtividadeSelect.style.display = "block"; // Exibe Tipo de Atividade

                    // Se o ano for 10º ao 12º, exibe o campo Cursos
                    if (parseInt(anoEscolar) >= 10 && parseInt(anoEscolar) <= 12) {
                        cursosSelect.style.display = "block"; // Exibe Cursos
                    } else {
                        cursosSelect.style.display = "none"; // Esconde Cursos
                    }
                } else {
                    turmaSelect.parentNode.style.display = "none"; // Esconde Turma
                    cursosSelect.style.display = "none"; // Esconde Cursos
                    tipoAtividadeSelect.style.display = "none"; // Esconde Tipo de Atividade
                }
            });
        }

        // Caso o utilizador seja "Professor"
        if (tipoUtilizador === "Professor") {
            grupoDisciplinaContainer.style.display = "block"; // Exibe Grupo Disciplinar
            tipoAtividadeSelect.style.display = "block"; // Exibe Tipo de Atividade
        }

        // Caso o utilizador seja "Visitante" ou outros tipos restritos
        if (tipoUtilizador === "Visitante" || grupoUtilizadorOptions.includes(tipoUtilizador)) {
            tipoAtividadeSelect.style.display = "block"; // Exibe apenas Tipo de Atividade
        }
    }

    // Evento para alternar entre Turma e Cursos
    turmaSelect.addEventListener("change", function() {
        if (turmaSelect.value) {
            cursosSelect.style.display = "none"; // Esconde Cursos
        } else {
            cursosSelect.style.display = "block"; // Exibe Cursos
        }
    });

    cursosSelect.addEventListener("change", function() {
        if (cursosSelect.value) {
            turmaSelect.parentNode.style.display = "none"; // Esconde Turma
        } else {
            turmaSelect.parentNode.style.display = "block"; // Exibe Turma
        }
    });

    // Executa ao carregar a página para verificar se algum valor já está selecionado
    toggleCampos();

    // Adiciona evento para monitorar mudanças na seleção do tipo de utilizador
    grupoUtilizador.addEventListener("change", toggleCampos);
});