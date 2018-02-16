<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="panel-heading">
                VENTA DE PRODUCTOS
                <span class="pull-right">
                    <a href="#modal_ventas" class="btn btn-xs btn-success" data-toggle="modal">
                        <span class="fa  fa-pencil"></span> Nuevo Cliente
                    </a>
                </span>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" name="frmVenta" id="frmVenta">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">C.I.</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="txt_ci" placeholder="Carnet de identidad">
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Cliente</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="txt_usuario" placeholder="Nombre del cliente">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        TIPO DE VENTA
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="manual" >
                                Manual
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="barras" checked>
                                Cod. Barras
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div id="resultado" class="jumbotron">
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            DETALLE DE VENTA
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio Unitario</th>
                                        <th>Cantidad/Peso</th>
                                        <th>Subtotal</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="miDetalle">
                                </tbody>
                            </table>
                            <div class="row text-right">
                                <div class="col-md-12 panel-body">
                                    <label>Total </label>
                                    <input type="text" name="prec_total" id="prec_total" class="text-right" value="0">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btnEnviar">Realizar venta</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>

<?php require_once 'modal_ventas.php'; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#frmRegistrar').validate({
            debug:true,
            rules:{
                nombre:{
                    required:true,
                    minlength: 4,
                    maxlength:40,
                },
                ci:{
                    required:true,
                    minlength:5,
                    maxlength:20
                },
            },
            submitHandler: function (form) {
                $.ajax({
                    url: '../../models/cliente/registro_model.php',
                    type: 'post',
                    data: $("#frmRegistrar").serialize(),
                    beforeSend: function() {
                        transicion("Procesando Espere....");
                    },
                    success: function(response){
                        if(response==1){
                            var nom=$('#nombre').val();
                            var ci=$('#ci').val();
                            $('#nombre').val('');
                            $('#ci').val('');
                            $('#txt_usuario').val(nom);
                            $('#txt_ci').val(ci);
                            $('#modal_ventas').modal('hide');
                            $('#btnRegistrar').attr({disabled: 'true'});
                            transicionSalir();
                            mensajes_alerta('DATOS REGISTRADOS EXITOSAMENTE !! ','success','EDITAR DATOS');
                        }else{
                            transicionSalir();
                            mensajes_alerta('ERROR AL REGISTRAR AL CLIENTE verifique los datos!! '+response,'error','REGISTRAR DATOS');
                        }
                    }
                });
            }
        });
        $("input[name=optionsRadios]").click(function () {
            var valor=$(this).val();
            $.ajax({
                url: '../../../public/views/ventas/tipoventa.php',
                type: 'post',
                data: {id: valor},
                success: function(response) {
                    $('#resultado').html(response);
                }
            });
        });
        $('#btnEnviar').click(function(event) {
            $('#frmVenta').validate({
                debug:true,
                submitHandler: function (form) {
                    $.ajax({
                        url: '../../models/ventas/registro_recibo.php',
                        type: 'post',
                        data: $("#frmVenta").serialize(),
                        beforeSend: function() {
                            transicion("Procesando Espere....");
                        },
                        success: function(response){
                            if(response==1){
                                var nom=$('#nombre').val();
                                var ci=$('#ci').val();
                                $('#nombre').val('');
                                $('#ci').val('');
                                $('#txt_usuario').val(nom);
                                $('#txt_ci').val(ci);
                                $('#modal_ventas').modal('hide');
                                $('#btnRegistrar').attr({disabled: 'true'});
                                transicionSalir();
                                mensajes_alerta('DATOS REGISTRADOS EXITOSAMENTE !! ','success','EDITAR DATOS');
                            }else{
                                transicionSalir();
                                mensajes_alerta('ERROR AL REGISTRAR AL CLIENTE verifique los datos!! '+response,'error','REGISTRAR DATOS');
                            }
                        }
                    });
                }
            });
        });
        $('#resultado').load("../../../public/views/ventas/tipoventa.php?id=barras");
    });
    function leer(){
        var codigo=$('#cod_barra').val();
        if(codigo.length==13){
            $.ajax({
                url: '../../models/venta/detalle.php',
                type: 'post',
                dataType: "json",
                data: {codigo: codigo},
                beforeSend: function() {
                    transicion("Procesando Espere....");
                },
                success: function(datos){
                    var total=$('#prec_total').val();
                    var detalle=datos['detalle'];
                    console.log(datos['detalle']);
                    transicionSalir();
                    $('#cod_barra').val('');
                    $('#miDetalle').append('<tr><td><input type="hidden" name="detalle[][0]" value="'+detalle['id_prod']+'"><input type="text" class="text-center" readonly name="detalle[][1]" id="detalle[][1]" value="'+detalle['nombre']+'"></td><td><input type="text" name="detalle[][2]" class ="text-right" value="'+detalle['precio']+'" readonly></td><td><input type="text" name="detalle[][3]" class="text-right" value="'+datos['peso']+'" readonly></td><td><input type="text" name="detalle[][4]" class ="text-right" value="'+datos['precioTotal']+'" readonly></td><td></td></tr>');
                    $('#prec_total').val(total*1+datos['precioTotal']);
                }
            });
        }
    }
</script>