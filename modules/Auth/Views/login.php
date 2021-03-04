<?= $this->extend('default_layout'); ?>

<?= $this->section('titulo'); ?>

Autenticação de Usuário

<?= $this->endSection(); ?>

<?= $this->section('conteudo'); ?>


<!-- Outer Row -->
<div class="row justify-content-center">

	<div class="col-xl-10 col-lg-12 col-md-9">

		<div class="card o-hidden border-0 shadow-lg my-5 ">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
					<div class="col-lg-6">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">
										<?php if (!empty($msg[1])): ?>
    <div class="alert alert-<?= $msg[0]; ?> text-center"><?= $msg[1]; ?>
	<?php else:?>
	Welcome Back!</div>
<?php endif; ?>
										</h1>
							</div>
                                    <?= form_open('auth/login'); ?>
                                        <div class="form-group p-2">
                <?= form_label(trataLabel($validation->getError('login'), 'Login')); ?>                            
                <?=form_input(['class' => 'form-control form-control-sm required','placeholder' => 'Login','type' => 'text','name' => 'login','required' => 'required','id' => 'login','value' => $results->login ?? set_value('login')]);?>
                                        </div>
							<div class="form-group p-2">
                                            <?= form_label(trataLabel($validation->getError('senha'), 'Senha')); ?>
                <?=form_input(['class' => 'form-control form-control-sm border-none','placeholder' => 'Sua senha','type' => 'password','name' => 'senha','required' => 'required','id' => 'senha','value' => '']);?>

                                        </div>
							<div class="form-group p-2">
								<hr>
											<?= form_submit('btn_salvar', 'Login', ['class' => 'btn btn-primary btn-block mt-2 ']); ?>  
                                        </div>
                                        
                                                                            
                                       
                                    <?= form_close() ?>
                                   
                                   
                                   
                                </div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>






<?= $this->endSection(); ?>