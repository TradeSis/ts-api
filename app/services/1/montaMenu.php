<?php
//Lucas 06042023 criado
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
$menu = array();

$sql = "SELECT menu.* FROM menu";
if (isset($jsonEntrada["idAplicativo"])) {
  $sql = $sql . " where menu.idAplicativo = " .$jsonEntrada["idAplicativo"];
}
//echo "-SQL->".json_encode($sql)."\n";
$rows = 0;
$buscar = mysqli_query($conexao, $sql);

while ($row = mysqli_fetch_array($buscar, MYSQLI_ASSOC)) {
  
  /* Novo SQL para ler o FILHO */
  $sql2 = "SELECT menuPrograma.* FROM menuPrograma ";
  $sql2 = $sql2 . " where menuPrograma.IDMenu = " .$row["IDMenu"];
  $buscar2 = mysqli_query($conexao, $sql2);
  
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