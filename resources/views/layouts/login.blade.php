<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Eistel | {{ isset($title) ? $title : 'Sistema de gestión de clientes' }}</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- php artisan make:migration:schema create_clientes_table --schema="title:string"
php artisan make:migration:schema create_clientes_table --schema="name:string,cancelacion_id:integer:foreign, reporte_id:integer:foreign, title:string, domicilio:text, telefono:integer, agendacion:date, migracion:date, download:float, upload:float, statusos:boolean, dto:boolean, termoptica:" -->
<body class="{{ isset($body) ? $body : '' }}">

@yield('content')

<!-- Scripts -->
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
