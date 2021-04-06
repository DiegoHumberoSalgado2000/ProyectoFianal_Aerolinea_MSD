<?php
include_once 'layouts/header.php';
?>
<title>Menu Administrador</title>
<script src="../Recursos/jquery/jquery-3.5.0.min.js" type="text/javascript"></script>
<script src="../Recursos/js/gestionEmpleados.js" type="text/javascript"></script>
<?php
include_once 'layouts/nav_Administrador.php';
?>


<!-- Modal -->
<div class="modal fade" id="GestionRolEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rol Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="mb-3">
                        <label for="message-text" class="col-form-label">Seleccione el Rol</label>
                        <select type="text" class="form-control" id="recipient-name">
                            <option>Seleccione el Tipo Rol</option>
                            <option>Administrador</option>
                            <option>Empleado</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Empleado</label>
                        <select type="text" class="form-control" id="recipient-name">
                            <option>Seleccione el Empleado</option>
                        </select>
                    </div> 

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Descripccion:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div> 
                </form>
            </div>
            <div class="modal-footer row">
                <div class="offset-sm-2 col-sm-11 float-right">
                    <button type="button" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-primary">Buscar</button>
                    <button type="button" class="btn btn-primary">Modificar</button>
                    <button type="button" class="btn btn-primary">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion Empleados</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Vista/adm_Aerolinea.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Pagina Administrador</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<!--Seccion de gestion de empleado --->
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Gestion</h3>
                            </div>
                            <div class="card-body">
                                <button data-toggle="modal" data-target="#GestionRolEmpleado" type="button"
                                    class="btn btn-block btn-outline-warning btn-sm">Gestion Rol Empleado</button>

                            </div>
                            <div class="card-footer">
                                <p class="text-mited">click en botones para gestionar</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Empleado</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">

                                <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Cedula</label>
                                        <div class="col-sm-9">
                                            <input type="number" id="txtCedula" class="form-control">
                                            <input type="hidden" id="txtIdEmpleado" class="form-control">
                                            <input type="hidden" id="txtCondiResultado" class="form-control">
                                            <input type="hidden" id="txtMsjResultado" class="form-control">
                                        </div>

                                    </div> 
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="txtNombre" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Apellido</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="txtApellido" class="form-control">
                                        </div>

                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-9">
                                            <input type="email" id="txtCorreo" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Telefono</label>
                                        <div class="col-sm-9">
                                            <input type="phone" id="txtTelefono" class="form-control">
                                        </div>

                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Contraseña</label>
                                        <div class="col-sm-9">
                                            <input type="password" id="txtContrasena" class="form-control">
                                        </div>

                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Descripcion</label>
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
                </div>
            </div>
    </section>

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Lista Empleados</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-over text-nowrap" id="ListaEmpleados">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Cedula</th>
                                            <th>Correo</th>
                                            <th>Telefono</th>
                                            <th>Estado</th>
                                            <th>Descripcion</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="table-active" id="ListaEmpleados">

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

</div>

<?php
include_once 'layouts/footer.php';
?>