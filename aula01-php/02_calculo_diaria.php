<?php
    function calcularTotalLocacao($diaria, $dias, $descontoPercentual) {
        $erros = [];
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

        if (!empty($erros)) {
            return $erros;
        }

        $totalBruto = $diaria * $dias;
        $desconto = $totalBruto * ($descontoPercentual/100);
        $totalFinal = $totalBruto - $desconto;

        return $totalFinal;
    }

    $diaria = 180.50;
    $dias = 4;
    $descontoPercentual = 10;

    echo "<strong>Valor da diária:</strong> R$ " . number_format($diaria, 2, ',', '.') . "<br>";
    echo "<strong>Quantidade de dias:</strong> " . $dias . "<br>";
    echo "<strong>Desconto:</strong> " . $descontoPercentual . "%<br>";

    $resultado = calcularTotalLocacao($diaria, $dias, $descontoPercentual);

    if (is_numeric($resultado)) {
        echo "<br>O total da locação é de <strong>R$ " . number_format($resultado, 2, ',', '.') . "</strong>";
    } else {
        foreach ($resultado as $erro) {
            echo "<br>" . $erro;
        }
    }
?>