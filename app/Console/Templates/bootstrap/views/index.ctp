<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="<?php echo $pluralVar; ?> index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h1>
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
								<li><?php echo "<?php echo \$this->Html->link(__('<span class=\"glyphicon glyphicon-plus\"></span>&nbsp;&nbsp;Novo " . $singularHumanName . "'), array('action' => 'add'), array('escape' => false)); ?>"; ?></li>
						<?php
							$done = array();
							foreach ($associations as $type => $data) {
								foreach ($data as $alias => $details) {
									if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
										echo "\t\t<li><?php echo \$this->Html->link(__('<span class=\"glyphicon glyphicon-list\"></span>&nbsp;&nbsp;Listar " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index'), array('escape' => false)); ?> </li>\n";
										echo "\t\t<li><?php echo \$this->Html->link(__('<span class=\"glyphicon glyphicon-plus\"></span>&nbsp;&nbsp;Novo " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add'), array('escape' => false)); ?> </li>\n";
										$done[] = $details['controller'];
									}
								}
							}
						?>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
					<tr>
			<?php foreach ($fields as $field): ?>
			<th><?php echo "<?php echo \$this->Paginator->sort('{$field}'); ?>"; ?></th>
			<?php endforeach; ?>
			<th class="actions"></th>
					</tr>
				</thead>
				<tbody>
			<?php
			echo "\t<?php foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
			echo "\t\t\t\t\t<tr>\n";
				foreach ($fields as $field) {
					$isKey = false;
					if (!empty($associations['belongsTo'])) {
						foreach ($associations['belongsTo'] as $alias => $details) {
							if ($field === $details['foreignKey']) {
								$isKey = true;
								echo "\t\t\t\t\t\t\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
								break;
							}
						}
					}
					if ($isKey !== true) {
						echo "\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
					}
				}

				echo "\t\t\t\t\t\t<td class=\"actions\">\n";
				echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-search\"></span>', array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n";
				echo "\t\t\t\t\t\t\t<?php echo \$this->Html->link('<span class=\"glyphicon glyphicon-edit\"></span>', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false)); ?>\n";
				echo "\t\t\t\t\t\t\t<?php echo \$this->Form->postLink('<span class=\"glyphicon glyphicon-remove\"></span>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
				echo "\t\t\t\t\t\t</td>\n";
			echo "\t\t\t\t\t</tr>\n";

			echo "\t\t\t\t<?php endforeach; ?>\n";
			?>
				</tbody>
			</table>

			<p>
				<small><?php echo "<?php echo \$this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} registros de um total de {:count}, iniciando no registro {:start}, terminando em {:end}')));?>"; ?></small>
			</p>

			<?php
				echo "<?php\n";
				echo "\t\t\t\$params = \$this->Paginator->params();\n";
				echo "\t\t\tif (\$params['pageCount'] > 1) {\n";
				echo "\t\t\t?>\n";
			?>
			<ul class="pagination pagination-sm">
			<?php
				echo "\t<?php\n";
				echo "\t\t\t\t\techo \$this->Paginator->prev('&larr; Anterior', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick=\"return false;\">&larr; Anterior</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));\n";
				echo "\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));\n";
				echo "\t\t\t\t\techo \$this->Paginator->next('Próxima &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick=\"return false;\">Próxima &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));\n";
				echo "\t\t\t\t?>\n";
			?>
			</ul>
			<?php
				echo "<?php } ?>\n";
			?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->
