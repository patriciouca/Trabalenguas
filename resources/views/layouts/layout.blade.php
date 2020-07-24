<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=yes">
    <!--
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    -->
    <script
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>



        function confirmar()
        {
            if(confirm('¿Estas seguro de que quiere eliminar?'))
                return true;
            else
                return false;
        }
    </script>
</head>
<body>
<nav class="navbar navbar-default ">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Trabalenguas</a>
        </div>
        <div id="navbar" style="margin-left: 20px" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Alumnos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url("/cliente")}}">Alumnos</a></li>
                        <li><a href="{{url("/alergia")}}">Alergias</a></li>
                        <li><a href="{{url("/aspecto")}}">Aspectos</a></li>
                        <li><a href="{{url("/colegio")}}">Colegios</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de Clases <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url("/usuario")}}">Usuarios</a></li>
                        <li><a href="{{url("/clase")}}">Clases</a></li>
                        <li><a href="{{url("/clases_impartida")}}">Clases impartidas</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestión de pagos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url("/gasto").'?id='.now()->month}}">Gastos </a></li>
                        <li><a href="{{url("/recibo").'?id='.now()->month}}">Recibos</a></li>
                    </ul>
                </li>

                <li><a href="{{url("/login")}}">Login</a></li>



            </ul>
            <!--
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="./">Default <span class="sr-only">(current)</span></a></li>
                <li><a href="../navbar-static-top/">Static top</a></li>
                <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
            -->
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>
<div class="container-fluid" style="margin-top: 50px">

    @yield('content')
</div>
<style type="text/css">
    .table {
        border-top: 2px solid #ccc;

    }
</style>
</body>
</html>