<div class="compras index">


			<div class="page-header">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3">
							<h1><?php echo __('Compras'); ?></h1>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							</div>
							<div class="form-group">
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">
								  <span class="glyphicon glyphicon-plus"></span>&nbsp; Nova Compra
								</button>
							</div>

						</div>
					</div><!-- end col md 12 -->
				</div><!-- end row -->

			</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Ações</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nova Compra'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Formas Pagamentos'), array('controller' => 'forma_pagamentos', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Nova Forma Pagamento'), array('controller' => 'forma_pagamentos', 'action' => 'add'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Fornecedores'), array('controller' => 'suppliers', 'action' => 'index'), array('escape' => false)); ?> </li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Fornecedor'), array('controller' => 'suppliers', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->

			<?php echo $this->element('side_totaliza_compras'); ?>
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped">
					<thead>
						<tr>
							<th><?php echo $this->Paginator->sort('supplier_fantasia', 'Fornecedor'); ?></th>
							<th><?php echo $this->Paginator->sort('data', 'Pedido'); ?></th>
							<th><?php echo $this->Paginator->sort('entrega', 'Entrega'); ?></th>
							<th><?php echo $this->Paginator->sort('forma_pagamento_id', 'Tipo'); ?></th>
							<th><?php echo $this->Paginator->sort('data_pagamento', 'Vencimento'); ?></th>
							<th><?php echo $this->Paginator->sort('valor'); ?></th>
							<th><?php echo $this->Paginator->sort('status'); ?></th>
							<th class="actions"></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($compras as $compra): ?>
						<tr>
							<td>
								<?php echo $this->Html->link($compra['Supplier']['fantasia'], array('controller' => 'suppliers', 'action' => 'view', $compra['Supplier']['id'])); ?>
							</td>
							<td><?php echo h($this->Locale->date($compra['Compra']['data'])); ?>&nbsp;</td>
							<td>
								<?php

									$dataAtual = date('d/m/Y');
									$dataEntrega = $this->Locale->date($compra['Compra']['entrega']);
									$diferencaEntrega = $this->Math->diferencaDeDatas($dataAtual, $dataEntrega, 'dias');

									if ($dataAtual >= $dataEntrega) {
										$entregaIcon = 'glyphicon-home';
										$entregaColor = 'label label-primary';
									} else {
										$entregaIcon = 'glyphicon-road';
										$entregaColor = 'label label-warning';
									}
								?>
								<!-- <span class="label <?php echo $entregaColor; ?>"><?php echo ( $entregaIcon == "glyphicon-home" ? '' : $diferencaEntrega ); ?> <span class="glyphicon <?php echo $entregaIcon; ?>"></span></span> -->
								<?php echo h($this->Locale->date($compra['Compra']['entrega'])); ?>&nbsp;</td>
							<td>
								<?php
									$formaPagamento = $compra['FormaPagamento']['id'];

									switch ($formaPagamento) {
										case 1:
											$formaPagamentoClass = 'label-danger';
											break;

										case 2:
											$formaPagamentoClass = 'label-info';
											break;

										default:
											$formaPagamentoClass = 'label-default';
											break;
									}
								?>
								<span class="label <?php echo $formaPagamentoClass; ?>">
								<?php echo $compra['FormaPagamento']['descricao']; ?>
								</span>
							</td>
							<td><?php echo h($this->Locale->date($compra['Compra']['data_pagamento'])); ?>&nbsp;</td>
							<td><?php echo h($compra['Compra']['valor']); ?>&nbsp;</td>
							<td>
								<?php
								$statusPedido = $compra['Compra']['status'];
								switch ($statusPedido) {
									case 1:
										$statusPedidoIcon = 'glyphicon-ok';
										$statusPedidoLabel = 'label-warning';
										$statusPedidoTitle = 'Pedido Realizado.';
										break;

									case 2:
										$statusPedidoIcon = 'glyphicon-ok';
										$statusPedidoLabel = 'label-primary';
										$statusPedidoTitle = 'Pedido Entregue.';
										break;

									case 3:
										$statusPedidoIcon = 'glyphicon-ok';
										$statusPedidoLabel = 'label-success';
										$statusPedidoTitle = 'Pedido Entregue e Pago.';
										break;

									default:
										$statusPedidoIcon = 'glyphicon-asterisk';
										$statusPedidoLabel = 'label-default';
										$statusPedidoTitle = 'Status não Informado.';
										break;
								}
								?>
								<span title="<?php echo $statusPedidoTitle; ?>" class="label <?php echo $statusPedidoLabel; ?>"><span class="glyphicon <?php echo $statusPedidoIcon; ?>"></span></span>
								<?php //echo h($compra['Compra']['status']); ?>&nbsp;</td>
							<td class="actions">
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $compra['Compra']['id']), array('escape' => false)); ?>
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $compra['Compra']['id']), array('escape' => false)); ?>
								<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $compra['Compra']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros de um total de {:count}, começando no registro {:start}, terminando em {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Anterior', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Anterior</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Próxima &rarr;', array('class' => 'Próxima','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->
<?php echo $this->element('form_add', array("controller" => "compras")); ?>
