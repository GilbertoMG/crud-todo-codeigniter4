<?php
/**
 * Trata do label para exibir o erro
 * @param string string
 * @return string
 */
function trataLabel($erro,$field)
{
    return (empty($erro) ? '' . $field . '' : '<small class="text-danger">'.$erro.'</small>'); 
}
/*
1 => 'Baixa',
	2 => 'Alta',
	3 => 'Urgente',
	4 => 'Crítica',
*/

function prioridade($tipo_id)
{
	$type = ['secondary',''];
		
		switch ($tipo_id) {
			case 1:
				$type = ['info','Baixa'];
				break;
			case 2:
				$type = ['danger','Alta'];
				break;
			case 3:
				$type = ['warning','Urgente'];
				break;
				case 4:
				$type = ['danger','Crítica'];
				break;
        }
		return $type;
}

function status($status)
{
	$st = ['secondary',''];
		
		switch ($status) {
			case 0:
				$st = ['info','iniciada'];
				break;
			case 1:
				$st = ['info','recuperada'];
				break;
			case 2:
				$st = ['warning','processando'];
				break;
			case 3:
				$st = ['danger','cancelada'];
				break;
				case 4:
				$st = ['success','finalizada'];
				break;
        }
		return $st;
}


function mensagem($array)
{

if($array != null && count($array) > 0) {
	$close_button = '<button type="button" class=" close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>  </button>';
    return '<div class="mt-2 alert alert-' . $array[0] . ' text-center" role="alert">' . $array[1] . ' ' . $close_button . '</div>';
}

}