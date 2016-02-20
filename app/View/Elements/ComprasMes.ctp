<?php

$start = date('Y-m-d h:i:s');
$end = date('Y-m-d h:i:s', strtotime('+1 month'));

//echo $start.' | '.$end.'<br>';

$inicio = '06/01/2015'; // 01/06/2015
$fim = strtotime('+1 month');

$dtdf = '06/01/'.date('Y');
$datavd = date('m/d/Y', strtotime("+1 month", strtotime($dtdf)));

//echo $datavd;


$Janeiro = '01/01/'.date('Y'); // mes/dia/ano
$Fevereiro = date('m/d/Y', strtotime("+1 month", strtotime($Janeiro)));
$Marco = date('m/d/Y', strtotime("+1 month", strtotime($Fevereiro)));
$Abril = date('m/d/Y', strtotime("+1 month", strtotime($Marco)));
$Maio = date('m/d/Y', strtotime("+1 month", strtotime($Abril)));
$Junho = date('m/d/Y', strtotime("+1 month", strtotime($Maio)));
$Julho = date('m/d/Y', strtotime("+1 month", strtotime($Junho)));
$Agosto = date('m/d/Y', strtotime("+1 month", strtotime($Julho)));
$Setembro = date('m/d/Y', strtotime("+1 month", strtotime($Agosto)));
$Outubro = date('m/d/Y', strtotime("+1 month", strtotime($Setembro)));
$Novembro = date('m/d/Y', strtotime("+1 month", strtotime($Outubro)));
$Dezembro = date('m/d/Y', strtotime("+1 month", strtotime($Novembro)));

$ActionCompras = array('controller' => 'compras', 'action' => 'totalizando');

function condCompras($mes1, $mes2){
	return array('condicoes' => array('Compra.status' => array(1,2), 'Compra.data BETWEEN ? AND ?' => array($mes1,$mes2)));
}


$cpJaneiro = $this->requestAction($ActionCompras, condCompras($Janeiro, $Fevereiro));
$cpFevereiro = $this->requestAction($ActionCompras, condCompras($Fevereiro, $Marco));
$cpMarco = $this->requestAction($ActionCompras, condCompras($Marco, $Abril));
$cpAbril = $this->requestAction($ActionCompras, condCompras($Abril, $Maio));
$cpMaio = $this->requestAction($ActionCompras, condCompras($Maio, $Junho));
$cpJunho = $this->requestAction($ActionCompras, condCompras($Junho, $Julho));
$cpJulho = $this->requestAction($ActionCompras, condCompras($Julho, $Agosto));
$cpAgosto = $this->requestAction($ActionCompras, condCompras($Agosto, $Setembro));
$cpSetembro = $this->requestAction($ActionCompras, condCompras($Setembro, $Outubro));
$cpOutubro = $this->requestAction($ActionCompras, condCompras($Outubro, $Novembro));
$cpNovembro = $this->requestAction($ActionCompras, condCompras($Novembro, $Dezembro));
$cpDezembro = $this->requestAction($ActionCompras, condCompras($Dezembro, $Janeiro));

function jsonMeses(){
	return array(array_sum($cpJunho),array_sum($cpJulho));
}
//echo 'Mes Julho'.array_sum($cpJulho);
?>
<!--<table>
	<tr>
		<td><?php echo $Janeiro; ?></td>
	</tr>
	<tr>
		<td><?php echo $Fevereiro; ?></td>
	</tr>
	<tr>
		<td><?php echo $Marco; ?></td>
	</tr>
	<tr>
		<td><?php echo $Abril; ?></td>
	</tr>
	<tr>
		<td><?php echo $Maio; ?></td>
	</tr>
	<tr>
		<td><?php echo $Junho; ?></td>
	</tr>
	<tr>
		<td><?php echo $Julho; ?></td>
	</tr>
	<tr>
		<td><?php echo $Agosto; ?></td>
	</tr>
	<tr>
		<td><?php echo $Setembro; ?></td>
	</tr>
	<tr>
		<td><?php echo $Outubro; ?></td>
	</tr>
	<tr>
		<td><?php echo $Novembro; ?></td>
	</tr>
	<tr>
		<td><?php echo $Dezembro; ?></td>
	</tr>
	<tr>
	</tr>
</table>-->
<?php

//echo $this->Math->converteValorMonetario('1580,98', ',');

