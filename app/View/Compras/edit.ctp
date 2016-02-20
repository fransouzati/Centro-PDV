<div class="compras form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Compra'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Compra.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Compra.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Compras'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Forma Pagamentos'), array('controller' => 'forma_pagamentos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Forma Pagamento'), array('controller' => 'forma_pagamentos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Suppliers'), array('controller' => 'suppliers', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Supplier'), array('controller' => 'suppliers', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Compra', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('valor', array('class' => 'form-control', 'placeholder' => 'Valor'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('data', array('class' => 'form-control', 'placeholder' => 'Data'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('entrega', array('class' => 'form-control', 'placeholder' => 'Entrega'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('forma_pagamento_id', array('class' => 'form-control', 'placeholder' => 'Forma Pagamento Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('data_pagamento', array('class' => 'form-control', 'placeholder' => 'Data Pagamento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('supplier_id', array('class' => 'form-control', 'placeholder' => 'Supplier Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('status', array('options' => array(0 => '[Informe o Status]', 1 => 'Pedido Realizado', 2 => 'Pedido Entregue', 3 => 'Pedido entregue e Pago'), 'class' => 'form-control', 'placeholder' => 'Status do Pagamento'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('obs', array('class' => 'form-control', 'placeholder' => 'Observações...'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
