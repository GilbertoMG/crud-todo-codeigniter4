<?php

namespace Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{

    public function chkLogin($data)
    {
		
        $senha = $data['senha'];

        $query = $this->query("SELECT id, nome,email,grupo_id,senha,status FROM usuarios WHERE (login = " . $this->escape($data['login']) . ")");

        if (count($query->getResult()) === 1 && password_verify($senha, $query->getRow()->senha)) { // deve retornar apenas 1 resultado.
            unset($query->getRow()->senha);
            return $query->getRow();
        }

        return false;
    }

}
