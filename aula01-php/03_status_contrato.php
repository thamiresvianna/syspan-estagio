<?php
    function statusContrato($dataInicio, $dataFim, $dataHoje) {
        $inicio = strtotime($dataInicio);
        $fim = strtotime($dataFim);
        $hoje = strtotime($dataHoje);

        if ($hoje < $inicio) {
            return "Agendado";
        } elseif ($hoje >= $inicio && $hoje <= $fim) {
            return "Ativo";
        } else {
            return "Encerrado";
        }
    }

    $dataInicio = "2026-04-27";
    $dataFim = "2026-05-01";
    $dataHoje = "2026-04-30";
    
    $status = statusContrato($dataInicio, $dataFim, $dataHoje);
    echo "<strong>Status do Contrato:</strong> $status";
?>