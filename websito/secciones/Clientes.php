<?php include("../templates/cabecera.php"); ?>
<?php include ("../secciones/Clientes_ver.php"); ?>
<div class="container">
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-md-5">
                <form action="" method="post">
                <h1>Ingreso de clientes</h1>
                    <div class="card" style="background-color: #EEEDDE; color: #141E27;">
                        <div class="card-header" style="background-color: #DFD7BF; color: #141E27;">
                            Datos de clientes
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="id" class="form-label">Rut</label>
                                <input type="text"
                                        class="form-control"
                                        name="rut_cliente" 
                                        id="rut_cliente" 
                                        value="<?php echo $rut_cliente;?>"
                                        aria-describedby="helpId" placeholder="ID" style="background-color: #F2EAD3; color: #141E27;">
                            </div>
                            <div class="mb-3">
                                <label for="nombre_cliente" class="form-label">Nombre</label>
                                <input type="text" 
                                        class="form-control" 
                                        name="nombre_cliente" 
                                        id="nombre_cliente" 
                                        value ="<?php echo $nombre_cliente;?>"
                                        aria-describedby="helpId" placeholder="Nombre completo" style="background-color: #F2EAD3; color: #141E27;">

                            </div>

                            <div class="btn-group" role="group" aria-label="Button group name">
                                <button type="submit" name = "accion" value ="agregar" class="btn btn-primary" style="background-color: #DFD7BF; color: #141E27; border: 1px solid #203239" >Agregar</button>
                                <button type="submit" name = "accion" value ="editar" class="btn btn-primary" style="background-color: #DFD7BF; color: #141E27; border: 1px solid #203239" >Editar</button>
                                <button type="submit" name = "accion" value ="borrar" class="btn btn-danger" style="background-color: #3F2305; color: #F5F5F5; border: 1px solid #203239" >Borrar</button>
                            </div>

                        </div>
                </form>



            </div>





        </div>
        <div class="col-md-7">
            <table class="table">
            <h1>Lista de clientes</h1>
                <thead style="background-color: #DFD7BF; color: #141E27;">
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($listaCliente as $clientes){?>
                    <tr style="background-color: #F2EAD3; color: #141E27;">
                        <td> <?php echo $clientes["rut_cliente"];?> </td>
                        <td> <?php echo $clientes["nombre_cliente"];?> </td>
                        <td> 
                            <form action="" method="post">
                                <input type="hidden" name="rut_cliente" id="rut_cliente" value="<?php echo $clientes["rut_cliente"];?>"/>
                                <input type="submit" value="Seleccionar" name="accion" class="btn btn-info" style="background-color: #3F2305; color: #F5F5F5; border: 1px solid #203239">
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
