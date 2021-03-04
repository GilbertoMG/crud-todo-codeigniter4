<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
	 
	protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
		
	public function __construct()
    {
        parent::__construct();          
		
    }

    public function combobox(string $colunas): array
    {
        $array = [0=>'(Selecione)'];
        $query = $this->select($colunas)->get()->getResult();
        foreach ($query as $item) {
            $array[$item->id] = $item->nome;
        }
        return $array;
    }	
	
	protected function hashPassword(array $data)
    {
		
    if (strlen($data['data']['senha']) < 5 ){
		unset($data['data']['senha']);
		return $data;
	}
	
	$data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);
    //$this->encripta($data['data']['senha']);
    return $data;	
	}
	
   public function ajustaDatas($array)
   {
	   $data1 = $this->formataDataBrToDB($array['data_inicio']);
	   $data2 = $this->formataDataBrToDB($array['data_fim']);
	   
	   $array['data_fim'] = $data2;
	   $array['data_inicio'] = $data1;
	  
	   if($data1 > $data2){
			
			$array['data_fim'] = $data1;
			$array['data_inicio'] = $data2;
	   } 
	   
	   return $array;
   }
	
	protected function formataDataBrToDB($data)
    { // dd/mm/yyyy ja validado
    $date = \DateTime::createFromFormat('d/m/Y',$data);
    return $date->format('Y-m-d');
	}

}
