<script>
	$('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});

	jQuery(document).ready(function(){
		var pickerOpts = {
	        monthNames: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
	        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
	        monthNamesShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul",
	        "Ago", "Set", "Out", "Nov", "Dez"],
	        dayNames: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta",
	        "Sexta", "Sábado"],
	        dayNamesShort: ["Mgg","Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
	        dayNamesMin: ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sa"],
	    };

    	$( "#CompraData, #CompraEntrega, #CompraDataPagamento" ).datepicker(pickerOpts);
    });
</script>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<?php echo $this->Form->create('Compra', array('action' => 'add', 'role' => 'form')); ?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nova <?php echo $controller; ?></h4>
      </div>
      <div class="modal-body">


				<div class="form-group">
					<?php echo $this->Form->input('valor', array('class' => 'form-control', 'placeholder' => 'Valor'));?>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<?php echo $this->Form->input('data', array('class' => 'form-control', 'placeholder' => 'Data'));?>
					</div>
					<div class="form-group col-md-6">
						<?php echo $this->Form->input('entrega', array('class' => 'form-control', 'placeholder' => 'Entrega'));?>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<?php echo $this->Form->input('forma_pagamento_id', array('class' => 'form-control', 'placeholder' => 'Forma de Pagamento', 'label' => 'Forma de Pagamento'));?>
					</div>
					<div class="form-group col-md-6">
						<?php echo $this->Form->input('data_pagamento', array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Data Pagamento'));?>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<?php echo $this->Form->input('supplier_id', array('class' => 'form-control', 'placeholder' => 'Fornecedor', 'label' => 'Fornecedor'));?>
					</div>
					<div class="form-group col-md-6">
						<?php echo $this->Form->input('status', array('options' => array(0 => '[Informe o Status]', 1 => 'Pedido Realizado', 2 => 'Pedido Entregue', 3 => 'Pedido entregue e Pago'), 'class' => 'form-control', 'placeholder' => 'Status do Pagamento'));?>
					</div>
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('obs', array('class' => 'form-control', 'placeholder' => 'Observações...'));?>
				</div>
				<div class="form-group">

				</div>


      </div>
      <div class="modal-footer">
      	<div class="row">
      		<div class="col-md-6">
      			<div class="form-group">
      				<button type="button" class="btn btn-default btn-lg btn-block" data-dismiss="modal">Cancelar</button>
      			</div>
      		</div>
      		<div class="col-md-6">
      			<div class="form-group">
      				<?php echo $this->Form->submit(__('Salvar'), array('class' => 'btn btn-primary btn-lg btn-block')); ?>
      			</div>
      		</div>
      	</div>

      </div>
      <?php echo $this->Form->end() ?>
    </div>
  </div>
</div>
