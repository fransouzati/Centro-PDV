<div class="suppliers index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Suppliers'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Ações</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Supplier'), array('action' => 'add'), array('escape' => false)); ?></li>
								<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar Compras'), array('controller' => 'compras', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Novo Compra'), array('controller' => 'compras', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('fantasia'); ?></th>
						<th><?php echo $this->Paginator->sort('razao'); ?></th>
						<th><?php echo $this->Paginator->sort('cnpj'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th><?php echo $this->Paginator->sort('modified'); ?></th>
						<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($suppliers as $supplier): ?>
					<tr>
						<td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
						<td><?php echo h($supplier['Supplier']['fantasia']); ?>&nbsp;</td>
						<td><?php echo h($supplier['Supplier']['razao']); ?>&nbsp;</td>
						<td><?php echo h($supplier['Supplier']['cnpj']); ?>&nbsp;</td>
						<td><?php echo h($supplier['Supplier']['created']); ?>&nbsp;</td>
						<td><?php echo h($supplier['Supplier']['modified']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $supplier['Supplier']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $supplier['Supplier']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $supplier['Supplier']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $supplier['Supplier']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros de um total de {:count}, iniciando no registro {:start}, terminando em {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
			<ul class="pagination pagination-sm">
				<?php
					echo $this->Paginator->prev('&larr; Anterior', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Anterior</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Próxima &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Próxima &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
			</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->
