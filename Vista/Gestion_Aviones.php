<?php
ob_start();
//Con esto, se pueden enviar los headers en cualquier lugar del documento.
?>


<?php

include_once 'layouts/header.php';

?>
<title>Menú Administrador</title>
<script src="../Recursos/jquery/jquery-3.5.0.min.js" type="text/javascript"></script>
<script src="../Recursos/js/gestionAvion.js" type="text/javascript"></script>
<?php

include_once 'layouts/nav_Administrador.php';

session_start();
if (isset($_SESSION["administrador"])) {
    $correoUsuarioIdentificado=$_SESSION["administrador"];
    //printf("<script type='text/javascript'>alert(' $correo'); </script>");
}else{
    $mensaje = "Solo puede ingresar un administrador en esta vista";
    header('location:../index.php?msjlogIn=' . $mensaje);
}

?>

<!-- Modal -->


<!-- Modal -->

<!-- Modal -->



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestión Aviones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Vista/adm_Aerolinea.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Página Administrador</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<!-- Seccion de gestion de avion--->
    <section>
        <div class="content">
            <div class="container-fluid">
                
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Aviones</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Placa</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="txtPlaca" class="form-control">
                                            <input type="hidden" id="txtIdAvion" class="form-control">

                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Fabricante</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="selFabricante" class="form-control">
                                                <option value="-1">Seleccione</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Marca</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="selMarca" class="form-control">
                                                <option value="-1">Seleccione</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Color</label>
                                        <div class="col-sm-9">
                                            <select type="text" id="selColor" class="form-control">
                                                <option value="-1">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">descripción</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" id="txtDescripcion"></textarea>
                                        </div>

                                    </div>

                                    <div class="modal-footer row">
                                        <div class="offset-sm-2 col-sm-12 float-right">
                                            <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
                                            <button type="button" class="btn btn-primary" id="btnBuscar">Buscar</button>
                                            <button type="button" class="btn btn-primary" id="btnModificar">Modificar</button>
                                            <button type="button" class="btn btn-primary" id="btnEliminar">Eliminar</button>
                                            <button type="button" class="btn btn-primary" id="btnCancelar">Cancelar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

    </section>
<!-- Seccion de listar--->
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Lista Aviones</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-over text-nowrap">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Placa</th>
                                            <th>Marca</th>
                                            <th>Color</th>
                                            <th>Descripción</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-active" id="tablaListaAviones">

                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
</div>
<!-- /.content-wrapper -->

<?php
 include_once 'layouts/footer.php';
 ?>

<?php
ob_end_flush();
?>