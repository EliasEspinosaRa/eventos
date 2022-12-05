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
</head>
<body>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th>ID USUARIO</th>
                <th>NOMBRE</th>
                <th>APELLIDO PATERNO</th>
                <th>APELLIDO MATERBO</th>
                <th>ROL</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td><p class="fw-normal mb-1">{{$usuario->id}}</p></td>
                <td><p class="fw-normal mb-1">{{$usuario->nombre}}</p></td>
                <td><p class="fw-normal mb-1">{{$usuario->apellido_p}}</p></td>
                <td><p class="fw-normal mb-1">{{$usuario->apellido_m}}</p></td>
                <td><p class="fw-normal mb-1">{{$usuario->rol}}</p></td>
                <td>
                    <a href="{{route('passwords.viewUpdate', $usuario->id)}}"><button class="botons" type="submit"> Cambiar Contraseña </button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
