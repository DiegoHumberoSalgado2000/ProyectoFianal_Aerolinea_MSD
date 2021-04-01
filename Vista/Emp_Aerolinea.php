<?php
include_once 'layouts/header_Empleado.php';
?>

<title>Menu Empleado</title>

<?php
include_once 'layouts/nav_Empleado.php';
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Datos Personales</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../Vista/Emp_Aerolinea.php">Inicio</a></li>
                        <li class="breadcrumb-item active">Pagina Empleado</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img src="../img/avatar4.png" class="profile-user-img img-fluid img-circle">
                                </div>
                                <h3 class="profile-username text-center text-success">Nombre</h3>
                                <p class="text-muted text-center">Apellido</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b class="ColorText">Edad</b><a class="text-muted float-right">21</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="ColorText">Documento ID</b><a
                                            class="text-muted float-right">789456</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="ColorText">Usuario</b><a class="text-muted float-right">Mateo456</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b class="ColorText">Tipo Usuario</b>
                                        <span
                                            class="estiloTextTipoUsuario badge badge-primary float-right">Empleado</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Sobre mi</h3>
                            </div>
                            <div class="card-body">
                                <strong class="ColorText">
                                    <i class="fas fa-phone mr-1">Telefono</i>
                                </strong>
                                <p class="text-muted">318563214</p>

                                <strong class="ColorText">
                                    <i class="fas fa-map-marker-alt">Ubicacion</i>
                                </strong>
                                <p class="text-muted">Calle65#58.96</p>


                                <strong class="ColorText">
                                    <i class="fas fa-users mr-1">Genero</i>
                                </strong>
                                <p class="text-muted">Masculino</p>


                                <strong class="ColorText">
                                    <i class="fas fa-envelope mr-1">Correo</i>
                                </strong>
                                <p class="text-muted">mateo.gomes@gmail.com</p>
                                <button class="btn btn-block bg-gradient-danger">Editar</button>
                            </div>
                            <div class="card-footer">
                                <p class="text-mited">click en boton si decea editar</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Edirtar datos Personales</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Telefono</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="Telefono" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Ubicacion</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="Ubicacion" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Correo</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="Correo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Usuario</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="ConfirmarContraseña" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Contraseña</label>
                                        <div class="col-sm-10">
                                            <input type="password" id="Contraseña" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
                                        <div class="col-sm-10">
                                            <input type="password" id="ConfirmarContraseña" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10 float-right">
                                            <button class="btn btn-block btn-outline-success">Guardar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="card-footer">
                                <p class="text-muted">Cuidado de meter datos erroneos</p>
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
include_once 'layouts/footer_Empleado.php';
?>