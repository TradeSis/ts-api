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
  $antnivel = $nivel - 1;
  $codigo = $row["Codigo"];
  $superior = $row["superior"];
  if ($nivel < 4) {
    $sql1 = "SELECT * FROM ncm where ncm.superior = " . $codigo . " and ncm.nivel = " . $proxnivel;

    $buscar1 = mysqli_query($conexao, $sql1);
    while ($row1 = mysqli_fetch_array($buscar1, MYSQLI_ASSOC)) {
      $linhaNcm1 = array(
        "Codigo" => $row1["Codigo"],
        "Descricao" => $row1["Descricao"],
        "superior" => $row1["superior"],
        "nivel" => $row1["nivel"],
        "pesquisado" => false
      );
      array_push($ncm, $linhaNcm1);

      // nivel 3
      $nivel = $row1["nivel"];
      $proxnivel = $nivel + 1;
      $codigo = $row1["Codigo"];
      $sql2 = "SELECT * FROM ncm where ncm.superior = " . $codigo . " and ncm.nivel = " . $proxnivel;

      $buscar2 = mysqli_query($conexao, $sql2);
      while ($row2 = mysqli_fetch_array($buscar2, MYSQLI_ASSOC)) {
        $linhaNcm2 = array(
          "Codigo" => $row2["Codigo"],
          "Descricao" => $row2["Descricao"],
          "superior" => $row2["superior"],
          "nivel" => $row2["nivel"],
          "pesquisado" => false
        );
        array_push($ncm, $linhaNcm2);



        // nivel 4
        $nivel = $row2["nivel"];
        $proxnivel = $nivel + 1;
        $codigo = $row2["Codigo"];
        $sql3 = "SELECT * FROM ncm where ncm.superior = " . $codigo . " and ncm.nivel = " . $proxnivel;

        $buscar3 = mysqli_query($conexao, $sql3);
        while ($row3 = mysqli_fetch_array($buscar3, MYSQLI_ASSOC)) {
          $linhaNcm3 = array(
            "Codigo" => $row3["Codigo"],
            "Descricao" => $row3["Descricao"],
            "superior" => $row3["superior"],
            "nivel" => $row3["nivel"],
            "pesquisado" => false
          );
          array_push($ncm, $linhaNcm3);

        } //while nivel 4
      } //while nivel 3
    }

  }
 
  if ($antnivel > 0) {
    $sql1 = "SELECT * FROM ncm where ncm.codigo = " . $superior . " and ncm.nivel = " . $antnivel;
   

    $buscar1 = mysqli_query($conexao, $sql1);
    while ($row1 = mysqli_fetch_array($buscar1, MYSQLI_ASSOC)) {
      $linhaNcm1 = array(
        "Codigo" => $row1["Codigo"],
        "Descricao" => $row1["Descricao"],
        "superior" => $row1["superior"],
        "nivel" => $row1["nivel"],
        "pesquisado" => false
      );
      array_push($ncm, $linhaNcm1);
      // nivel 3
      $nivel = $row1["nivel"];
      $proxnivel = $nivel - 1;
      $codigo = $row1["superior"];
      $sql2 = "SELECT * FROM ncm where ncm.superior = " . $codigo . " and ncm.nivel = " . $proxnivel;
      if ($proxnivel > 0) {
        $buscar2 = mysqli_query($conexao, $sql2);
        while ($row2 = mysqli_fetch_array($buscar2, MYSQLI_ASSOC)) {
          $linhaNcm2 = array(
            "Codigo" => $row2["Codigo"],
            "Descricao" => $row2["Descricao"],
            "superior" => $row2["superior"],
            "nivel" => $row2["nivel"],
            "pesquisado" => false
          );
          array_push($ncm, $linhaNcm2);
        }
      }
    }

  }

}

$jsonSaida = $ncm;

//echo "-SAIDA->".json_encode($jsonSaida)."\n";
