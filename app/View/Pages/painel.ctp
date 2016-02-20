<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>

<div class="row">
    <div class="col-md-3">
        <div class="affix">
            <?php echo $this->element('side_totaliza_compras'); ?>
        </div>
    </div> <!-- /.row -->
    <div class="col-md-6">
        <?php echo $this->element('ComprasMes'); ?>
        <?php echo $this->element('ContasAPagar'); ?>
    </div> <!-- /.row -->
</div> <!-- /.col-md-3 -->
