<?php
    $equipamentos = [
        ["nome" => "Plataforma Elevatória Articulada", "diaria" => 550],
        ["nome" => "Gerador de Energia", "diaria" => 230],
        ["nome" => "Betoneira", "diaria" => 19],
        ["nome" => "Martelo Demolidor", "diaria" => 35],
        ["nome" => "Rolo Compactador", "diaria" => 250],
    ];

    echo "<h2>Lista de Equipamentos</h2>";
    foreach ($equipamentos as $equipamento) {
        echo "<strong>Nome:</strong> " . $equipamento["nome"] . " | <strong>Diária:</strong> R$ " . number_format($equipamento["diaria"], 2, ',', '.') . "<br>";
    }

    echo "<h2>Equipamento Mais Caro</h2>";
    $maisCaro = $equipamentos[0];
    foreach ($equipamentos as $equipamento) {
        if ($equipamento["diaria"] > $maisCaro["diaria"]) {
            $maisCaro = $equipamento;
        }        
    }
    echo $maisCaro["nome"] . " | R$ " . number_format($maisCaro["diaria"], 2, ',', '.');

    echo "<h2>Média das Diárias</h2>";
    $somaTotal = 0;
    foreach ($equipamentos as $equipamento) {
        $somaTotal += $equipamento["diaria"];
    }
    $media = $somaTotal / count($equipamentos);
    echo "R$ " . number_format($media, 2, ',', '.');
?>