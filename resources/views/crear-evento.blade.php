<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eventos Cliente</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</head>
<body>
<h3>REGISTRAR <b>EVENTO</b></h3>
<form action="{{route('eventos.create', $paquetes)}}" method="POST">
    @csrf
    @foreach($paquetes as $paquete)
        <input type="hidden" name="id[]" value="{{$paquete}}">
    @endforeach
    <p style="margin-left:20px">NOMBRE:</p>
    <input type="text" name="nombre" placeholder=" NOMBRE" style="margin-left:20px">
    <p style="margin-left:20px">DIRECCION:</p>
    <input type="text" name="direccion" placeholder=" DIRECCION" style="margin-left:20px">
    <p style="margin-left:20px">FECHA:</p>
    <input type="date" name="fecha" style="margin-left:20px">
    <p style="margin-left:20px">HORA INICIO:</p>
    <input type="time" name="hora_inicio" style="margin-left:20px">
    <p style="margin-left:20px">HORA FINAL:</p>
    <input type="time" name="hora_final" style="margin-left:20px"><br><br>
    <button type="submit" class="btn btn-success" style="margin-left:20px">AGREGAR</button>
</form>
</body>
</html>