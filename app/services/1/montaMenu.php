<?php
//Gabriel 06052023 alterações montamenu
//Lucas 06042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";

$conexao = conectaMysql();

$nivelMenu = 0;
$sim = 1;


//************************ Busca Usuario ************************
if (isset($jsonEntrada["idUsuario"])) {
  $sqlusu = "SELECT usuarioaplicativo.*, aplicativo.nomeAplicativo FROM usuarioaplicativo
             LEFT JOIN aplicativo on  usuarioaplicativo.idAplicativo = aplicativo.idAplicativo ";
  $sqlusu = $sqlusu . "where idUsuario = " . $jsonEntrada["idUsuario"] . " and aplicativo.nomeAplicativo = '" . $jsonEntrada["nomeAplicativo"] . "'";
  $buscarUsu = mysqli_query($conexao, $sqlusu);
  $row = mysqli_fetch_array($buscarUsu, MYSQLI_ASSOC);
  if (isset($row["nivelMenu"])) {
    $nivelMenu = $row["nivelMenu"];
  }
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

$menu = array();
$menuAtalho = array();
$menuHeader = array();

while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {

  //************************ Monta MenuPrograma ************************
  $sql2 = "SELECT menuprograma.*, aplicativo.nomeAplicativo FROM menuprograma ";
  $sql2 .= "LEFT JOIN aplicativo on  menuprograma.idAplicativo = aplicativo.idAplicativo ";
  $sql2 .= "WHERE menuprograma.IDMenu = " . $row["IDMenu"];
  if (isset($jsonEntrada["nomeAplicativo"])) {
    $sql2 .= " AND aplicativo.nomeAplicativo = '" . $jsonEntrada["nomeAplicativo"] . "'";
  }
  if (isset($jsonEntrada["idUsuario"])) {
    $sql2 .= " AND menuprograma.nivelMenu <= " . $nivelMenu . " AND menuprograma.menuAtalho <> " . $sim;
  }
  $buscar2 = mysqli_query($conexao, $sql2);

  $menuPrograma = array();
  while ($rowsProgramas = mysqli_fetch_array($buscar2, MYSQLI_ASSOC)) {
    array_push($menuPrograma, $rowsProgramas);
  }

  $linhaMenu = array(
    "IDMenu" => $row["IDMenu"],
    "nomeMenu" => $row["nomeMenu"],
    "idAplicativo" => $row["idAplicativo"],
    "nivelMenu" => $row["nivelMenu"],
    "menuPrograma" => $menuPrograma
  );
  array_push($menu, $linhaMenu);
  $rows++;

  //echo "-SQL->".json_encode($sql2)."\n";
}

//************************ Monta menuAtalho ************************

$sql3 = "SELECT menuprograma.*, aplicativo.nomeAplicativo FROM menuprograma ";
$sql3 .= "LEFT JOIN aplicativo on  menuprograma.idAplicativo = aplicativo.idAplicativo ";
$sql3 .= "WHERE menuprograma.menuAtalho = " . $sim;
if (isset($jsonEntrada["nomeAplicativo"])) {
  $sql3 .= " AND aplicativo.nomeAplicativo = '" . $jsonEntrada["nomeAplicativo"] . "'";
}
if (isset($jsonEntrada["idUsuario"])) {
  $sql3 .= " AND menuprograma.nivelMenu <= " . $nivelMenu;
}
$buscar3 = mysqli_query($conexao, $sql3);

while ($rowsAtalhos = mysqli_fetch_array($buscar3, MYSQLI_ASSOC)) {
  $linhaAtalho = array(
    "idMenuPrograma" => $rowsAtalhos["idMenuPrograma"],
    "IDMenu" => $rowsAtalhos["IDMenu"],
    "progrNome" => $rowsAtalhos["progrNome"],
    "idAplicativo" => $rowsAtalhos["idAplicativo"],
    "progrLink" => $rowsAtalhos["progrLink"],
    "nivelMenu" => $rowsAtalhos["nivelMenu"],
    "menuAtalho" => $rowsAtalhos["menuAtalho"]
  );
  array_push($menuAtalho, $linhaAtalho);
  $rows++;
}


//************************ Monta menuHeader ************************

$sql4 = "SELECT menu.*, menuprograma.progrNome, menuprograma.progrLink, aplicativo.nomeAplicativo FROM menu
         LEFT JOIN aplicativo on  menu.idAplicativo = aplicativo.idAplicativo
         LEFT JOIN menuprograma on  menu.IDMenu = menuprograma.IDMenu";
$sql4 .= " WHERE menu.menuHeader = " . $sim;
if (isset($jsonEntrada["nomeAplicativo"])) {
  $sql4 .= " AND aplicativo.nomeAplicativo = '" . $jsonEntrada["nomeAplicativo"] . "'";
}
if (isset($jsonEntrada["idUsuario"])) {
  $sql4 .= " AND menu.nivelMenu <= " . $nivelMenu;
}
$buscar4 = mysqli_query($conexao, $sql4);


while ($rowHeader = mysqli_fetch_array($buscar4, MYSQLI_ASSOC)) {
  $headerPrograma = array();
  while ($appHeader = mysqli_fetch_array($buscar4, MYSQLI_ASSOC)) {
  array_push($headerPrograma, $appHeader);
  }

  $linhaHeader = array(
    "IDMenu" => $rowHeader["IDMenu"],
    "nomeMenu" => $rowHeader["nomeMenu"],
    "idAplicativo" => $rowHeader["idAplicativo"],
    "nivelMenu" => $rowHeader["nivelMenu"],
    "menuHeader" => $rowHeader["menuHeader"],
    "headerPrograma" => $headerPrograma
  );
  array_push($menuHeader, $linhaHeader);
  $rows++;

  //echo "-SQL->".json_encode($sql4)."\n";
}

$jsonSaida = array(
  "menu" => $menu,
  "menuAtalho" => $menuAtalho,
  "menuHeader" => $menuHeader
);


?>