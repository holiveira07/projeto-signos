<?php include('layouts/header.php'); ?>

<?php

// 1. pegar a data do formulário
$data_nascimento = $_POST['data_nascimento'];

// 2. converter a data
$data_user = strtotime($data_nascimento);
$dia_mes_user = date("m-d", $data_user);

// 3. carregar o XML
$signos = simplexml_load_file('signos.xml');

$signo_encontrado = null;

// 4. percorrer os signos
foreach ($signos->signo as $signo) {

    // converter datas do XML
    $inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
    $fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

    $inicio_format = $inicio->format("m-d");
    $fim_format = $fim->format("m-d");

    // 5. lógica de comparação
    if ($inicio_format <= $fim_format) {

        if ($dia_mes_user >= $inicio_format && $dia_mes_user <= $fim_format) {
            $signo_encontrado = $signo;
            break;
        }

    } else {
        // caso especial (Capricórnio)
        if ($dia_mes_user >= $inicio_format || $dia_mes_user <= $fim_format) {
            $signo_encontrado = $signo;
            break;
        }
    }
}

?>

<h2 class="mt-4">
<div class="card shadow-lg p-5 text-center">

<?php if ($signo_encontrado): ?>

    <div class="signo-icon mb-3">
        🔮
    </div>

    <h2 class="mb-2">Seu signo é:</h2>

    <h1 class="text-primary display-4">
        <?= $signo_encontrado->signoNome ?>
    </h1>

    <p class="mt-3 fs-5">
        <?= $signo_encontrado->descricao ?>
    </p>

<?php else: ?>

    <div class="alert alert-warning">
        Não foi possível identificar seu signo.
    </div>

<?php endif; ?>

<a href="index.php" class="btn btn-dark mt-4">🔙 Voltar</a>

</div>
<script src="/Project/assets/js/script.js"></script>
</body>
</html>