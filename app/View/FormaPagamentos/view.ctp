<div class="formaPagamentos view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Forma Pagamento'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Forma Pagamento'), array('action' => 'edit', $formaPagamento['FormaPagamento']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Forma Pagamento'), array('action' => 'delete', $formaPagamento['FormaPagamento']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $formaPagamento['FormaPagamento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Forma Pagamentos'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Forma Pagamento'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Compras'), array('controller' => 'compras', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Compra'), array('controller' => 'compras', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($formaPagamento['FormaPagamento']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Descricao'); ?></th>
		<td>
			<?php echo h($formaPagamento['FormaPagamento']['descricao']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Compras'); ?></h3>
	<?php if (!empty($formaPagamento['Compra'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Valor'); ?></th>
		<th><?php echo __('Data'); ?></th>
		<th><?php echo __('Entrega'); ?></th>
		<th><?php echo __('Forma Pagamento Id'); ?></th>
		<th><?php echo __('Data Pagamento'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Supplier Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($formaPagamento['Compra'] as $compra): ?>
		<tr>
			<td><?php echo $compra['id']; ?></td>
			<td><?php echo $compra['valor']; ?></td>
			<td><?php echo $compra['data']; ?></td>
			<td><?php echo $compra['entrega']; ?></td>
			<td><?php echo $compra['forma_pagamento_id']; ?></td>
			<td><?php echo $compra['data_pagamento']; ?></td>
			<td><?php echo $compra['created']; ?></td>
			<td><?php echo $compra['modified']; ?></td>
			<td><?php echo $compra['supplier_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'compras', 'action' => 'view', $compra['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'compras', 'action' => 'edit', $compra['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'compras', 'action' => 'delete', $compra['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $compra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Compra'), array('controller' => 'compras', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
	</div>
	</div><!-- end col md 12 -->
</div>
