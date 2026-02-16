<?php
session_start();
//require 'topoadm.php';

if (empty($_SESSION['id'])) {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal - Cadastro de Diploma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/imask"></script>
    <style>
    body {
        background: linear-gradient(135deg, #ffffffff, #74fc25ff);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-wrapper {
        background: #fff;
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 900px;
    }

    .form-wrapper h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border-radius: 12px;
    }
    </style>
</head>

<body>
    <div class="container container d-flex justify-content-center align-items-center">
        <div class="form-wrapper">
            <h2>Cadastro de Certificado</h2>

            <form class="row g-3" action="adm/processa-cadastro-certificado.php" method="POST">

                <div class="col-md-6">
                    <label class="form-label fw-bold">Nome Completo</label>
                    <input class="form-control" type="text" name="nomedoaluno" placeholder="João da Silva" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">CPF</label>
                    <input class="form-control" type="text" id="cpf" name="doc" placeholder="000.000.000-00" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Tipo de Curso</label>
                    <select class="form-control" id="tipoCurso" name="TipoCurso" required onchange="filtrarCursos()">
                        <option value="" disabled selected>Selecione o tipo</option>
                        <!--<option value="graduacao">Graduação</option>-->
                        <option value="Pós Graduação">Pós-Graduação</option>
                        <option value="Pós FMG">Pós FMG</option>
                        <option value="Extensão">Extensão</option>
                    </select>
                </div>
                <!--Modificado para receber a informação digitada-->
                <div class="col-md-6">
                    <label class="form-label fw-bold">Curso</label>
                    <input class="form-control" type="text" id="curso" name="curso" placeholder="Pedagogia" required>
                </div>
                <!-- Campo CURSO (inicialmente escondido)
                <div class="col-md-6" id="grupoCurso" style="display:none;">
                    <label class="form-label fw-bold">Curso</label>
                    <select class="form-control" id="curso" name="curso" required></select>
                </div> -->

                <div class="col-md-6">
                    <label class="form-label fw-bold">CH</label>
                    <input class="form-control" type="text" id="carga" name="ch" placeholder="450" required>
                </div>
                <!-- Campo C/H (inicialmente escondido) 
                <div class="col-md-6" id="grupoCarga" style="display:none;">
                    <label class="form-label fw-bold">C/H</label>
                    <select class="form-control" id="carga" name="ch" required></select>
                </div>-->


                <div class="col-md-6">
                    <label class="form-label fw-bold">Data de Inicio</label>
                    <input class="form-control date" type="text" name="DataDeInicio" placeholder="dd/mm/aaaa" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-bold">Data de Conclusão</label>
                    <input class="form-control date" type="text" name="DataDeConclusao" placeholder="dd/mm/aaaa"
                        required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Data de Emissão</label>
                    <input class="form-control date" type="text" name="DataDeEmissao" placeholder="dd/mm/aaaa" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Livro</label>
                    <input class="form-control date" type="number" id="livro" name="livro" placeholder="01" required>
                </div>

                <div class="col-12 d-flex gap-2">
                    <button class="btn btn-outline-success" type="submit">
                        Salvar
                    </button>

                    <a href="paineladm.php" class="btn btn-outline-danger">
                        <i class="fa-solid fa-arrow-left"></i> Cancelar
                    </a>
                </div>



            </form>
        </div>
    </div>

    <script src="https://unpkg.com/imask"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {

        // CPF
        const cpfInput = document.getElementById('cpf');
        if (cpfInput) {
            IMask(cpfInput, {
                mask: '000.000.000-00'
            });
        }

        // Datas
        document.querySelectorAll('.date').forEach(function(input) {
            IMask(input, {
                mask: '00/00/0000'
            });
        });
        // Cursos e Carga Horária por Tipo
        const cursosPorTipo = {

            "Pós Graduação": [
                "Psicanálise e o Desenvolvimento Infantil",
                "A Psicanálise dos Contos de Fadas na Educação Infantil",
                "Contos de Fadas na Educação"
            ],
            "Pós FMG": ["Alfabetização e Letramento", "Neuropsicopedagogia", "Educação e Psicomotricidade",
                "Novas Tecnologias e Inovação na Educação", "ABA – Análise de Comportamento Aplicada",
                "Gestão Escolar", "A Psicanálise dos Contos de Fadas na Educação",
                "Educação Especial Inclusiva", "Psicopedagogia Institucional",
                "Educação Especial e Inclusiva", "Psicomotricidade", "Educação Especial",
                "Gestão e Orientação Escolar", "Supervisão e Orientação Escolar"
            ],
            "Extensão": ["Extensão em Oratória", "Extensão em Liderança"]
        };
        // Carga Horária por Tipo
        const cargaPorTipo = {
            //graduacao: ["2000 hs", "2400 hs", "3000 hs"],
            "Pós Graduação": ["430", "150", "200", "180", "40", "100", "120", "30", "55", "45",
                "20", "65", "90", "60", "80"
            ],
            "Pós FMG": ["360", "430", "610", "480", "580", "660", "520"],
            "Extensão": ["20", "40", "60"]
        };

        window.filtrarCursos = function() {
            const tipo = document.getElementById("tipoCurso")?.value;
            const curso = document.getElementById("curso");
            const carga = document.getElementById("carga");
            const grupoCurso = document.getElementById("grupoCurso");
            const grupoCarga = document.getElementById("grupoCarga");

            if (!curso || !carga) return;

            curso.innerHTML = "";
            carga.innerHTML = "";

            if (!tipo) {
                grupoCurso.style.display = "none";
                grupoCarga.style.display = "none";
                return;
            }

            grupoCurso.style.display = "block";
            grupoCarga.style.display = "block";

            cursosPorTipo[tipo]?.forEach(item => {
                const opt = document.createElement("option");
                opt.value = item;
                opt.textContent = item;
                curso.appendChild(opt);
            });

            cargaPorTipo[tipo]?.forEach(ch => {
                const opt = document.createElement("option");
                opt.value = ch;
                opt.textContent = ch;
                carga.appendChild(opt);
            });
        }
    });
    </script>


</body>

</html>