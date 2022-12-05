<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eventos Cliente</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Administrar <b>Eventos</b></h2>
        </div>
        <div class="col-md-12">
            <br>
            <a href="{{route('logins.create')}}"><button type="button" class="btn btn-danger">CERRAR SESION</button></a>
            <br><br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"> # </th>
                  <th scope="col"> NOMBRE </th>
                  <th scope="col"> DIRECCION </th>
                  <th scope="col"> FECHA </th>
                  <th scope="col"> HORA INICIO </th>
                  <th scope="col"> HORA FINAL </th>
                  <th scope="col"> ACCION </th>
                </tr>
              </thead>
              <tbody> 
                @foreach($eventos as $evento)
                @if($evento->confirmado == 1)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->direccion }}</td>
                    <td>{{ $evento->fecha }}</td>
                    <td>{{ $evento->hora_inicio }}</td>
                    <td>{{ $evento->hora_final }}</td>
                    <td>
                        @if(date('Y-m-d') == $evento->fecha && date('H:i:s') >= $evento->hora_inicio && date('H:i:s') <= $evento->hora_final)
                            <a href="{{route('empleados.viewFoto', $evento->id)}}"><button type="button" class="btn btn-success">SUBIR FOTOS</button></a>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
        </div>
    </div>        
</div>
</body>
</html>