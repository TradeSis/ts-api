<?php
//Lucas 06042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$menu = array();

$nivelMenu = 0;

if (isset($jsonEntrada["idUsuario"])) {
  
  $sqlusu = "SELECT usuarioaplicativo.* FROM usuarioaplicativo ";
  $sqlusu = $sqlusu . "where idUsuario = " .$jsonEntrada["idUsuario"];
  $buscarUsu = mysqli_query($conexao, $sqlusu);
  $row = mysqli_fetch_array($buscarUsu, MYSQLI_ASSOC);
  $nivelMenu = $row["nivelMenu"];
} 

$sql = "SELECT menu.*, aplicativo.nomeAplicativo FROM menu
        LEFT JOIN aplicativo on  menu.idAplicativo = aplicativo.idAplicativo";
$where = " where ";
if (isset($jsonEntrada["nomeAplicativo"])) {
  $sql = $sql . $where . " aplicativo.nomeAplicativo = '" . $jsonEntrada["nomeAplicativo"] . "'";
  $where = " and ";
} 
  if (isset($jsonEntrada["idUsuario"])) {
    $sql = $sql . $where . " menu.nivelMenu <= " . $nivelMenu;
  }

//echo "-SQL->".json_encode($sql)."\n";

$rows = 0;
$buscar = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  
  /* Novo SQL para ler o FILHO */
  $sql2 = "SELECT menuprograma.* FROM menuprograma ";
  $sql2 = $sql2 . " where menuprograma.IDMenu = " .$row["IDMenu"];
  if (isset($jsonEntrada["idUsuario"])) {
    $sql2 = $sql2 . " and menuprograma.nivelMenu <= " . $nivelMenu;
  }
  $buscar2 = mysqli_query($conexao, $sql2);

//echo "-SQL->".json_encode($sql2)."\n";

  $menuPrograma = array();
  while ($rowsProgramas = mysqli_fetch_array($buscar2, MYSQLI_ASSOC)) {
    array_push($menuPrograma, $rowsProgramas);
  }

  $rowsProgramas = array();

  $linha = array(
    "IDMenu" => $row["IDMenu"],
    "nomeMenu" => $row["nomeMenu"],
    "idAplicativo" => $row[ "idAplicativo"],
    "nivelMenu"=> $row[ "nivelMenu"],
    "menuPrograma" => $menuPrograma
 
  );
  /* FIM de ler o filho */

  array_push($menu, $linha); /* Troquei de $row para variavel manipulada $linha */
  $rows = $rows + 1;
}


$jsonSaida = $menu;
//echo "-SAIDA->".json_encode($menu)."\n";


?>