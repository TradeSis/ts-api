<?php
$conexao = conectaMysql();
$ncm = array();
$ncmIds = array();

function Desce($conexao, $superior, &$ncm, &$ncmIds)
{
    $sql = "SELECT * FROM fisncm WHERE fisncm.superior LIKE '" . $superior . "%'";
    $buscar = mysqli_query($conexao, $sql);

    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
        $linhaNcm = [
            "Codigo" => $row["Codigo"],
            "Descricao" => $row["Descricao"],
            "superior" => $row["superior"],
            "nivel" => $row["nivel"],
            "ultimonivel" => $row["ultimonivel"],
            "pesquisado" => false
        ];

        if (!in_array($row["Codigo"], $ncmIds)) {
            array_push($ncm, $linhaNcm);
            array_push($ncmIds, $row["Codigo"]);
        }

        Desce($conexao, $row["Codigo"], $ncm, $ncmIds);
    }
}

function Sobe($conexao, $superior, &$ncm, &$ncmIds)
{
    $sql = "SELECT * FROM fisncm WHERE fisncm.Codigo = $superior";
    $buscar = mysqli_query($conexao, $sql);

    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
        $linhaNcm = [
            "Codigo" => $row["Codigo"],
            "Descricao" => $row["Descricao"],
            "superior" => $row["superior"],
            "nivel" => $row["nivel"],
            "ultimonivel" => $row["ultimonivel"],
            "pesquisado" => false
        ];

        if (!in_array($row["Codigo"], $ncmIds)) {
            array_push($ncm, $linhaNcm);
            array_push($ncmIds, $row["Codigo"]);
        }

        if ($row["nivel"] != 1 || $row["ultimonivel"] != 0) {
            Sobe($conexao, $row["superior"], $ncm, $ncmIds);
        }
    }
}

//**********SQL QUERY **********/
$sql = "SELECT * FROM fisncm";
$where = " WHERE ";
if (isset($jsonEntrada["Codigo"])) {
    $sql .= $where . " fisncm.Codigo = " . $jsonEntrada["Codigo"];
    $where = " AND ";
}
if (isset($jsonEntrada["Descricao"])) {
    $sql .= $where . " fisncm.Descricao LIKE '%" . $jsonEntrada["Descricao"] . "%'";
    $where = " AND ";
}

$rows = 0;
$buscar = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
    $linhaNcm = [
        "Codigo" => $row["Codigo"],
        "Descricao" => $row["Descricao"],
        "superior" => $row["superior"],
        "nivel" => $row["nivel"],
        "ultimonivel" => $row["ultimonivel"],
        "pesquisado" => true
    ];

    if ($row["nivel"] != 1 || $row["ultimonivel"] != 0) {
        Sobe($conexao, $row["superior"], $ncm, $ncmIds);
    }

    if ($row["nivel"] < 6) {
        Desce($conexao, $row["Codigo"], $ncm, $ncmIds);
    }


    if (!in_array($row["Codigo"], $ncmIds)) {
        array_push($ncm, $linhaNcm);
        array_push($ncmIds, $row["Codigo"]);
    }
    $rows++;
}

$jsonSaida = $ncm;
usort($jsonSaida, fn($a, $b) => $a['nivel'] - $b['nivel']);