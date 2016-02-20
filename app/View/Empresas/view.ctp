<div class="empresas view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Empresa'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Empresa'), array('action' => 'edit', $empresa['Empresa']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Empresa'), array('action' => 'delete', $empresa['Empresa']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $empresa['Empresa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Empresas'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Empresa'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Funcionarios'), array('controller' => 'funcionarios', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Funcionario'), array('controller' => 'funcionarios', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($empresa['Empresa']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Fantasia'); ?></th>
		<td>
			<?php echo h($empresa['Empresa']['fantasia']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Razao'); ?></th>
		<td>
			<?php echo h($empresa['Empresa']['razao']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Cnpj'); ?></th>
		<td>
			<?php echo h($empresa['Empresa']['cnpj']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($empresa['Empresa']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($empresa['Empresa']['modified']); ?>
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
	<h3><?php echo __('Related Funcionarios'); ?></h3>
	<?php if (!empty($empresa['Funcionario'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Cpf'); ?></th>
		<th><?php echo __('Rg'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Endereco'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Pispasep'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Admissao'); ?></th>
		<th><?php echo __('Sexo'); ?></th>
		<th><?php echo __('Estadocivil'); ?></th>
		<th><?php echo __('Nascimento'); ?></th>
		<th><?php echo __('Foto'); ?></th>
		<th><?php echo __('Caminho'); ?></th>
		<th><?php echo __('Empresa Id'); ?></th>
		<th><?php echo __('Funcao Funcionario Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($empresa['Funcionario'] as $funcionario): ?>
		<tr>
			<td><?php echo $funcionario['id']; ?></td>
			<td><?php echo $funcionario['nome']; ?></td>
			<td><?php echo $funcionario['cpf']; ?></td>
			<td><?php echo $funcionario['rg']; ?></td>
			<td><?php echo $funcionario['cep']; ?></td>
			<td><?php echo $funcionario['endereco']; ?></td>
			<td><?php echo $funcionario['bairro']; ?></td>
			<td><?php echo $funcionario['numero']; ?></td>
			<td><?php echo $funcionario['cidade']; ?></td>
			<td><?php echo $funcionario['estado']; ?></td>
			<td><?php echo $funcionario['pispasep']; ?></td>
			<td><?php echo $funcionario['status']; ?></td>
			<td><?php echo $funcionario['admissao']; ?></td>
			<td><?php echo $funcionario['sexo']; ?></td>
			<td><?php echo $funcionario['estadocivil']; ?></td>
			<td><?php echo $funcionario['nascimento']; ?></td>
			<td><?php echo $funcionario['foto']; ?></td>
			<td><?php echo $funcionario['caminho']; ?></td>
			<td><?php echo $funcionario['empresa_id']; ?></td>
			<td><?php echo $funcionario['funcao_funcionario_id']; ?></td>
			<td><?php echo $funcionario['created']; ?></td>
			<td><?php echo $funcionario['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'funcionarios', 'action' => 'view', $funcionario['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'funcionarios', 'action' => 'edit', $funcionario['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'funcionarios', 'action' => 'delete', $funcionario['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $funcionario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Funcionario'), array('controller' => 'funcionarios', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?>
	</div>
	</div><!-- end col md 12 -->
</div>
