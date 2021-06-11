<?php
include_once 'layouts/header.php';
?>
<title>Menú Administrador</title>
<script src="../Recursos/jquery/jquery-3.5.0.min.js" type="text/javascript"></script>
<script src="../Recursos/js/gestionHistorialPagoReserva.js" type="text/javascript"></script>
<?php
include_once 'layouts/nav_Administrador.php';
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Historial Paga</h1>
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

    
    <section>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Historial</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-over text-nowrap">
                                    <thead class="table-success">
                                        <tr>
                                            <th>Código Reserva</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Estado</th>
                                            <th>Descripción</th>
                                            <th>Precio Silla</th>
                                            <th>Precio Vuelo</th>
                                            <th>Total Pago</th>
                                            <th>Tarjeta Crédito</th>
                                            <th>Tipo Vuelo</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-active" id="ListaHistorialPagoReserva">

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