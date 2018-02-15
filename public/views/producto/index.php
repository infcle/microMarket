<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Lista de productos
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="<?php echo ROOT_CONTROLLER; ?>producto/registro.php" class="fa fa-plus"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                        <thead>
                            <tr>
                                <th>Nro PLU</th>
                                <th>Nombre producto</th>
                                <th>tipo venta</th>
                                <th>Precio</th>
                                <th>Codigo PLU</th>
                                <th class="hidden-phone">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $producto): ?>
                                <tr class="gradeX">
                                    <td><?php echo $producto['nro_plu']; ?></td>
                                    <td><?php echo $producto['nombre']; ?></td>
                                    <td><?php echo $producto['tipo']; ?></td>
                                    <td><?php echo $producto['precio']; ?></td>
                                    <td><?php echo $producto['cod_plu']; ?></td>
                                    <td ></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nro PLU</th>
                                <th>Nombre producto</th>
                                <th>Precio</th>
                                <th>Codigo PLU</th>
                                <th class="hidden-phone">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>