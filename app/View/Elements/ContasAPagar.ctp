<?php
$ContasAPagar = $this->requestAction(array('controller' => 'compras', 'action' => 'totalizando'), array('condicoes' => array('Compra.status' => array(1,2)), 'ordem' => array('Compra.data_pagamento' => 'desc')));

$compras = $this->requestAction(array('controller' => 'compras', 'action' => 'home_index'));
?>
<div class="actions">
<div class="panel panel-default" id="totalizando">
	<div class="panel-heading">Contas a Pagar</div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<h1><span class="rs">R$</span> <?php echo array_sum($ContasAPagar); ?></h1>
				<span>Total Parcial</span>
			</div>

			<table cellpadding="0" cellspacing="0" class="table table-striped">
			<?php foreach ($compras as $compra): ?>

						<tr <?php echo 'class="'.$this->Math->corRegistro(date('Y-m-d'), $this->Math->converteData($compra['Compra']['data_pagamento'], 'us')).'"'; ?>>
							<td style="text-align: left">
								<?php echo $this->Html->link($compra['Supplier']['fantasia'], array('controller' => 'suppliers', 'action' => 'view', $compra['Supplier']['id'])); ?>
							</td>
							<td><?php echo $this->Math->escreveData($compra['Compra']['data_pagamento']); ?>&nbsp;</td>
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
							<td class="actions">
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $compra['Compra']['id']), array('escape' => false)); ?>
								<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller' => 'compras', 'action' => 'edit', $compra['Compra']['id']), array('escape' => false)); ?>
								<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $compra['Compra']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>




		</div><!-- end body -->
</div><!-- end panel -->
</div><!-- end actions -->
