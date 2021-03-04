<?= $this->extend('admin_layout'); ?>

<?= $this->section('titulo'); ?>

<?= $this->section('conteudo'); ?>

<h1>Nova Tarefa</h1>

<?= mensagem(session()->getFlashdata('msg')); ?>

<?= form_open(base_url('todo/tarefas/salvar'), '', ['id' => $results->id ?? 0]); ?>

<div class="row">

	<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
<?= form_label( trataLabel($validation->getError('nome'),'Nome') );?>
<?=form_input(['type' => 'text','name' => 'nome','id' => 'nome','placeholder' => 'Nome','value' => $results->nome ?? set_value('nome'),'class' => 'form-control form-control-sm']);?>
</div>

	<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
<?= form_label( trataLabel($validation->getError('tarefas_tipos_id'),'Tipo') );?>
<?= form_dropdown('tarefas_tipos_id', $tipos, $results->tarefas_tipos_id ??  set_value('tarefas_tipos_id'),['id'=>'tarefas_tipos_id','class'=>'form-control form-control-sm']);?>
</div>


	<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">
<?= form_label( trataLabel($validation->getError('prioridade'),'Prioridade') );?>
<?=form_dropdown('prioridade', [0 => '(Selecione)',1 => 'Baixa',2 => 'Alta',3 => 'Urgente',4 => 'Crítica'], $results->prioridade ?? set_value('prioridade'), ['id' => 'prioridade','class' => 'form-control form-control-sm']);?>
</div>

	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-1">
<?= form_label( trataLabel($validation->getError('detalhes'),'*Detalhes da Tarefa') );?>
<?=form_textarea(['class' => 'form-control form-control-sm','name' => 'detalhes','placeholder' => 'Informe aqui detalhes da Tarefa','id' => 'detalhes', 'required'=>'required','rows' => 4,'value' => isset($results->detalhes) ? $results->detalhes : set_value('detalhes')]);?>
</div>

	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
<?= form_submit('btn_salvar','Salvar',['class'=>'btn btn-info mt-2 w-100']);?>
</div>


</div>
<!-- /row -->

<?= form_close()?>

<?= $this->endSection(); ?>