 <style>
 .main-footer{
     display: none;
 }

.green{
    background: #D5F5E3 ;
    color: #27AE60;
}
 </style>
<section class="content">
 <div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Extraccion <?= "#".$maquinas_id['codigo_maquina']; ?></h3>
            </div>
             <div class="box-body">
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alerta!</h4>
                        <?= validation_errors();?>
                        <?= isset($msg)? $msg: ''; ?>
                    </div>
                <?php endif; ?>
                <?php echo form_open(base_url('admin/barrenacion/maquina_edit/'.$maquinas_id['id']), 'class="form-horizontal"'); ?>
                <div class="form-group">
                    <div class="box-header with-border">
                        <h3 class="box-title">Selecciona un campo a editar</h3>
                    </div>
                    <label for="" class="col-sm-2 control-label">Nombre de Maquina:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $maquinas_id['nombre']?>" >
                        </div>
                    </div> <!-- form-group -->

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Codigo de Maquina:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="codigo_maquina" value="<?= $maquinas_id['codigo_maquina']?>">
                            </div>
                    </div>

                    <div class="form-group">
                        <div class=" col-md-11">
                            <input type="button" name="volver" value="Volver" class="btn btn-info pull-right" style="margin-left:5px;" onClick="history.go(-1)">
                            <input type="submit" name="submit" value="Editar" class="btn btn-info pull-right">
                        </div>
                    </div>
                <?php echo form_close(); ?>

            </div> <!-- box-body -->
        </div> <!-- box -->
    </div> <!-- col-md-12 -->
 </div> <!-- row -->
</section> <!-- content -->

<script>
$(document).ready( function(){
console.log('Hello from jQuery');

let nameName = $('input[name="nombre"]');
let nameCode = $('input[name="codigo_maquina"]');
let change = $('input[name="nombre"]').prop("readonly", true);
let changeTwo = $('input[name="codigo_maquina"]').prop("readonly", true);

$(nameName).click(function(){
    
    if(change) {
        $(this).addClass('green');
        $(this).prop("readonly", false);
    } 

});

$(nameCode).click(function(){
    $(this).addClass('green');
    $(this).prop('readonly', false);
});


});

</script>






