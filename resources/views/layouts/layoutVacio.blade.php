<!DOCTYPE html>
<html lang="es" style="">
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
<body class="fondo">


    @yield('content')

<style type="text/css">
    .table {
        border-top: 2px solid #ccc;

    }

    .fondo{
        overflow: hidden;
        background: url("gabinete.jpg");
        background-repeat:no-repeat;
        background-color: rgb(216,217,222);

    }

    .container {
        height: 200px;
        position: relative;
        border: 3px solid green;
    }
    .my-auto{
    margin-top: auto;
    margin-bottom: auto;
    }
</style>
</body>
</html>