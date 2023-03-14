<?php
// helio 26012023 18:10

include "conexao.php";

function defineConexaoProgress()
{
    $progresscfg = "progress.cfg";
    $dlc = "/home/tsplaces/dlc";
    $tmp = "/home/tsplaces/progress/";
    $pf = "/home/tsplaces/progress/tsrelat/tsrelat.pf";
    $propath = "/home/tsplaces/tsplaces/dev/app/,";
    $proginicial = "/home/tsplaces/tsplaces/dev/app/ts/progress.p";

    return        array(   "progresscfg" => $progresscfg, 
                           "dlc" => $dlc,
                           "pf" => $pf, 
                           "tmp" => $tmp,
                           "propath" => $propath,
                           "proginicial" => $proginicial
                            );
}


function defineConexaoMysql () {

    $host = 'localhost';
    $base = 'tsplaces_tsservices';
    $usuario = 'tsplaces_tsservices';
    $senhabd = '2Et*MNY1oJul';

    return        array(   "host" => $host, 
                           "base" => $base,
                        "usuario" => $usuario, 
                        "senhadb" => $senhabd
                            );

}


?>
