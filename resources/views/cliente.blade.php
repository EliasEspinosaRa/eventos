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
@guest
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Administrar <b>Paquetes</b></h2>
        </div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"> # </th>
                  <th scope="col"> NOMBRE </th>
                  <th scope="col"> DESCRIPCION </th>
                  <th scope="col"> PRECIO </th>
                </tr>
              </thead>
              <tbody> 
                @foreach($paquetes as $paquete)
                <tr>
                    <td>{{ $paquete->id }}</td>
                    <td>{{ $paquete->nombre }}</td>
                    <td>{{ $paquete->descripcion }}</td>
                    <td>{{ $paquete->precio }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>        
</div>
@else
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Administrar <b>Paquetes</b></h2>
        </div>
        <div class="col-md-12">
        <form action="{{route('eventos.viewcreate')}}" method="GET">
            @csrf
            <br>
            <a href="{{route('logins.create')}}"><button type="button" class="btn btn-danger">CERRAR SESION</button></a>
            <a href="{{route('eventos.index')}}"><button type="button" class="btn btn-primary">MIS EVENTOS</button></a>
            <button type="submit" class="btn btn-success">AGREGAR EVENTO</button>
            <br><br>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"> # </th>
                  <th scope="col"> NOMBRE </th>
                  <th scope="col"> DESCRIPCION </th>
                  <th scope="col"> PRECIO </th>
                  <th scope="col"> SELECCIONAR </th>
                </tr>
              </thead>
              <tbody> 
                @foreach($paquetes as $paquete)
                <tr>
                    <td>{{ $paquete->id }}</td>
                    <td>{{ $paquete->nombre }}</td>
                    <td>{{ $paquete->descripcion }}</td>
                    <td>{{ $paquete->precio }}</td>
                    <td><input type="checkbox" name="paquete[]" value="{{$paquete->id}}"></td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </form>
        </div>
    </div>        
</div>
@endguest
</body>
</html>