<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$noticias = array();

$sql = "SELECT noticias.*, autor.*, categoria.* FROM noticias 
        LEFT JOIN autor on autor.idAutor = noticias.idAutor
        LEFT JOIN categoria on categoria.idCategoria = noticias.idCategoria ";

if (isset($jsonEntrada["idNoticia"])) {
  $sql = $sql . " where noticias.idNoticia = " . $jsonEntrada["idNoticia"];

}else {
  $where = " where ";
  if (isset($jsonEntrada["idAutor"])) {
    $sql = $sql . $where . " noticias.idAutor = " . $jsonEntrada["idAutor"];
    $where = " and ";
  }
  if (isset($jsonEntrada["idCategoria"])) {
    $sql = $sql . $where . " noticias.idCategoria = " . $jsonEntrada["idCategoria"];
    $where = " and ";
  }
}
$sql = $sql . " where noticias.idCategoria = 3 ";
$sql = $sql . " ORDER BY idNoticia DESC LIMIT 4 ";
//echo $sql;
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($noticias, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idNoticia"]) && $rows==1) {
  $noticias = $noticias[0];
}
$jsonSaida = $noticias;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>