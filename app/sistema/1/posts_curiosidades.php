<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$posts = array();

$sql = "SELECT posts.*, autor.*, categoria.* FROM posts 
        LEFT JOIN autor on autor.idAutor = posts.idAutor
        LEFT JOIN categoria on categoria.idCategoria = posts.idCategoria ";

if (isset($jsonEntrada["idPost"])) {
  $sql = $sql . " where posts.idPost = " . $jsonEntrada["idPost"];

}else {
  $where = " where ";
  if (isset($jsonEntrada["idAutor"])) {
    $sql = $sql . $where . " posts.idAutor = " . $jsonEntrada["idAutor"];
    $where = " and ";
  }
  if (isset($jsonEntrada["idCategoria"])) {
    $sql = $sql . $where . " posts.idCategoria = " . $jsonEntrada["idCategoria"];
    $where = " and ";
  }
}
$sql = $sql . " where posts.idCategoria = 4 ";
$sql = $sql . " ORDER BY idPost DESC LIMIT 4 ";
//$sql = "SELECT * FROM posts ORDER BY idPost DESC LIMIT 5 ";
//echo $sql;
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