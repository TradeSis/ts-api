<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$posts = array();

$sql = "SELECT * FROM posts ";

$sql = $sql . " where posts.slug = '" . $jsonEntrada["slug"] . "'";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($posts, $row);
  $rows = $rows + 1;
}

if ($rows==1) {
  $posts = $posts[0];
}
$jsonSaida = $posts;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";



?>