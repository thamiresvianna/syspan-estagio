<?php
    $equipamentos = [
        "Plataforma Elevatória Articulada", 
        "Gerador de Energia", 
        "Betoneira", 
        "Martelo Demolidor", 
        "Rolo Compactador",
        "Furadeira"
    ];

    $resultados = [];

    if (isset($_GET['q'])){
        $busca = strtolower(trim($_GET['q'] ?? ''));

        foreach ($equipamentos as $equipamento){
            if (strpos(strtolower($equipamento), $busca) !== false){
                $resultados[] = $equipamento;
            }
        }
    }
    
?>

<h2>Busca Simples</h2>

<form method="GET">
    <input type="text" name="q" placeholder="Buscar um equipamento..." value="<?= htmlspecialchars($busca ?? '') ?>">
    <button type="submit">Buscar</button>
</form>

<hr>

<?php
    if (isset($busca)) {
        echo "<h2>Resultados da busca para: <span style='color: red;'>" . htmlspecialchars($busca) . "</span></h2>";
        if(count($resultados) > 0){
            foreach ($resultados as $resultado){
                echo $resultado . "<br>";
            }
        } else {
            echo "Nenhum equipamento encontrado.";
        }
    }
?>