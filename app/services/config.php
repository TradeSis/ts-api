<?php
// helio 26012023 18:10
/* se for Progress
    $progresscfg="progress.cfg";
    $dlc                = "/usr/dlc";
    //$proexe         = "$dlc/bin/_progres";
    $tmp            = "/u/bsweb/works";
    $pf                = "/admcom/bases/wsp2k.pf";
    $propath        = "/u/bsweb/progr/app/,/admcom/progr/,";
    $proginicial        = "/u/bsweb/progr/ws/rest/chamaprogress.p";

    include ("../php/chamaprogress.php");
**/

include "app/conexao.php";
function defineConexaoMysql () {

    $host = 'localhost';
    $base = 'tsplaces_tsservices';
    $usuario = 'root';
    $senhabd = '';

    return        array(   "host" => $host, 
                           "base" => $base,
                        "usuario" => $usuario, 
                        "senhadb" => $senhabd
                            );

}
function defineConexaoApi () {
    //$apiIP = 'https://dev.tsplaces.com.br';
	$apiIP = 'http://localhost';
    return $apiIP;
} 


?>
