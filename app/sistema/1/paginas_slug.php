<?php
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$paginas = array();
/* helio 14062023 - retirada 
$sql = "SELECT paginas.*, temas.* FROM paginas  
INNER JOIN temas on temas.idTema = paginas.idTema ";
$sql = $sql . " where paginas.slug = " . "'". $jsonEntrada["slug"] . "'";
$sql = $sql . " and temas.ativo = 1";
*/

// helio 14062023 - leitura de pagina e tema, mesmo quando pagina é para todos os temas
// primeiro pega o tema ativo
$sql = "SELECT * FROM temas where temas.ativo = 1;";
$buscar = mysqli_query($conexao, $sql);
$tema = mysqli_fetch_array($buscar, MYSQLI_ASSOC);

// depois verifica se tem este slug no tema ativo
$sql = "SELECT * FROM paginas where paginas.slug = " . "'". $jsonEntrada["slug"] . "'";
$sql = $sql . " and paginas.idTema = " .  $tema["idTema"]  . ";";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  array_push($paginas, $row);
  $rows = $rows + 1;
}

if ($row==0) { // se nao tiver a pagina no tema ativo, pega a pagina no tema 0

  $sql = "SELECT * FROM paginas where paginas.slug = " . "'". $jsonEntrada["slug"] . "'";
  $sql = $sql . " and paginas.idTema = 0;";
  
  
  $rows = 0;
  $buscar = mysqli_query($conexao, $sql);
  while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
    array_push($paginas, $row);
    $rows = $rows + 1;
  }
  
}
$paginas = $paginas[0];

// Monta a saida como estava anteriormente
$pagina = [
        "idPagina" => $paginas["idPagina"],
        "idTema" => $paginas["idTema"],
        "slug" => $paginas["slug"],
        "tituloPagina" => $paginas["tituloPagina"],
        "arquivoFonte" => $paginas["arquivoFonte"],
        "arquivoSingle" => $paginas["arquivoSingle"],
        "nomeTema" => $tema["nomeTema"],
        "css" => $tema["css"],
        "ativo" => $tema["ativo"]
];

$jsonSaida = $pagina;

//echo "-SAIDA->".json_encode($jsonSaida)."\n";



?>