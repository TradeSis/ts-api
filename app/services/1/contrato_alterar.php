<?php
// Lucas 20022023 alterado if para resultar no $valorHora e adicionado o else para $valorContrato;
// Lucas 28022023 - condição para verificar a variavel valorContrato
// Lucas 07022023 criacao
//echo "-ENTRADA->".json_encode($jsonEntrada)."\n";


$conexao = conectaMysql();
if (isset($jsonEntrada['tituloContrato'])) {
        $idContrato = $jsonEntrada['idContrato'];
        $tituloContrato = $jsonEntrada['tituloContrato'];
        $descricao = $jsonEntrada['descricao'];
        $idContratoStatus = $jsonEntrada['idContratoStatus'];
		$dataPrevisao = $jsonEntrada['dataPrevisao'];
		$dataEntrega = $jsonEntrada['dataEntrega'];	
        $horas = $jsonEntrada['horas'];
        $valorHora = $jsonEntrada['valorHora'];
		

        $valorContrato = $jsonEntrada['valorContrato'];
     
        
        if (($horas !== "") && ($valorContrato !== "")) {
			$valorHora = $valorContrato / $horas;
		} else{
            if (($horas !== "") && ($valorHora !== "")) {
                $valorContrato= $horas * $valorHora;
            }
        }
        if ($dataPrevisao == '') { $dataPrevisao = null;}
        if ($dataEntrega == '') { $dataEntrega = null;}

	//busca dados tipostatus    
       $sql2 = "SELECT * FROM contratostatus WHERE idContratoStatus = $idContratoStatus";
       $buscar2 = mysqli_query($conexao, $sql2);
       $row = mysqli_fetch_array($buscar2, MYSQLI_ASSOC);
       $statusContrato = $row["mudaStatusPara"];

    $sql = "UPDATE `contrato` SET `tituloContrato`='$tituloContrato',`descricao`='$descricao',`idContratoStatus`='$idContratoStatus' ,`valorContrato`='$valorContrato',`dataPrevisao`=$dataPrevisao,`dataEntrega`=$dataEntrega,`statusContrato`='$statusContrato',`horas`='$horas',`valorHora`='$valorHora',dataAtualizacao=CURRENT_TIMESTAMP() WHERE contrato.idContrato = $idContrato ";
    //echo "-SQL->".json_encode($sql)."\n";
    if ($atualizar = mysqli_query($conexao, $sql)) {
        $jsonSaida = array(
            "status" => 200,
            "retorno" => "ok"
        );
    } else {
        $jsonSaida = array(
            "status" => 500,
            "retorno" => "erro no mysql"
        );
    }
    
} else {
    $jsonSaida = array(
        "status" => 400,
        "retorno" => "Faltaram parametros"
    );

}

?>