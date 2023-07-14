<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

//ajustar a api para pegar a categoria por parametro;
$conexao = conectaMysql();
$posts = array();

$sql = "SELECT posts.*, autor.*, categoria.* FROM posts 
        LEFT JOIN autor on autor.idAutor = posts.idAutor
        LEFT JOIN categoria on categoria.idCategoria = posts.idCategoria ";
if (isset($jsonEntrada["idPost"])) {
    $sql = $sql . " where posts.idPost = " . $jsonEntrada["idPost"];
}
$where = " where ";
if (isset($jsonEntrada["idCategoria"]) && isset($jsonEntrada["qtdPosts"])) {
    $sql = $sql . $where . " posts.idCategoria = " . $jsonEntrada["idCategoria"];
    $sql = $sql . " ORDER BY idPost DESC LIMIT " . $jsonEntrada["qtdPosts"];
    $where = " and ";
  }elseif(isset($jsonEntrada["qtdPosts"])) {
    $sql = $sql . " ORDER BY idPost DESC LIMIT " . $jsonEntrada["qtdPosts"];
    $where = " and ";
  } else {
    $sql = $sql . $where . " posts.idCategoria = " . $jsonEntrada["idCategoria"] . " ORDER BY idPost DESC  ";
  }
  
//echo $sql;
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
    array_push($posts, $row);
    $rows = $rows + 1;
}

if (isset($jsonEntrada["idPost"]) && $rows == 1) {
    $posts = $posts[0];
}
$jsonSaida = $posts;

//echo "-SAIDA->".json_encode(jsonSaida)."\n";
