<style>
	#totalizando .panel-body{
		text-align: center;
	}
	#totalizando .panel-body span.rs{
		font-size: 10pt
	}
</style>
<?php
//$compras = $this->requestAction('compras/index/sort:data/direction:asc');
$realizados = $this->requestAction(array('controller' => 'compras', 'action' => 'totalizando'), array('condicoes' => array('Compra.status' => 1)));
$entregues = $this->requestAction(array('controller' => 'compras', 'action' => 'totalizando'), array('condicoes' => array('Compra.status' => 2)));
$entreguesPagos = $this->requestAction(array('controller' => 'compras', 'action' => 'totalizando'), array('condicoes' => array('Compra.status' => 3)));

?>

<div class="actions">
<div class="panel panel-default" id="totalizando">
	<div class="panel-heading">Compras por Status</div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<h1><span class="rs">R$</span> <?php echo array_sum($entregues); ?></h1>
				<span>Pedidos Entregues</span>
			</div>
			<div class="alert alert-warning" role="alert">
				<h1><span class="rs">R$</span> <?php echo array_sum($realizados); ?></h1>
				<span>Pedidos Realizados</span>
			</div>
			<div class="alert alert-success" role="alert">
				<h1><span class="rs">R$</span> <?php echo array_sum($entreguesPagos); ?></h1>
				<span>Pedidos Entregues e Pagos</span>
			</div>

			<!--<ol>
				<?php foreach ($compras as $compra): ?>
					<li><?php echo $compra['Supplier']['fantasia']; ?> - <?php echo $compra['Compra']['valor']; ?></li>
				<?php endforeach; ?>
			</ol> -->
		</div><!-- end body -->
</div><!-- end panel -->
</div><!-- end actions -->
