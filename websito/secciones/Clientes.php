<?php include("../templates/cabecera.php"); ?>
<?php include ("../secciones/Clientes_ver.php"); ?>
<div class="row">
    <div class="col-12">
        <div class="row">




            <div class="col-md-5">
                <form action="" method="post">
                    <div class="card">
                        <div class="card-header">
                            Ingreso de clientes
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="id" class="form-label">Rut</label>
                                <input type="text" class="form-control" name="rut_cliente" id="rut_cliente" value="<?php echo $rut_cliente;?>"  aria-describedby="helpId" placeholder="ID">
                            </div>
                            <div class="mb-3">
                                <label for="nombre_cliente" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre_cliente" id="nombre_cliente" aria-describedby="helpId" placeholder="Nombre completo">

                            </div>

                            <div class="btn-group" role="group" aria-label="Button group name">
                                <button type="submit" name = "accion" value ="agregar" class="btn btn-primary">Agregar</button>
                                <button type="submit" name = "accion" value ="editar" class="btn btn-primary">Editar</button>
                                <button type="submit" name = "accion" value ="borrar" class="btn btn-danger">Borrar</button>
                            </div>

                        </div>
                </form>



            </div>





        </div>
        <div class="col-md-7">
            <table class="table">
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($listaCliente as $clientes){?>
                    <tr>
                        <td> <?php echo $clientes["rut_cliente"];?> </td>
                        <td> <?php echo $clientes["nombre_cliente"];?> </td>
                        <td> 
                            <form action="" method="post">
                                <input type="hidden" name="rut_cliente" id="rut_cliente" value="<?php echo $clientes["rut_cliente"];?>"/>
                                <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">
                            </form>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>


<?php include("../templates/pie.php"); ?>