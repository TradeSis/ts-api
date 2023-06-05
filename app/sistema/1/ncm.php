<?php
$conexao = conectaMysql();
$ncm = array();
$ncmIds = array(); // Array to store unique NCm codes

function Desce($conexao, $nivel, $superior, &$ncm, &$ncmIds) {
  $proxnivel = $nivel + 1;
  $sql = "SELECT * FROM ncm WHERE ncm.superior = $superior AND ncm.nivel = $proxnivel";
  $buscar = mysqli_query($conexao, $sql);

  while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
    $linhaNcm = array(
      "Codigo" => $row["Codigo"],
      "Descricao" => $row["Descricao"],
      "superior" => $row["superior"],
      "nivel" => $row["nivel"],
      "pesquisado" => false
    );
    
    // Check if code already exists, if not add it to $ncm and $ncmIds
    if (!in_array($row["Codigo"], $ncmIds)) {
      array_push($ncm, $linhaNcm);
      array_push($ncmIds, $row["Codigo"]);
    }

    Desce($conexao, $row["nivel"], $row["Codigo"], $ncm, $ncmIds);
  }
}

function Sobe($conexao, $nivel, $superior, &$ncm, &$ncmIds) {
  $sql = "SELECT * FROM ncm WHERE ncm.Codigo = $superior";
  $buscar = mysqli_query($conexao, $sql);

  while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
    $linhaNcm = array(
      "Codigo" => $row["Codigo"],
      "Descricao" => $row["Descricao"],
      "superior" => $row["superior"],
      "nivel" => $row["nivel"],
      "pesquisado" => false
    );
    
    // Check if code already exists, if not add it to $ncm and $ncmIds
    if (!in_array($row["Codigo"], $ncmIds)) {
      array_push($ncm, $linhaNcm);
      array_push($ncmIds, $row["Codigo"]);
    }

    if ($row["nivel"] != 1) {
      Sobe($conexao, $row["nivel"], $row["superior"], $ncm, $ncmIds);
    }
  }
}

$sql = "SELECT * FROM ncm";

$where = " WHERE ";
if (isset($jsonEntrada["Codigo"])) {
  $sql .= $where . " ncm.Codigo = " . $jsonEntrada["Codigo"];
  $where = " AND ";
} 
if (isset($jsonEntrada["Descricao"])) {
  $sql .= $where . " ncm.Descricao LIKE '%" . $jsonEntrada["Descricao"] . "%'";
  $where = " AND ";
}

$rows = 0;
$buscar = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  $linhaNcm = array(
    "Codigo" => $row["Codigo"],
    "Descricao" => $row["Descricao"],
    "superior" => $row["superior"],
    "nivel" => $row["nivel"],
    "pesquisado" => true
  );

  if ($row["nivel"] != 1) {
    Sobe($conexao, $row["nivel"], $row["superior"], $ncm, $ncmIds);
  }

  if ($row["nivel"] < 4) {
    Desce($conexao, $row["nivel"], $row["Codigo"], $ncm, $ncmIds);
  }
  
  // Check if code already exists, if not add it to $ncm and $ncmIds
  if (!in_array($row["Codigo"], $ncmIds)) {
    array_push($ncm, $linhaNcm);
    array_push($ncmIds, $row["Codigo"]);
  }
  
  $rows++;
}

$jsonSaida = $ncm;
function sortByNivel($a, $b) {
  return $a['nivel'] - $b['nivel'];
}

usort($jsonSaida, 'sortByNivel');


//echo "-SAIDA->".json_encode($jsonSaida)."\n";
