<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo __('Novo Usuário'); ?></div>
        <div class="panel-body">
            <p><?php echo __('Cadastre as informações do novo usuário.'); ?></p>

            <?php echo $this->Form->create('User');?>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                    <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Usuário', 'label' => ''));?>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                    <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Senha', 'label' => ''));?>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                    <?php echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'author' => 'Author'), 'class' => 'form-control', 'label' => ''));?>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <?php echo $this->Form->end(array('label' => 'Cadastrar','class' => 'btn btn-primary btn-lg btn-block')); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="form-group">
                    <?php
                    echo $this->Html->link(
                        'Cancelar',
                        'javascript:history.back()',
                        array('class' => 'btn btn-warning btn-lg btn-block')
                    );
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
