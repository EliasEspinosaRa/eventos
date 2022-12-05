<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('fotos.add', $evento)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>
            Imagen:
            <br>
            <input type="file" name="imagen[]" accept="image/*" multiple>
        </label>
        @error('imagen')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <br>
        <button type="submit" class="button">Agregar</button>
    </form>
</body>
</html>