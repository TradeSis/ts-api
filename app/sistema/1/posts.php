<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$posts = array();

$sql = "SELECT * FROM posts ";
if (isset($jsonEntrada["idPost"])) {
  $sql = $sql . " where posts.idPost = " . $jsonEntrada["idPost"];
}
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