<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar</title>

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
<h1>Actualizar Contraseña</h1>
  <form action="{{route('passwords.update')}}" method="POST">
      @csrf
      @method('put')
      <label>
          Email:
          <br>
          <input type="email" name="email" value="{{$usuario->email}}">
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
          Nueva Contraseña:
          <br>
          <input type="password" name="newpassword" value="{{old('newpassword')}}">
      </label>
      @error('newpassword')
          <br>
          <small>*{{$message}}</small>
          <br>
      @enderror
      <br>
      <br>
      <button type="submit" class="button button1">Actualizar</button>
  </form>
</body>
</html>