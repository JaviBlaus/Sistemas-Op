<?php include("../templates/cabecera.php");?>

    contenido de los clientes


    <div class="mb-5">
    <form action="" method="post">
    <div class="card">
        <div class="card-header">
            Clientes
        </div>
        <div class="card-body">
        <div class="mb-3">
      <label for="" class="form-label">Rut</label>
      <input type="text"
        class="form-control"
         name="id"
         id="id"
         aria-describedby="helpId"
         placeholder="ID">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Nombre</label>
      <input type="text"
        class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre completo">
     
    </div>

    <div class="btn-group" role="group" aria-label="Button group name">
        <button type="button" class="btn btn-primary">Agregar</button>
        <button type="button" class="btn btn-primary">Editar</button>
        <button type="button" class="btn btn-danger">Borrar</button>
    </div>

        </div>
    </form>
        

        
    </div>





    </div>
    <div class="mb-7">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Rut</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Dinero</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juanito Perez</td>
                        <td>20.000</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        
    </div>
        
    
<?php include("../templates/pie.php");?>

