<div class="compras view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Compra'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Compra'), array('action' => 'edit', $compra['Compra']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Compra'), array('action' => 'delete', $compra['Compra']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $compra['Compra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Compras'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Compra'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Forma Pagamentos'), array('controller' => 'forma_pagamentos', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Forma Pagamento'), array('controller' => 'forma_pagamentos', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Suppliers'), array('controller' => 'suppliers', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Supplier'), array('controller' => 'suppliers', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($compra['Compra']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Valor'); ?></th>
		<td>
			<?php echo h($compra['Compra']['valor']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data'); ?></th>
		<td>
			<?php echo h($compra['Compra']['data']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Entrega'); ?></th>
		<td>
			<?php echo h($compra['Compra']['entrega']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Forma Pagamento'); ?></th>
		<td>
			<?php echo $this->Html->link($compra['FormaPagamento']['id'], array('controller' => 'forma_pagamentos', 'action' => 'view', $compra['FormaPagamento']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Data Pagamento'); ?></th>
		<td>
			<?php echo h($compra['Compra']['data_pagamento']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($compra['Compra']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($compra['Compra']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Supplier'); ?></th>
		<td>
			<?php echo $this->Html->link($compra['Supplier']['id'], array('controller' => 'suppliers', 'action' => 'view', $compra['Supplier']['id'])); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

