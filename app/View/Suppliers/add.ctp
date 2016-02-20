<div class="suppliers form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Supplier'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Ações</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Suppliers'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Compras'), array('controller' => 'compras', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Compra'), array('controller' => 'compras', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Supplier', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('fantasia', array('class' => 'form-control', 'placeholder' => 'Fantasia'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('razao', array('class' => 'form-control', 'placeholder' => 'Razao'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('cnpj', array('class' => 'form-control', 'placeholder' => 'Cnpj'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Enviar'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
