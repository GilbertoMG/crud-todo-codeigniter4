<?php
namespace Modules\Todo\Relatorios\Tarefas\Models;

use App\Models\BaseModel;

class TarefasModel extends BaseModel
{

    protected $table = 'tarefas';

    protected $primaryKey = 'id';

    protected $returnType = 'object';

    protected $useSoftDeletes = true;

    protected $allowedFields = [
        'nome',
        'tarefas_tipos_id',
        'detalhes',
        'nome',
        'prioridade',
        'status'
    ];

    protected $skipValidation = false;

    public function config()
    {
        $this->select('tarefas.*,tarefas_tipos.nome AS tipo_tarefa');
        $this->join('tarefas_tipos', 'tarefas_tipos_id = tarefas_tipos.id', 'left');
        $this->orderBy('tarefas.id', 'desc');
    }
}
