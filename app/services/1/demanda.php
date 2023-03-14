<?php
// Lucas 17022023 adicionado condição else para idTipoStatus
//gabriel 07022023 16:25
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$demanda = array();

$sql = "SELECT demanda.*, cliente.nomeCliente, tipoocorrencia.nomeTipoOcorrencia, tipostatus.nomeTipoStatus, usuario.nomeUsuario FROM demanda
        INNER JOIN cliente on  demanda.idCliente = cliente.idCliente 
        LEFT JOIN usuario on  demanda.idAtendente = usuario.idUsuario 
        INNER JOIN tipoocorrencia on demanda.idTipoOcorrencia = tipoocorrencia.idTipoOcorrencia 
        INNER JOIN tipostatus on demanda.idTipoStatus = tipostatus.idTipoStatus";
if (isset($jsonEntrada["idDemanda"])) {
  $sql = $sql . " where demanda.idDemanda = " . $jsonEntrada["idDemanda"];
} else {
  if (isset($jsonEntrada["idTipoStatus"])) {
    $sql = $sql . " where demanda.idTipoStatus = " . $jsonEntrada["idTipoStatus"];
  }
}
$sql = $sql . " order by ordem, prioridade, idDemanda";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($demanda, $row);
  $rows = $rows + 1;
}
if (isset($jsonEntrada["idDemanda"]) && $rows == 1) {
  $demanda = $demanda[0];
}
$jsonSaida = $demanda;
