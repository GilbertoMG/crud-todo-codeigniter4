<?php
namespace Modules\Todo\Cadastros\Tipos\Models;

use App\Models\BaseModel;

class TiposModel extends BaseModel
{

    protected $table = 'tarefas_tipos';

    protected $primaryKey = 'id';

    protected $returnType = 'object';

    protected $useSoftDeletes = true;

    protected $allowedFields = [];

    protected $skipValidation = false;
}
