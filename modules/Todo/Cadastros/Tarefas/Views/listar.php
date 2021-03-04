<?= $this->extend('admin_layout'); ?>

<?= $this->section('titulo'); ?>

<?= $this->section('conteudo'); ?>


<?php if(count($results) == 0):?>

<p>Não existem clientes</p>

<?php else:?>

    <?= $pager->links() ?>

<div class="table-responsive">
	<table class="table table-striped table-sm table-bordered">
		<thead class="thead-dark">
			<tr>
				<th>id</th>
				<th>Nome</th>
				<th class="text-center">Tipo</th>
				<th class="text-center">Prioridade</th>
				<th class="text-center">Status</th>
				<th class="text-center">###</th>
			</tr>
		</thead>
		<tbody class="bg-light">
  <?php
    foreach ($results as $row) :
        $pri = prioridade($row->prioridade);
        $status = status($row->status);
        ?>
    <tr>
				<td><?= $row->id;?></td>
				<td><?= $row->nome;?></td>
				<td class="text-center"><?= $row->tarefas_tipos_id;?></td>
				<td class="text-center"><span class="badge badge-<?= $pri[0];?>"><?= $pri[1];?></span>
				</td>
				<td class="text-center"><span class="badge badge-<?= $status[0];?>"><?= $status[1];?></span></td>
				<td class="text-center">
					<div class="dropdown">
						<button class="btn btn-primary dropdown-toggle btn-sm"
							type="button" data-toggle="dropdown">
							Ações <span class="caret"></span>
						</button>
						<ul class="dropdown-menu p-2">
							<li><a href="<?= base_url('todo/tarefas/editar/' . $row->id)?>">Editar</a></li>

							<li class="divider"></li>
							<li class="dropdown-header">Alterar Status</li>
							<li><a href="<?= base_url('todo/tarefas/status/2/' . $row->id)?>">Processando</a></li>
							<li><a href="<?= base_url('todo/tarefas/status/3/' . $row->id)?>">Cancelada</a></li>
							<li><a href="<?= base_url('todo/tarefas/status/4/' . $row->id)?>">Finalizada</a></li>
							<li><a href="<?= base_url('todo/tarefas/status/1/' . $row->id)?>">Reabrir</a></li>
						</ul>
					</div>
				</td>
			</tr>    
  <?php endforeach;?>
  </tbody>
	</table>
</div>
<?= $pager->links() ?>
Páginas: <?= $pager->getPageCount();?> Atual <?= $pager->getCurrentPage();?> 
 / Total de registros <?= $pager->getTotal();?>

<?php endif;?>




<?= $this->endSection(); ?>