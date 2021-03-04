<?= $this->extend('admin_layout'); ?>

<?= $this->section('titulo'); ?>

<?= $this->section('conteudo'); ?>


<?php if(count($results) == 0):?>
  
  <p>Não existem tarefas</p>

<?php else:?>

    <?= $pager->links('default') ?>
	
    
  <table class="table table-striped table-sm table-bordered">
  <thead class="thead-dark">
  <tr>
        <th>id</th>
        <th>Nome</th>
		<th class="text-center">Tipo</th>
		<th class="text-center">Prioridade</th>
		<th class="text-center">Status</th>
		
  </tr>
  </thead>
  <tbody class="bg-light">
  <?php
      foreach($results as $row):
          $pri = prioridade($row->prioridade);
          $status = status($row->status);
  ?>
    <tr>
      <td><?= $row->id;?></td>
      <td><?= $row->nome;?></td>
	  <td class="text-center"><?= $row->tipo_tarefa;?></td>
	  <td class="text-center"> <span class="badge badge-<?= $pri[0];?>"><?= $pri[1];?></span> </td>
	  <td class="text-center"><span class="badge badge-<?= $status[0];?>"><?= $status[1];?></span></td>  
      
    </tr>    
  <?php endforeach;?>
  </tbody>
</table>
Páginas: <?= $pager->getPageCount();?> Atual <?= $pager->getCurrentPage();?> 
 / Total de registros <?= $pager->getTotal();?>

<?php endif;?>




<?= $this->endSection(); ?>