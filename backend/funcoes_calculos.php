<?php

// $origem = 'R';
// $destino = 'W';

// $arcos = [
//     'RC', 'RT', 'CO', 'CR', 'CT', 'OC',
//     'OT', 'OW', 'TP', 'TO', 'TW', 'TC',
//     'TR', 'PT', 'PW', 'WP', 'WT', 'WO'
// ];

// $nos = ['R', 'C', 'O', 'T', 'P', 'W'];

// $custos = [
//     'RC' => 18, 'RT' => 32, 'CO' => 12, 'CR' => 18, 'CT' => 28, 'OC' => 12,
//     'OT' => 17, 'OW' => 32, 'TP' => 4, 'TO' => 17, 'TW' => 17, 'TC' => 28,
//     'TR' => 32, 'PT' => 4, 'PW' => 11, 'WP' => 11, 'WT' => 11, 'WO' => 32
// ];

// Fórmula de haversine -> em KM
//https://www.geeksforgeeks.org/program-distance-two-points-earth/
function calculaDistancia($lat1, $lng1, $lat2, $lng2)
{
    $latFrom = deg2rad($lat1);
    $lngFrom = deg2rad($lng1);
    $latTo = deg2rad($lat2);
    $lngTo = deg2rad($lng2);

    $latDelta = $latTo - $latFrom;
    $lngDelta = $lngTo - $lngFrom;

    $val = pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lngDelta / 2), 2);

    $res = 2 * asin(sqrt($val));

    $radius = 6371;

    return ($res * $radius);
}

function percursoMinimo()
{
    global $arcos, $nos, $origem, $destino, $custos;

    if ($origem == $destino) return;

    // 1
    $listaArcosPorNo = [];

    // Para cada nó, criar lista com arcos
    // Omitindo arcos com destino como nó inicial e origem como final
    foreach ($nos as $no) {
        foreach ($arcos as $arco) {

            if ($arco[0] == $destino or $arco[1] == $origem or $arco[0] != $no)
                continue;

            $listaArcosPorNo[$no][] = [
                "arco" => $arco,
                "custo" => $custos[$arco]
            ];
        }
    }

    //2
    $valoresNo = [];
    $nosMarcados = [];
    $arcosMarcados = [];

    // Marcar no origem
    // Alocar valor 0 para o nó
    $noAtual = $origem;
    $nosMarcados[] = $noAtual;
    $valoresNo[$noAtual] = 0;

    // Procurar arco de menor custo e marca-lo
    // Marcar segundo nó do arco e alocar valor do custo
    $arcoMarcado = NULL;
    $menorCusto = PHP_FLOAT_MAX;
    foreach ($listaArcosPorNo[$noAtual] as $arco) {
        if ($arco['custo'] < $menorCusto) {
            $menorCusto = $arco['custo'];
            $arcoMarcado = $arco['arco'];
        }
    }
    $arcosMarcados[] = $arcoMarcado;
    $noAtual = $arcoMarcado[1];
    $nosMarcados[] = $noAtual;
    $valoresNo[$noAtual] = $menorCusto;

    do {
        // Remover da lista arcos cujo segundo nó seja nó recem marcado
        foreach ($listaArcosPorNo as $no => $listaArcos) {
            foreach ($listaArcos as $i => $arco) {
                if ($arco['arco'][1] == $noAtual)
                    array_splice($listaArcosPorNo[$no], $i, 1);
            }
        }

        // Para cada nó marcado
        //   Para cada arco não marcado
        //     Somar valor alocado do nó + custo do arco
        // Encontrar menor soma e marcar arco
        // Marcar 2o nó do arco

        $arcoMarcado = NULL;
        $menorSoma = PHP_FLOAT_MAX;
        foreach ($nosMarcados as $no) {
            foreach ($listaArcosPorNo[$no] as $arco) {
                if (in_array($arco['arco'], $arcosMarcados)) continue;

                $soma = $valoresNo[$no] + $arco['custo'];

                if ($soma < $menorSoma) {
                    $menorSoma = $soma;
                    $arcoMarcado = $arco['arco'];
                }
            }
        }

        if (!$arcoMarcado) return;

        $arcosMarcados[] = $arcoMarcado;
        $noAtual = $arcoMarcado[1];
        $nosMarcados[] = $noAtual;
        $m = $menorSoma;
        $valoresNo[$noAtual] = $m;

        //3 - Até caminhar ao nó destino
    } while ($noAtual != $destino);

    $arcoAtual = $arcoMarcado;
    $percurso = [$arcoAtual];

    while ($arcoAtual[0] != $origem) {
        foreach ($arcosMarcados as $i => $arco) {

            if ($arcoAtual[0] == $arco[1]) {
                $arcoAtual = $arco;
                $percurso[] = $arcoAtual;
                array_splice($arcosMarcados, $i, 1);
            }
        }
    }

    return [
        'cost' => $m,
        'route' => array_reverse($percurso)
    ];
}
