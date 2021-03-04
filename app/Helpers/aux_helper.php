<?php
// quanto um número é em percentual referente a outro. 20 é quantos porcento de 30?
function n_x_porcento_de($valor, $total) 
{
    $percent = $valor / $total;
    return  number_format( $percent * 100, 2 );
}
// Quanto é x% de um número Ex 30% de 250
function x_porcento_de_n ( $porcentagem, $total ) {
	return ( $porcentagem / 100 ) * $total;
}

function brl($str)
{
	
	if(isset($str) && floatval ($str) >= 0.00 ) {
		$str = floatval ($str);
		return number_format($str, 2, ',', '.');
	}
	return '';
}

/**
     * Devolde data de BD para real (BRL)
     *
     * @param	string
     * @return	$str
	 */
	function dataDBtoBRL($str)
	{

        if (strlen($str) >= 8 && trim($str) !=  "0000-00-00") {

		    $dataArray = explode("-", $str);

			    return $dataArray[2] .'/'.$dataArray[1].'/'.$dataArray[0]  ; // 2016-01-30


		}

        return ""; // vazio

	 }

	 function dataTempoDBtoBRL($data)
   {

        return ($data != null) ? date('d/m/Y H:i:s', strtotime($data)) : ''; 
  
   }