<?php

require 'database.php';
require 'percurso_minimo.php';

// Tabela de cidades
$cities = queryCitiesP();

$conn->close();

// Abre arquivo com vertices
$vertices = [];
if ($file = fopen(__DIR__ . "/vertices.txt", "r")) {
    while (!feof($file)) {
        $line = trim(fgets($file));
        $vertices[] = explode(",", $line);
    }
    fclose($file);
} else {
    die($file);
}

// Função para calcular distância euclidiana
function calculaDistancia($x1, $y1, $x2, $y2)
{
    return sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2));
}

// Arrays com os nós (cidades) e dicionário por cidade
$nos = [];
$citiesArray = [];
foreach ($cities as $city) {
    $citiesArray[$city['name']] = [
        "lat" => $city['lat'],
        "lng" => $city['lng']
    ];
    $nos[] = strtoupper($city['name']);
}

// Arrays com os arcos ("AB") e custos ("AB" => 10)
$arcos = [];
$custos = [];
foreach ($vertices as $v) {
    $arco = strtoupper($v[0]) . strtoupper($v[1]);
    $arcos[] = $arco;
    $rev = strrev($arco);
    $arcos[] = $rev;

    $cidade1 = $citiesArray[$v[0]];
    $cidade2 = $citiesArray[$v[1]];

    $custo = calculaDistancia($cidade1['lat'], $cidade1['lng'], $cidade2['lat'], $cidade2['lng']);
    $custos[$arco] = $custo;
    $custos[$rev] = $custo;
}

// Pega informações da requisição
$origem = strtoupper($_GET['cityA']);
$destino = strtoupper($_GET['cityB']);

// $origem = 'A';
// $destino = 'E';

// Calcula percurso mínimo
$resposta = percursoMinimo();

if (!$resposta) {
    $resposta = [
        "response" => FALSE
    ];
} else {
    $resposta = [
        "response" => $resposta
    ];
}

echo json_encode($resposta);
