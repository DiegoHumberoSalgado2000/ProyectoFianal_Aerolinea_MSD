<?php
include_once 'layouts/header.php';
?>
<title>Menu Administrador</title>
<?php
include_once 'layouts/nav_Administrador.php';
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gestion Vuelos</h1>
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
                                <h3 class="card-title">Vuelo</h3>
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Tipo Vuelo</label>
                                        <div class="col-sm-9">
                                        <select type="text" id="CmbUbicacionLlegada" class="form-control">
                                                <option>Seleccione el Tipo de Vuelo</option>
                                                <option>Vuelo Nacional</option>
                                                <option>Vuelo Internacional</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Descripccion</label>
                                        <div class="col-sm-9">
                                        <textarea class="form-control" id="message-text"></textarea>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="Placa" class="form-control">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Avion</label>
                                        <div class="col-sm-9">
                                            <select  id="Placa" class="form-control">
                                                <option>Selecione el Avion</option>
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

    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Lista Vuelos</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-over text-nowrap">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Tipo Vuelo</th>
                                            <th>Descripccion</th>
                                            <th>Estado</th>
                                            <th>Avion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-active" id="ListaAviones">

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