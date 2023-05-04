<?php
// Lucas 05042023 - adicionado aplicativo, menu, menuPrograma e montaMenu
// gabriel 200323 11:04 - demanda/retornar
// Lucas 03032023 - usuario alterar
// Helio 16022023 - contrato/totais
// Lucas 06022023 - adicionado contratoStatus (GET)
// helio 31012023 - melhorar testes de metodos, incluido clientes_inserir (POST)
// helio 26012023 18:10

//echo "metodo=".$metodo."\n";
//echo "funcao=".$funcao."\n";
//echo "parametro=".$parametro."\n";

if ($metodo == "GET") {

  if ($funcao=="contrato"&&$parametro=="totais") {
    $funcao = "contrato/totais";
    $parametro = null;
  }

  if ($funcao=="usuario"&&$parametro=="verifica") {
    $funcao = "usuario/verifica";
    $parametro = null;
  }

  switch ($funcao) {

    case "clientes":
      include 'clientes.php';
    break;
    
    case "contratostatus":
        include 'contratostatus.php';
    break;
 

    case "tipostatus":
      include 'tipostatus.php';
      break;
    
    case "tipoocorrencia":
      include 'tipoocorrencia.php';
    break;
    
    case "contrato":
      
        include 'contrato.php';
      break;      
    case "demanda":
      include 'demanda.php';
      break;
    case "usuario":
      include 'usuario.php';
      break;
    case "tarefas":
      include 'tarefas.php';
      break;
    case "comentario":
      include 'comentario.php';
      break;
    case "horas":
      include 'horas.php';
      break;
    case "atendente":
      include 'atendente.php';
      break;
      case "contrato/totais":
        include 'contrato_totais.php';
        break;
      
      case "usuario/verifica":
        include 'usuario_verifica.php';
      break;

    case "aplicativo":
        include 'aplicativo.php';
      break;
     
    case "menu":
        include 'menu.php';
      break;

      case "menuprograma":
        include 'menuprograma.php';
      break;

      case "montaMenu":
        include 'montaMenu.php';
      break;

      case "usuarioaplicativo":
        include 'usuarioaplicativo.php';
      break;

    default:
      $jsonSaida = json_decode(json_encode(
        array(
          "status" => "400",
          "retorno" => "Aplicacao " . $aplicacao . " Versao " . $versao . " Funcao " . $funcao . " Invalida" . " Metodo " . $metodo . " Invalido "
        )
      ), TRUE);
      break;
  }
}

if ($metodo == "PUT") {
  switch ($funcao) {
    case "clientes":
      include 'clientes_inserir.php';
      break;

   case "contratostatus":
      include 'contratostatus_inserir.php';
    break;  

    case "tipostatus":
      include 'tipostatus_inserir.php';
      break;
    case "tipoocorrencia":
      include 'tipoocorrencia_inserir.php';
      break;
    case "demanda":
      include 'demanda_inserir.php';
      break;
    case "usuario":
      include 'usuario_inserir.php';
      break;
    case "tarefas":
      include 'tarefas_inserir.php';
      break;
    case "comentario":
      include 'comentario_inserir.php';
      break;

    case "contrato":
        include 'contrato_inserir.php';
    break;  

    case "aplicativo":
      include 'aplicativo_inserir.php';
    break;

    case "menu":
      include 'menu_inserir.php';
    break;

    case "menuprograma":
      include 'menuprograma_inserir.php';
    break;

    case "usuarioaplicativo":
      include 'usuarioaplicativo_inserir.php';
    break;

    default:
      $jsonSaida = json_decode(json_encode(
        array(
          "status" => "400",
          "retorno" => "Aplicacao " . $aplicacao . " Versao " . $versao . " Funcao " . $funcao . " Invalida" . " Metodo " . $metodo . " Invalido "
        )
      ), TRUE);
      break;
  }
}

if ($metodo == "POST") {

  if ($funcao=="contrato"&&$parametro=="finalizar") {
    $funcao = "contrato/finalizar";
    $parametro = null;
  }

  if ($funcao=="demanda"&&$parametro=="encerrar") {
    $funcao = "demanda/encerrar";
    $parametro = null;
  }

  if ($funcao=="demanda"&&$parametro=="retornar") {
    $funcao = "demanda/retornar";
    $parametro = null;
  }



  switch ($funcao) {
    case "clientes":
      include 'clientes_alterar.php';
    break;

    case "contratostatus":
        include 'contratostatus_alterar.php';
    break;

    case "tipostatus":
      include 'tipostatus_alterar.php';
      break;
    case "tipoocorrencia":
      include 'tipoocorrencia_alterar.php';
      break;
    case "demanda":
        include 'demanda_alterar.php';
    break;
      case "demanda/encerrar":
        include 'demanda_encerrar.php';
        break;
    //break;
      case "demanda/retornar":
        include 'demanda_retornar.php';
        break;
  
    case "contrato":
        include 'contrato_alterar.php';
    break;
    
    case "contrato/finalizar":
      include 'contrato_finalizar.php';
    break;

    case "usuario":
      include 'usuario_alterar.php';
    break;

    case "aplicativo":
      include 'aplicativo_alterar.php';
    break;

    case "menu":
      include 'menu_alterar.php';
    break;

    case "menuprograma":
      include 'menuprograma_alterar.php';
    break;

    case "usuarioaplicativo":
      include 'usuarioaplicativo_alterar.php';
    break;

    default:
      $jsonSaida = json_decode(json_encode(
        array(
          "status" => "400",
          "retorno" => "Aplicacao " . $aplicacao . " Versao " . $versao . " Funcao " . $funcao . " Invalida" . " Metodo " . $metodo . " Invalido "
        )
      ), TRUE);
      break;
  }
}

if ($metodo == "DELETE") {
  switch ($funcao) {
    case "clientes":
      include 'clientes_excluir.php';
      break;

    case "contratostatus":
        include 'contratostatus_excluir.php';
    break;

    case "tipostatus":
      include 'tipostatus_excluir.php';
      break;
    case "tipoocorrencia":
      include 'tipoocorrencia_excluir.php';
      break;

    case "contrato":
      include 'contrato_excluir.php';
    break;

    case "menu":
      include 'menu_excluir.php';
    break;

    case "aplicativo":
      include 'aplicativo_excluir.php';
    break;

    case "menuprograma":
      include 'menuprograma_excluir.php';
    break;

    case "usuarioaplicativo":
      include 'usuarioaplicativo_excluir.php';
    break;
      
    default:
      $jsonSaida = json_decode(json_encode(
        array(
          "status" => "400",
          "retorno" => "Aplicacao " . $aplicacao . " Versao " . $versao . " Funcao " . $funcao . " Invalida" . " Metodo " . $metodo . " Invalido "
        )
      ), TRUE);
      break;
  }
}