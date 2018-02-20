<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Lista de usuarios
                <span class="tools pull-right">
                    <a href="<?php echo ROOT_CONTROLLER; ?>user/registro.php" class="fa fa-plus"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>Nombre completo</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $user): ?>
                                <tr class="gradeX">
                                    <td><?php echo $user['nombre']; ?></td>
                                    <td><?php echo $user['usuario']; ?></td>
                                    <td><?php echo $user['estado']; ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-success" href="#modalEditar" role="button" data-placement="top" title="Editar" data-toggle="modal" onclick="obtener_datos(<?php echo $user['id_usuario'] ?>)">
                                            <span class="fa fa-edit" ></span>
                                        </a>
                                        <a class="btn btn-danger" href="#" role="button" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                            <span class="fa fa-trash-o"></span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre completo</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th class="hidden-phone">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <?php require_once 'modal_editar.php'; ?>
        </section>
    </div>
</div>

<script>
    function obtener_datos(id){
        $.ajax({
            url: '../../models/user/datos_usuarios.php',
            type: 'POST',
            dataType: "json",
            data: {id_user: id},
            success: function(datos){
                $("#name").val(datos['usuario']['nombre']);
                $("#user").val(datos['usuario']['usuario']);
                $("#inputId").val(datos['usuario']['id_usuario']);
                //console.log(datos['usuario']['name']);
            }
        });
    }
    $(document).ready(function() {
        $('#frmEditar').validate({
            debug:true,
            rules:{
                name:{
                    required:true,
                    minlength: 7,
                },
                user:{
                    required:true,
                    minlength: 3,
                    remote: {
                        url: "../../models/user/verifica.php",
                        type: 'post',
                        data: {
                            user: function() {
                                return $("#user").val();
                            },
                            tipo: 'si',
                            id_user: function() {
                                return $("#inputId").val();
                            },
                        }
                    }
                },
                password:{
                    required:true,
                    minlength:6,
                },
                password_repeat:{
                    required:true,
                    minlength: 6,
                    equalTo: "#password",
                },
            },
            messages:{
                user:{
                    remote:"el nombre de usuario ya existe, seleccione otro."
                },
                password_repeat:{
                    equalTo :"Las contraseñas no coinciden."
                }
            },
            submitHandler: function (form) {alert('exito');
                    $.ajax({
                        url: '../../models/user/editar_model.php',
                        type: 'post',
                        data: $("#frmEditar").serialize(),
                        beforeSend: function() {
                            transicion("Procesando Espere....");
                        },
                        success: function(response) {
                            if(response==1){
                                $('#modalEditar').modal('hide');
                                $('#btnEditar').attr({
                                    disabled: 'true'
                                });
                                transicionSalir();
                                mensajes_alerta('DATOS EDITADOS EXITOSAMENTE !! ','success','EDITAR DATOS');
                                setTimeout(function(){
                                    window.location.href='<?php echo ROOT_CONTROLLER ?>user/index.php';
                                }, 3000);
                            }else{
                                transicionSalir();
                                mensajes_alerta('ERROR AL EDITAR EL USUARIO verifique los datos!! '+response,'error','EDITAR DATOS');
                            }
                        }
                    });
            }
        });

        $('#btnReset').click(function(event) {
            $$.ajax({
                url: '../../models/user/reset_model.php',
                type: 'post',
                data: {
                    id: function() {
                            return $("#inputId").val();
                        }
                },
                beforeSend: function() {
                    transicion("Procesando Espere....");
                },
                success: function(response) {
                    if(response==1){
                        $('#modalEditar').modal('hide');
                        $('#btnReset').attr({
                            disabled: 'true'
                        });
                        $('#btnEditar').attr({
                            disabled: 'true'
                        });
                        transicionSalir();
                        mensajes_alerta('PASSWORD RESTABLECIDO !! ','success','RESTABLECER CONTRASEÑA');
                        setTimeout(function(){
                            window.location.href='<?php echo ROOT_CONTROLLER ?>user/index.php';
                        }, 3000);
                    }else{
                        transicionSalir();
                        mensajes_alerta('ERROR RESTABLECER LA CONTRASEÑA !! '+response,'error','RESTABLECER CONTRASEÑA');
                    }
                }
            })
        });
    });
</script>