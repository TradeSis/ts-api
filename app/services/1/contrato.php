<?php
// Lucas 17022023 adicionado condição else para idContratoStatus
// Lucas 07022023 criacao

$conexao = conectaMysql();
$contrato = array();

$sql = "SELECT contrato.*, cliente.*, contratostatus.* FROM contrato				
        INNER JOIN cliente on cliente.idCliente = contrato.idcliente 
        INNER JOIN contratostatus  on  contrato.idContratoStatus = contratostatus.idContratoStatus  ";
if (isset($jsonEntrada["idContrato"])) {
  $sql = $sql . " where contrato.idContrato = " . $jsonEntrada["idContrato"];
} else {
  if (isset($jsonEntrada["idContratoStatus"])) {
    $sql = $sql . " where contrato.idContratoStatus = " . $jsonEntrada["idContratoStatus"];
  }
}

//echo "-SQL->".$sql."\n";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($contrato, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idContrato"]) && $rows == 1) {
  $contrato = $contrato[0];
}
$jsonSaida = $contrato;

//echo "-SAIDA->".json_encode($jsonSaida)."\n";
