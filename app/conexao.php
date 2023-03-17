<?php

    include_once('database/mysql.php');
    include_once('database/progress.php');
    function defineCaminhoLog() {
        $pasta = '"/ws/tslog/';
        return $pasta;
    } 
    function defineConexaoProgress()
    {
        $progresscfg = "progress.cfg";
        $dlc = "/home/tsplaces/dlc";
        $tmp = "/home/tsplaces/progress/";
        $pf = "/home/tsplaces/progress/tsrelat/tsrelat.pf";
        $propath = "/home/tsplaces/tsplaces/dev/app/,";
        $proginicial = "/u/bsweb/progr/ts/api/app/database/progress.p";
    
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
        $base = '';
        $usuario = '';
        $senhabd = '';
    
        return        array(   "host" => $host, 
                               "base" => $base,
                            "usuario" => $usuario, 
                            "senhadb" => $senhabd
                                );
    
    }
    
    
?>
