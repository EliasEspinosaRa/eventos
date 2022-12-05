<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos Gerente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style_principal.css">
  
    
</head>
<body>
   
    <div class="container-fluid">
        <div class="row">
            <main class="main col">
                <div class="row justify-content-center align-content-center text-center">
                    <div class="columna col-lg-6">
                        <h1><center> EVENTOS </center></h1>
                      
                        <table class= "table table-light">
                            <thead class="thead-light">
                                <tr>
                                <th>#</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Gerente</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                <th>Aprobaciones</th>
                                </tr>
                            </thead>
                           <tbody>
                            @foreach($eventos as $evento)
                            @if (!$evento->motivo)
                               <tr>
                                   <td>{{$evento->id}}</td>
                                   <td><img width ="110px" height="110px" src= {{$evento->imagen}}></td>
                                   <td>{{$evento->nombre}}</td>
                                   <td>{{$evento->fecha}}</td>
                                   <td>{{$evento->cliente_id}}</td>
                                   <th>{{$evento->gerente_id}}</th>
                                   <td>{{$evento->confirmado}}</td>

                                   <td>
                                        <div class="contenedor-inputs">
                                            <a href="{{route('eventos.infoEvento',$evento->id)}}"><button class="btn btn-primary" type="submit" style="background-color: purple; margin: 3px"> Modificar </button></a>
                                        </div>
                                        <div class="contenedor-inputs">
                                            <a href="{{route('eventos.gastoEvento',$evento->id)}}"><button class="btn btn-primary" type="submit" style="background-color: rgb(255, 0, 234); margin: 3px"> Gastos </button></a>
                                        </div>
                                    @if($evento->confirmado == 1)
                                    <div class="contenedor-inputs">
                                        <a href="{{route('Eventos.mostrarEventos',[$evento->id])}}"><button class="btn btn-primary" type="submit" style="background-color: purple; margin: 3px"> Ver Fotos </button></a>
                                    </div>
                                    @endif
                                   </td>
                                   <td>
                                    @if ($evento->confirmado==0)
                                    <div class="contenedor-inputs">
                                        <form action="{{route('evento.confirmar',$evento->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-primary" type="submit" style="background-color: rgb(255, 0, 234); margin: 3px"> Confirmar </button></a>
                                        </form>
                                    </div>

                                    <div class="contenedor-inputs">
                                        <form action="{{route('evento.noConfirmar',$evento->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <input type="text" placeholder="motivo" name="motivo">
                                            <button class="btn btn-primary" style="background-color: purple; margin: 3px"> No confirmar </button></a>
                                        </form>
                                    </div>
                                    @endif
                                   </td>
                               </tr>
                               @endif
                               @endforeach
                           </tbody> 
                            </table>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
</body>
</html>