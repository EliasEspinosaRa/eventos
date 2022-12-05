<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/registro.css">
    <title>NUEVO PAQUETE</title>
</head>
<body>
    <form action="{{route('paquetes.nuevoPaquete')}}" method="post" class="form-register" enctype="multipart/form-data">
        <h2 class="form__titulo"> CREAR PAQUETE</h2>
        @csrf
        <div class="contenedor-inputs">
            <label>
                Nombre:
            <input type="text" name="nombre" placeholder="Nombre" class="input-100" required> 
            </label>
            <br>
            <label>
                Descripcion:
            <input type="text" name="descripcion" placeholder="Descripción" class="input-100" required>
            </label>
            <br>
            <label>
                precio:
            <input type="text" name="precio" placeholder="Precio" class="input-100" required> 
            </label>
            <br>
            <label>
                Estado:
            <span class="input-group-text"><i class="fas fa-user"></i></span> 
            <select name="activo" id="input" placeholder="activo" class="input-100" required >

                <option>1</option>
                <option>0</option>
            </select>
            </label>
            <br>
            <label>
                Imagen:
            <input type="file"name="imagen[]" accept="image/*" multiple  class="input-48">
            </label>
            <br>
            <input type="submit" value="Registrar">
        </div>
    </form>
</body>
</html>