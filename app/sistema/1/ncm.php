<?php
$conexao = conectaMysql();
$ncm = array();

function Desce($conexao, $nivel, $superior, &$ncm) {
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
    array_push($ncm, $linhaNcm);
    Desce($conexao, $row["nivel"], $row["Codigo"], $ncm);
  }
}
function Sobe($conexao, $nivel, $superior, &$ncm) {
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
    array_push($ncm, $linhaNcm);

    if ($row["nivel"] != 1) {
      Sobe($conexao, $row["nivel"], $row["superior"], $ncm);
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
    Sobe($conexao, $row["nivel"], $row["superior"], $ncm);
  }

  if ($row["nivel"] < 4) {
    Desce($conexao, $row["nivel"], $row["Codigo"], $ncm);
  }
  array_push($ncm, $linhaNcm);
  $rows++;

}

$jsonSaida = $ncm;


//echo "-SAIDA->".json_encode($jsonSaida)."\n";
