
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Recursos/css/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Recursos/css/adminlte.min.css">

    <link rel="stylesheet" href="../Recursos/css/estilos.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a  class="nav-link">Menú Empleado</a>
                </li>
            </ul>

            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../Vista/Emp_Aerolinea.php" class="brand-link">
                <img src="../img/LogoAerolineaMSD.PNG" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Aerolinea MSD</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/avatar4.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a class="d-block" id="lblNombreApellido">Nombre y apellido</a>
                    </div>
                </div>
                <!-- SidebarSearch Form -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                        <li class="nav-header">NAVEGACIÓN</li>

                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                                <p>
                                    Volver a la Página Principal
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="../Vista/Administrar_Reserva.php" class="nav-link">
                            <i class="fas fa-money-check"></i>
                                <p>
                                    Administrar Reservas
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>