<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACTUALIZAR EVENTO</title>
    <link rel="stylesheet" href="/css/input.css">
</head>
<body>
    <form action="{{route('evento.updateEvento',[$evento])}}" method="POST">
        <h2 class="form__titulo"> ACTUALIZAR EVENTO</h2>
        @csrf
        @method('put')
        <div class="contenedor-inputs">
       
        <label> Evento:
            <input type="text" name="nombre" value="{{$evento->nombre}}">
        </label>
        <br>
        <label> Direccion:
            <input type="text" name="direccion" value="{{$evento->direccion}}">
        </label>
        <br>
        <label> Fecha:
            <input type="date" name="fecha" value="{{$evento->fecha}}">
        </label>
        <br>
        <label> Hora de inicio:

            <input type="time" name="hora_inicio" value="{{$evento->hora_inicio}}">
        </label>
        <br>
        <label> Hora final:
            <input type="time" name="hora_final" value="{{$evento->hora_final}}">
        </label>
        <br>
        <label> Motivo:
            <input type="text" name="motivo" value="{{$evento->motivo}}">
        </label>
        <br>
        <label> Confirmado:
            <input type="text" name="confirmado" value="{{$evento->confirmado}}">
        </label>
        <br>
        <label> Activo:
            <input type="text" name="activo" value="{{$evento->activo}}">
        </label>

        <br>
        <button type="submit">Actualizar</button>
        </div>
    </form>
</body>
</html>