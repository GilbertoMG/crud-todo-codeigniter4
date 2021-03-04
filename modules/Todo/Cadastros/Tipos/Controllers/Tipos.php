<?php
namespace Modules\Todo\Cadastros\Tipos\Controllers;

use App\Controllers\BaseController;

class Tipos extends BaseController
{

    protected $helpers = [
        'form',
        'aux',
        'aux_html'
    ];

    private $tarefasModel;

    public function __construct()
    {
        $this->data['validation'] = \Config\Services::validation();
        $this->tarefasModel = model('Modules\Todo\Cadastros\Tipos\Models\TarefasModel', false);
    }

    public function index()
    {
        return view('Modules\Todo\Cadastros\Tipos\Views\index', $this->data);
    }

    public function editar($id)
    {
        $this->data['results'] = $this->tarefasModel->find($this->setInt($id));
        return view('Modules\Todo\Cadastros\Tipos\Views\index', $this->data);
    }

    public function listar()
    {
        $this->data['results'] = $this->tarefasModel->paginate();
        return view('Modules\Todo\Cadastros\Tipos\Views\listar', $this->data);
    }
}
