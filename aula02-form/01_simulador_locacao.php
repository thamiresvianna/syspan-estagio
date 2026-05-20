<?php
    function calcularTotalLocacao($diaria, $dias, $descontoPercentual) {
        $totalBruto = $diaria * $dias;
        $desconto = $totalBruto * ($descontoPercentual/100);
        $totalFinal = $totalBruto - $desconto;

        return $totalFinal;
    }

    $erros = [];
    $resultado = null;

    $nome = '';
    $equipamento = '';
    $diaria = '';
    $dias = '';
    $descontoPercentual = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = trim($_POST["nome"] ?? '');
        $equipamento = trim($_POST["equipamento"] ?? '');
        $diaria = trim($_POST["diaria"] ?? '');
        $dias = trim($_POST["dias"] ?? '');
        $descontoPercentual = trim($_POST["desconto"] ?? '');

        if(strlen($nome) < 3){
            $erros[] = "Nome deve conter no mínimo 3 caracteres.";
        }
        if ($dias < 1){
            $erros[] = "Quantidade de dias inválida. O valor deve ser maior ou igual a 1.";
        }
        if ($diaria <= 0){
            $erros[] = "Valor da diária inválido. O valor deve ser maior do que 0.";
        }
        if ($descontoPercentual > 50){
            $descontoPercentual = 50;
        }
        if ($descontoPercentual < 0){
            $erros[] = "Valor do desconto inválido. O valor deve ser entre 0 e 50.";
        }
        if (empty($erros)) {
            $resultado = calcularTotalLocacao($diaria, $dias, $descontoPercentual);
        }
    }
?>

<h2>Simulador de Locação</h2>

<form method="POST">
    <label>Nome do Cliente:</label><br>
    <input type="text" name="nome" value="<?= htmlspecialchars($nome) ?>"><br>

    <label>Equipamento:</label><br>
    <input type="text" name="equipamento" value="<?= htmlspecialchars($equipamento) ?>"><br>

    <label>Diária:</label><br>
    <input type="number" step="0.01" name="diaria" value="<?= htmlspecialchars($diaria) ?>"><br>

    <label>Dias:</label><br>
    <input type="number" name="dias" value="<?= htmlspecialchars($dias) ?>"><br>

    <label>Desconto:</label><br>
    <input type="number" name="desconto" value="<?= htmlspecialchars($descontoPercentual) ?>"><br><br>

    <button type="submit">Calcular</button>
</form>

<hr>

<?php
    if (!empty($erros)) {
        echo "<h3>Erros encontrados</h3>";

        foreach ($erros as $erro){
            echo $erro . "<br>";
        }
    }

    if ($resultado !== null) {
        echo "<h3>Resumo da Locação</h3>";

        echo "<strong>Nome do Cliente:</strong> " . htmlspecialchars($nome) . "<br>";
        echo "<strong>Equipamento:</strong> " . htmlspecialchars($equipamento) . "<br>";
        echo "<strong>Valor da Diária:</strong> R$ " . number_format($diaria, 2, ',', '.') . "<br>";
        echo "<strong>Quantidade de Dias:</strong> " . htmlspecialchars($dias) . "<br>";
        echo "<strong>Desconto:</strong> " . htmlspecialchars($descontoPercentual) . "%<br>";

        echo "<br><strong>Total Final:</strong> R$ " . number_format($resultado, 2, ',', '.');
    }
?>