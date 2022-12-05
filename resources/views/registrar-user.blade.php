<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>

  <style>
    .button {
        border: none;
        color: white;
        padding: 10px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .button1 {background-color: #4CAF50;}/*Verde*/
    .button2 {background-color: #008CBA;}/*Azul*/
    .button3 {background-color: #f44336;}/*Rojo*/
  </style>
</head>
<body>
<h1>Agregar Usuario</h1>
  <form action="{{route('gerente.registrar')}}" method="POST">
      @csrf
      <label>
          Nombre:
          <br>
          <input type="text" name="nombre" value="{{old('nombre')}}">
      </label>
      @error('nombre')
          <br>
          <small>*{{$message}}</small>
          <br>
      @enderror
      <br>
      <label>
          Apellido Paterno:
          <br>
          <input type="text" name="apellido_p" value="{{old('apellido_p')}}">
      </label>
      @error('apellido_p')
          <br>
          <small>*{{$message}}</small>
          <br>
      @enderror
      <br>
      <label>
          Apellido Materno:
          <br>
          <input type="text" name="apellido_m" value="{{old('apellido_m')}}">
      </label>
      @error('apellido_m')
          <br>
          <small>*{{$message}}</small>
          <br>
      @enderror
      <br>
      <label>
          Email:
          <br>
          <input type="email" name="email" value="{{old('email')}}">
      </label>
      @error('email')
          <br>
          <small>*{{$message}}</small>
          <br>
      @enderror
      <br>
      <label>
          Contraseña:
          <br>
          <input type="password" name="password" value="{{old('password')}}">
      </label>
      @error('password')
          <br>
          <small>*{{$message}}</small>
          <br>
      @enderror
      <br>
      <label>
          Elegir Rol:
          <br>
          <select name="rol" value="{{old('rol')}}">
              <option>Cliente</option>
              <option>Gerente</option>
              <option>Empleado</option>
          </select>
      </label>
      <br>
      <br>
      <button type="submit" class="button button1">Registrar</button>
  </form>
</body>
</html>