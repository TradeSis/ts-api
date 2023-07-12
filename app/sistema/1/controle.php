<?php

//echo "metodo=".$metodo."\n";
//echo "funcao=".$funcao."\n";
//echo "parametro=".$parametro."\n";

if ($metodo == "GET") {

  switch ($funcao) {

    case "perfil":
      include 'perfil.php';
      break;

    case "paginas_slug":
      include 'paginas_slug.php';
      break;

    case "paginas":
      include 'paginas.php';
      break;

    case "secoes":
      include 'secoes.php';
      break;

    case "secoesPagina":
      include 'secoesPagina.php';
      break;

    case "marcas":
      include 'marcas.php';
      break;

    case "posts_slug":
      include 'posts_slug.php';
      break;

    case "posts":
      include 'posts.php';
      break;

    case "secoesPagina_individual":
      include 'secoesPagina_individual.php';
      break;

    case "servicos_card":
      include 'servicos_card.php';
      break;

    case "servicos":
      include 'servicos.php';
      break;

    case "posts_recentes":
      include 'posts_recentes.php';
      break;

    case "banners":
      include 'banners.php';
      break;

    case "secoes_tipoSecao":
      include 'secoes_tipoSecao.php';
      break;

    case "servicos_slug":
      include 'servicos_slug.php';
      break;

    case "temas":
      include 'temas.php';
      break;

    case "fisatividade":
      include 'fisatividade.php';
      break;

    case "fisprocesso":
      include 'fisprocesso.php';
      break;

    case "fisnatureza":
      include 'fisnatureza.php';
      break;

    case "fisoperacao":
      include 'fisoperacao.php';
      break;

    case "ncm":
      include 'ncm.php';
      break;

    case "cest":
      include 'cest.php';
      break;

    case "autor":
      include 'autor.php';
      break;

    case "categorias":
      include 'categorias.php';
      break;

    case "produtos":
      include 'produtos.php';
      break;

    case "noticias":
      include 'noticias.php';
      break;

    case "receitas":
      include 'receitas.php';
      break;

    case "eventos":
      include 'eventos.php';
      break;

    case "posts_sobreChocolate":
      include 'posts_sobreChocolate.php';
      break;

    case "posts_curiosidades";
      include 'posts_curiosidades.php';
      break;

    case "eventos_proximos";
      include 'eventos_proximos.php';
      break;

    case "eventos_visitacao";
      include 'eventos_visitacao.php';
      break;

    case "eventos_cursos";
      include 'eventos_cursos.php';
      break;

    case "eventos_podcasts";
      include 'eventos_podcasts.php';
      break;

    case "autor_card";
      include 'autor_card.php';
      break;

    case "produtos_card";
      include 'produtos_card.php';
      break;

    case "marcas_especializadas";
      include 'marcas_especializadas.php';
      break;

    case "marcas_parceiras";
      include 'marcas_parceiras.php';
      break;

    case "marcas_slug";
      include 'marcas_slug.php';
      break;

    case "receitas_slug";
      include 'receitas_slug.php';
      break;

      case "produtos_listaSemCatalogo";
        include 'produtos_listaSemCatalogo.php';
      break;

      case "eventos_slug";
      include 'eventos_slug.php';
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

    case "paginas":
      include 'paginas_inserir.php';
      break;

    case "secoes":
      include 'secoes_inserir.php';
      break;

    case "secoesPagina":
      include 'secoesPagina_inserir.php';
      break;

    case "marcas":
      include 'marcas_inserir.php';
      break;

    case "posts":
      include 'posts_inserir.php';
      break;

    case "banners":
      include 'banners_inserir.php';
      break;


    case "temas":
      include 'temas_inserir.php';
      break;

    case "fisatividade":
      include 'fisatividade_inserir.php';
      break;

    case "fisprocesso":
      include 'fisprocesso_inserir.php';
      break;

    case "fisnatureza":
      include 'fisnatureza_inserir.php';
      break;

    case "fisoperacao":
      include 'fisoperacao_inserir.php';
      break;

    case "autor":
      include 'autor_inserir.php';
      break;

    case "categorias":
      include 'categorias_inserir.php';
      break;

    case "produtos":
      include 'produtos_inserir.php';
      break;

    case "noticias":
      include 'noticias_inserir.php';
      break;

    case "receitas":
      include 'receitas_inserir.php';
      break;

    case "eventos":
      include 'eventos_inserir.php';
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

  switch ($funcao) {

    case "perfil":
      include 'perfil_alterar.php';
      break;

    case "paginas":
      include 'paginas_alterar.php';
      break;

    case "secoes":
      include 'secoes_alterar.php';
      break;

    case "secoesPagina":
      include 'secoesPagina_alterar.php';
      break;


    case "temas":
      include 'temas_alterar.php';
      break;

    case "fisatividade":
      include 'fisatividade_alterar.php';
      break;

    case "fisprocesso":
      include 'fisprocesso_alterar.php';
      break;

    case "fisnatureza":
      include 'fisnatureza_alterar.php';
      break;

    case "fisoperacao":
      include 'fisoperacao_alterar.php';
      break;

    case "autor":
      include 'autor_alterar.php';
      break;

    case "marcas":
      include 'marcas_alterar.php';
      break;

    case "categorias":
      include 'categorias_alterar.php';
      break;

    case "produtos":
      include 'produtos_alterar.php';
      break;

    case "noticias":
      include 'noticias_alterar.php';
      break;

    case "receitas":
      include 'receitas_alterar.php';
      break;

    case "eventos":
      include 'eventos_alterar.php';
      break;

    case "posts":
      include 'posts_alterar.php';
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

    case "paginas":
      include 'paginas_excluir.php';
      break;

    case "secoes":
      include 'secoes_excluir.php';
      break;

    case "secoesPagina":
      include 'secoesPagina_excluir.php';
      break;

    case "marcas":
      include 'marcas_excluir.php';
      break;

    case "posts":
      include 'posts_excluir.php';
      break;

    case "banners":
      include 'banners_excluir.php';
      break;


    case "temas":
      include 'temas_excluir.php';
      break;

    case "fisatividade":
      include 'fisatividade_excluir.php';
      break;

    case "fisprocesso":
      include 'fisprocesso_excluir.php';
      break;

    case "fisnatureza":
      include 'fisnatureza_excluir.php';
      break;

    case "fisoperacao":
      include 'fisoperacao_excluir.php';
      break;

    case "autor":
      include 'autor_excluir.php';
      break;

    case "categorias":
      include 'categorias_excluir.php';
      break;

    case "produtos":
      include 'produtos_excluir.php';
      break;

    case "noticias":
      include 'noticias_excluir.php';
      break;

    case "receitas":
      include 'receitas_excluir.php';
      break;

    case "eventos":
      include 'eventos_excluir.php';
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
