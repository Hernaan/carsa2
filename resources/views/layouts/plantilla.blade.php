<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Carsa">
    <meta name="author" content="carsa">
    <meta name="keyword" content="Sistema de puntos carsa">
    <link rel="shortcut icon" href="{{asset('vendors/img/favicon.png')}}">
    <title>Sistema de Puntos</title>
    <!-- Icons -->
    <link href="{{asset('vendors/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('vendors/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="vendors/img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">admin </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Carlos Castillo</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="main.html"><i class="icon-speedometer"></i> Escritorio</a>
                    </li>
                    <li class="nav-title">
                        Categorías e indicadores
                    </li>
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i> Categorias</a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a class="nav-link" 
                                onclick="window.location.href='{{url('/punto_list')}}'">
                                <i class="icon-bag"></i> Subir Excel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" 
                                onclick="window.location.href='{{url('/disciplina')}}'">
                                <i class="icon-bag"></i> Disciplina</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" 
                                onclick="window.location.href='{{url('/productividad')}}'">
                                <i class="icon-bag"></i> Productividad</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" 
                                onclick="window.location.href='{{url('/gestion')}}'">
                                <i class="icon-bag"></i> Gestion</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" 
                                onclick="window.location.href='{{url('/merito_academico')}}'">
                                <i class="icon-bag"></i> Méritos Académicos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" 
                                onclick="window.location.href='{{url('/bono_disciplina')}}'">
                                <i class="icon-bag"></i>Bono Disciplina</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" 
                                onclick="window.location.href='{{url('/bono_productividad')}}'">
                                <i class="icon-bag"></i>Bono Productividad</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" 
                                onclick="window.location.href='{{url('/bono_gestion')}}'">
                                <i class="icon-bag"></i>Bono Gestion</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

        <!-- Contenido Principal -->
        <main class="main">
            <!-- Breadcrumb -->
            <br>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                @yield('content')
                <!-- Fin ejemplo de tabla Listado -->
            </div>
        </main>
        <!-- /Fin del contenido principal -->
    </div>

    

    <footer class="app-footer">
        <span><a href="#">Sumar</a> &copy; 2019</span>
        <span class="ml-auto">Desarrollado por <a href="#">Sumar</a></span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('vendors/js/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/js/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/js/pace.min.js') }}"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="{{ asset('vendors/js/Chart.min.js') }}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{ asset('vendors/js/template.js') }}"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        language: {
              "decimal": "",
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
              "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
              "infoFiltered": "(Filtrado de _MAX_ total entradas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Entradas",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscar:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
          },
    } );
} );
    </script>
</body>

</html>