//$mesAtual = $this->requestAction(array('controller' => 'compras', 'action' => 'comprasMes'), array('condicoes' => array('Compra.modified <=' => $end, 'Compra.modified >=' => $start)));


//$mesAtual = $this->requestAction(array('controller' => 'compras', 'action' => 'comprasMes'), array('condicoes' => array('Compra.created BETWEEN ? AND ?' => array('2015-07-10 00:00:00', '2015-07-30 00:00:00'))));

$cmesAtual = $this->requestAction(array('controller' => 'compras', 'action' => 'comprasMes'), array('condicoes' => array('Compra.status' => array(1,2), 'Compra.data BETWEEN ? AND ?' => array($Julho,$Agosto)), 'ordem' => array('Compra.data_pagamento' => 'asc')));

$mesAtual = $this->requestAction(array('controller' => 'compras', 'action' => 'totalizando'), array('condicoes' => array('Compra.status' => array(1,2), 'Compra.data BETWEEN ? AND ?' => array($Julho,$Agosto)), 'ordem' => array('Compra.data_pagamento' => 'desc')));


//$start_date = '2013-05-26'; //should be in YYYY-MM-DD format
//$this->User->find('all', array('conditions' => array('User.reg_date BETWEEN '.$start_date.' AND DATE_ADD('.$start_date.', INTERVAL 30 DAY)')));
?>
<!--<table>
<?php
foreach($cmesAtual as $compra){
	echo '<tr>';
		 	echo '<td>'.$compra['Supplier']['fantasia'].'</td><td>'.$this->Math->converteData($compra['Compra']['data'], 'br').'</td> <td>'.$compra['Compra']['valor'].'</td>';
	echo '</tr>';
		}

?>
</table>-->
<?php
//debug($mesAtual);

//echo 'Compras do Mês: '.array_sum($mesAtual);
?>

<div class="actions">
<div class="panel panel-default" id="totalizando">
	<div class="panel-heading">Compras por Mês</div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				<h1><span class="rs">R$</span> <?php echo array_sum($mesAtual); ?></h1>
				<span>Mês Atual</span>
			</div>
			<div class="row">
				<div class="col-md-12">
					<canvas id="myChart" height="150" style="margin-left: -10px; width: 90%;"></canvas>
				</div>
			</div>

			<script>
				var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
				var lineChartData = {
					labels : ["Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
					datasets : [
						{
							label: "My First dataset",
							fillColor : "rgba(220,220,220,0.2)",
							strokeColor : "rgba(220,220,220,1)",
							pointColor : "rgba(220,220,220,1)",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(220,220,220,1)",
							data : [<?php echo $this->Math->converteValorMonetario(array_sum($cpJaneiro), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpFevereiro), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpMarco), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpAbril), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpMaio), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpJunho), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpJulho), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpAgosto), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpSetembro), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpOutubro), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpNovembro), ','); ?>,
							<?php echo $this->Math->converteValorMonetario(array_sum($cpDezembro), ','); ?>]

							/*[<?php echo array_sum($cpJaneiro);?>,<?php echo array_sum($cpFevereiro);?>,<?php echo array_sum($cpMarco);?>,<?php echo array_sum($cpAbril);?>,<?php echo array_sum($cpMaio);?>,<?php echo array_sum($cpJunho);?>,<?php echo array_sum($cpJulho);?>, <?php echo array_sum($cpAgosto);?>, <?php echo array_sum($cpSetembro);?>, <?php echo array_sum($cpOutubro);?>, <?php echo array_sum($cpNovembro);?>, <?php echo array_sum($cpDezembro);?>]*/
						}
						/*{
							label: "My Second dataset",
							fillColor : "rgba(151,187,205,0.2)",
							strokeColor : "rgba(151,187,205,1)",
							pointColor : "rgba(151,187,205,1)",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(151,187,205,1)",
							data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
						}*/
					]
				}
			window.onload = function(){
				var ctx = document.getElementById("myChart").getContext("2d");
				window.myLine = new Chart(ctx).Line(lineChartData, {
					responsive: true
				});
			}
			</script>


			<!--<ol>
				<?php foreach ($compras as $compra): ?>
					<li><?php echo $compra['Supplier']['fantasia']; ?> - <?php echo $compra['Compra']['valor']; ?></li>
				<?php endforeach; ?>
			</ol> -->
		</div><!-- end body -->
</div><!-- end panel -->
</div><!-- end actions -->
