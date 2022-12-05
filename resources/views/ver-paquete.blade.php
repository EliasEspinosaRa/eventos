<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>
    <title>Actualizar Contraseña</title>
    <style>
        .btn{
            margin-right:40px;
        }
    </style>
</head>
<body>
    <div style="text-align: right">
    <br><a href="{{route('paquetes.viewNuevoPaquete')}}"><button type="button" class="btn btn-success">Agregar Paquete</button></a></br>
    </div>
    
    <table class="table align-middle mb-0 bg-white"></br>
        <thead class="bg-light">
            <tr>
                <th>ID USUARIO</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>PRECIO</th>
                <th>ACTIVO</th>
            </tr>
        </thead>
        <tbody>
        @foreach($paquetes as $paquete)
            <tr>
                <td><p class="fw-normal mb-1">{{$paquete->user_id}}</p></td>
                <td><p class="fw-normal mb-1">{{$paquete->nombre}}</p></td>
                <td><p class="fw-normal mb-1">{{$paquete->descripcion}}</p></td>
                <td><p class="fw-normal mb-1">{{$paquete->precio}}</p></td>
                <td>
                    @if($paquete->activo == 1)
                        <span class="badge badge-success rounded-pill d-inline">Activo</span>
                    @endif
                    @if($paquete->activo == 0)
                        <span class="badge badge-warning rounded-pill d-inline">No Activo</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>