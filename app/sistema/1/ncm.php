<?php
$conexao = conectaMysql();
$ncm = array();

$sql = "SELECT * FROM ncm  ";
if (isset($jsonEntrada["Codigo"])) {
  $sql = $sql . " where ncm.Codigo = " . $jsonEntrada["Codigo"];
} else {
  $where = " where ";

  if (isset($jsonEntrada["Descricao"])) {
    $sql = $sql . $where . " ncm.Descricao like " . "'%" . $jsonEntrada["Descricao"] . "%'";
    $where = " and ";
  }

}


$rows = 0;
$buscar = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {

  //echo "-ROW->".json_encode($row)."\n";

  $linhaNcm = array(
    "Codigo" => $row["Codigo"],
    "Descricao" => $row["Descricao"],
    "superior" => $row["superior"],
    "nivel" => $row["nivel"],
    "pesquisado" => true
  );

  array_push($ncm, $linhaNcm);
  $rows = $rows + 1;

  // leitura de subnivel
  $nivel = $row["nivel"];
  $proxnivel = $nivel + 1;
  $superior = $row["Codigo"];
  if ($nivel < 4) {
    $sql1 = "SELECT * FROM ncm where ncm.superior = " . $superior . " and ncm.nivel = " . $proxnivel;

    $buscar1 = mysqli_query($conexao, $sql1);
    while ($row1 = mysqli_fetch_array($buscar1, MYSQLI_ASSOC)) {
        $linhaNcm1 = array(
          "Codigo" => $row1["Codigo"],
          "Descricao" => $row1["Descricao"],
          "superior" => $row1["superior"],
          "nivel" => $row1["nivel"],
          "pesquisado" => true
        );
        array_push($ncm, $linhaNcm1);

        // nivel 3




            // nivel 4

            
      }
  
  }


}

$jsonSaida = $ncm;

//echo "-SAIDA->".json_encode($jsonSaida)."\n";
