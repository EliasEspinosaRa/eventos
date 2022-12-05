<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="pubic/css/agregarpro.css">


    <title>gastos</title>
</head>
<body>
    <h2> Gastos</h2>
    <div class="input-group form-group">
    <!--muestra los paquetes-->
    <label> Gastos de paquete</label>
    <br>
    @foreach($evento->paquete as $paquete) 
    @if($paquete->evento_id = $evento->id)
      <li>  {{$paquete->nombre }} 
        {{$paquete->precio}}</li>
    @endif
    <br> 
@endforeach
    </div>
      <!--muestra los gastos  -->
      <div class="input-group form-group">
    <label>Gastos del evento {{$evento->nombre}}
    </label>
   <br> 
        @foreach($evento->gastos as $gasto) 
            @if($gasto->evento_id = $evento->id)
              <li>  {{$gasto->nombre }} 
                    {{$gasto->precio}}</li>
            @endif
            <br> 
        @endforeach
    
      </div>
    
    <!--muestra los fromulario para agregar gastos-->
    <div class="input-group form-group">
    <form action="{{route('registros.registroGasto',[$evento->id])}}" method="POST" >

        @csrf
        <label> Agregar otros gastos </label>
        <br>
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
            Motivo:
            <br>
            <textarea name="motivo" value="{{old('motivo')}}"></textarea>
        </label>
        @error('motivo')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
        <br>
        <label>
            Precio:
            <br>
            <input type="text" name="precio" value="{{old('precio')}}">
        </label>
        @error('precio')
            <br>
            <small>*{{$message}}</small>
            <br>
        @enderror
         <br> 
        <br>
        <button type="submit">Agregar</button>
    </div>
    </form>
</body>
</html>
