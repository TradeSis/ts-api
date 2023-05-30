<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$posts = array();

$sql = "SELECT * FROM posts ";
if (isset($jsonEntrada["idPost"])) {
  $sql = $sql . " where posts.idPost = " . $jsonEntrada["idPost"];
}
else {
  $where = " where ";
  if (isset($jsonEntrada["titulo"])) {
    $sql = $sql . $where . " posts.titulo like " . "'%" . $jsonEntrada["titulo"] . "%'";
    $where = " and ";
  }

  if (isset($jsonEntrada["categoria"])) {
    $sql = $sql . $where . " posts.categoria = " .  "'" . $jsonEntrada["categoria"] . "'";
    $where = " and ";
  }
}

//echo  $sql;
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($posts, $row);
  $rows = $rows + 1;
}

if (isset($jsonEntrada["idPost"]) && $rows==1) {
  $posts = $posts[0];
}
$jsonSaida = $posts;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>