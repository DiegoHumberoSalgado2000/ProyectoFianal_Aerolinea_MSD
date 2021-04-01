<?php
include_once 'layouts/header.php';
?>
<title>Manu Administrador</title>
<?php
include_once 'layouts/nav_Administrador.php';
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion Pasagero</h1>
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

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Pasagero</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">

                                    
                                <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="message-text">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Apellido</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="message-text">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Cedula</label>
                                        <div class="col-sm-9">
                                            <input type="number" id="Placa" class="form-control">
                                        </div>

                                    </div>

                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Genero</label>
                                        <div class="col-sm-9">
                                        <select class="form-control" id="message-text">
                                            <option>Seleccione el Genero</option>
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                        </select>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-9">
                                        <input type="email" class="form-control" id="message-text">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Telefono</label>
                                        <div class="col-sm-9">
                                        <input type="phone" class="form-control" id="message-text">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-9">
                                        <select class="form-control" id="message-text">
                                            <option>Seleccione el Estado</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer row">
                                        <div class="offset-sm-2 col-sm-12 float-right">
                                            <button type="button" class="btn btn-primary">Guardar</button>
                                            <button type="button" class="btn btn-primary">Buscar</button>
                                            <button type="button" class="btn btn-primary">Modificar</button>
                                            <button type="button" class="btn btn-primary">Eliminar</button>
                                        </div>

                                    </div>
                                </form>
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