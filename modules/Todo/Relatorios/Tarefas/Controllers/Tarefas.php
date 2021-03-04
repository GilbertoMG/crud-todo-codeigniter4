<?php
namespace Modules\Todo\Relatorios\Tarefas\Controllers;

// use App\Controllers\Base;
use App\Controllers\BaseController;

class Tarefas extends BaseController
{

    protected $helpers = [
        'form',
        'aux',
        'aux_html'
    ];

    private $tarefasModel;

    public function __construct()
    {
        $this->tarefasModel = model('Modules\Todo\Cadastros\Tarefas\Models\TarefasModel', false);
    }

    public function index()
    {
        $this->tarefasModel->config();
        $this->data['results'] = $this->tarefasModel->paginate(15);
        $this->data['pager'] = $this->tarefasModel->pager;

        return view('Modules\Todo\Relatorios\Tarefas\Views\index', $this->data);
    }
}
