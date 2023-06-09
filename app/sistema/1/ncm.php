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
            "codigoNcm" => $row["codigoNcm"],
            "Descricao" => $row["Descricao"],
            "superior" => $row["superior"],
            "nivel" => $row["nivel"],
            "ultimonivel" => $row["ultimonivel"],
            "ncm" => $row["ncm"],
            "pesquisado" => false
        ];

        if (!in_array($row["codigoNcm"], $ncmIds)) {
            array_push($ncm, $linhaNcm);
            array_push($ncmIds, $row["codigoNcm"]);
        }

        Desce($conexao, $row["codigoNcm"], $ncm, $ncmIds);
    }
}

function Sobe($conexao, $superior, &$ncm, &$ncmIds)
{
    $sql = "SELECT * FROM fisncm WHERE fisncm.codigoNcm = $superior";
    $buscar = mysqli_query($conexao, $sql);

    while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
        $linhaNcm = [
            "codigoNcm" => $row["codigoNcm"],
            "Descricao" => $row["Descricao"],
            "superior" => $row["superior"],
            "nivel" => $row["nivel"],
            "ultimonivel" => $row["ultimonivel"],
            "ncm" => $row["ncm"],
            "pesquisado" => false
        ];

        if (!in_array($row["codigoNcm"], $ncmIds)) {
            array_push($ncm, $linhaNcm);
            array_push($ncmIds, $row["codigoNcm"]);
        }

        if ($row["nivel"] != 1 || $row["ultimonivel"] != 0) {
            Sobe($conexao, $row["superior"], $ncm, $ncmIds);
        }
    }
}

//**********SQL QUERY **********/
$sql = "SELECT * FROM fisncm";
$where = " WHERE ";
if (isset($jsonEntrada["codigoNcm"])) {
    $sql .= $where . " fisncm.codigoNcm = " . $jsonEntrada["codigoNcm"];
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
        "codigoNcm" => $row["codigoNcm"],
        "Descricao" => $row["Descricao"],
        "superior" => $row["superior"],
        "nivel" => $row["nivel"],
        "ultimonivel" => $row["ultimonivel"],
        "ncm" => $row["ncm"],
        "pesquisado" => true
    ];

    if ($row["nivel"] != 1 || $row["ultimonivel"] != 0) {
        Sobe($conexao, $row["superior"], $ncm, $ncmIds);
    }

    if ($row["nivel"] < 6) {
        Desce($conexao, $row["codigoNcm"], $ncm, $ncmIds);
    }


    if (!in_array($row["codigoNcm"], $ncmIds)) {
        array_push($ncm, $linhaNcm);
        array_push($ncmIds, $row["codigoNcm"]);
    }
    $rows++;
}

$jsonSaida = $ncm;