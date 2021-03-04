<?php
namespace Modules\Todo\Cadastros\Tarefas\Controllers;

use App\Controllers\BaseController;

class Tarefas extends BaseController
{
	protected $helpers = ['form', 'aux', 'aux_html'];
    private $tarefasModel;
	
	public function __construct()
    {
		$this->data['validation'] = \Config\Services::validation();
		$this->tarefasModel = model('Modules\Todo\Cadastros\Tarefas\Models\TarefasModel', false);
        $this->data['tipos'] = $this->tipos();		
    }
	
	public function index($id=null){
		
		return view('Modules\Todo\Cadastros\Tarefas\Views\index',$this->data);
	}
	
	public function salvar() // save e update
	{		
		$id = $this->setInt($this->request->getPost('id'));
		
		//if ($this->request->getMethod() == 'post' && $this->validate($this->data['validation']->getRuleGroup('tarefas'))) {
		if ($this->request->getMethod() == 'post' && $this->data['validation']->run($this->request->getPost(), 'tarefas')) {		    
			
			$this->data['msg'] = $this->tarefasModel->save($this->request->getPost()) ? lang('Mensagens.sucesso') : lang('Mensagens.erro'); 			
			
			$this->setMessage($this->data['msg']); 
			
			return redirect()->to(base_url('todo/tarefas/'.($id > 0 ? 'editar/'.$id : 'adicionar' )));			
		}
				
		return view('Modules\Todo\Cadastros\Tarefas\Views\index',$this->data);
		
	}
	
	public function editar($id){		
		$this->data['results'] = $this->tarefasModel->find($this->setInt($id));
		return view('Modules\Todo\Cadastros\Tarefas\Views\index',$this->data);
	}
	
	public function status($status,$id){
		$id = $this->setInt($id);
		$this->tarefasModel->update($id,['status'=>$status]);
		return redirect()->to(base_url('todo/tarefas/listar'));		
	}
	
	public function listar(){
		
		$this->data['results'] = $this->tarefasModel->orderBy('id','desc')->paginate(15);
		$this->data['pager']= $this->tarefasModel->pager;
       		
		return view('Modules\Todo\Cadastros\Tarefas\Views\listar',$this->data);
	}
	
	private function tipos()
	{
		$tiposModel = model('Modules\Todo\Cadastros\Tipos\Models\TiposModel', false);
		return $tiposModel->combobox('id,nome'); 		
		
	}
	
}
