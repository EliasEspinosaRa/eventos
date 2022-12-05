<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <title>Eventos</title>
</head>
<body>
    <div class="card-body">
        <div class="form-group">
            <strong>Nombre:</strong>
            {{ $evento->nombre }}
        </div>
        <strong>Imagenes:</strong>
        @foreach($evento->imagenes as $imagen)
            <div class="form-group">
                <img src="{{$imagen->url}}" width="200" height="200">
                @if (Auth::user()->can('validar', $imagen))
                <form action="{{route('images.update', [$imagen->id, $evento->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="file" name="imagen">
                    <button type="submit" class="btn btn-primary">Modificar</button>
                </form>
                <form action="{{route('images.delete', [$imagen->id, $evento->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                @endif
            </div>
        @endforeach
</body>
</html>