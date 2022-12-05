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
<div class="container mt-2">
    <div class="row">
        <div class="col-md-12 card-header text-center font-weight-bold">
          <h2>Administrar <b>Eventos</b></h2>
        </div>
        <div class="col-md-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"> # </th>
                  <th scope="col"> NOMBRE </th>
                  <th scope="col"> DIRECCION </th>
                  <th scope="col"> FECHA </th>
                  <th scope="col"> HORA INICIO </th>
                  <th scope="col"> HORA FINAL </th>
                  <th scope="col"> CONFIRMADO </th>
                  <th scope="col"> ACCION </th>
                </tr>
              </thead>
              <tbody> 
                @foreach($eventos as $evento)
                @if($evento->cliente_id == auth()->id())
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre }}</td>
                    <td>{{ $evento->direccion }}</td>
                    <td>{{ $evento->fecha }}</td>
                    <td>{{ $evento->hora_inicio }}</td>
                    <td>{{ $evento->hora_final }}</td>
                    <td>{{ $evento->confirmado }}</td>
                    <td>
                        @if($evento->confirmado == 0)
                            <a href="javascript:void(0)" class="btn btn-primary edit" data-id="{{ $evento->id }}">Editar</a>
                            <a href="javascript:void(0)" class="btn btn-danger delete" data-id="{{ $evento->id }}">Eliminar</a>
                        @endif
                        @if($evento->confirmado == 1)
                            <a href="javascript:void(0)" class="btn btn-dark foto" data-id="{{ $evento->id }}">Editar Fotos</a>
                            <a href="javascript:void(0)" class="btn btn-warning abono" data-id="{{ $evento->id }}">Abonar</a>
                        @endif
                    </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
             {{ $eventos->links() }}
        </div>
    </div>        
</div>
<!-- editar model -->
    <div class="modal fade" id="ajax-model" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditForm" name="addEditForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder=" NOMBRE" value="" maxlength="50" required="">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Direccion</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder=" DIRECCION" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Fecha</label>
                        <div class="col-sm-12">
                        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="FECHA" value="" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Hora Inicio</label>
                        <div class="col-sm-12">
                        <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" placeholder="HORA INICIO" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Hora Final</label>
                        <div class="col-sm-12">
                        <input type="time" class="form-control" id="hora_final" name="hora_final" placeholder="HORA FINAL" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save">Guardar cambios</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
<!-- end editar model -->
<!-- fotos model -->
<div class="modal fade" id="fotos-model" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Fotos</h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="editFotoForm" name="editFotoForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <div class="form-group" id="imagen"></div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
<!-- end fotos model -->
<!-- abono model -->
<div class="modal fade" id="abono-model" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="abonoForm" name="abonoForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id_abono" id="id_abono">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Monto</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" id="monto" name="monto" placeholder=" MONTO" value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save-abono">Abonar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
<!-- end abono model -->
<script>
$(document).ready(function(){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#addNewEvento').click(function () {
       $('#addEditForm').trigger("reset");
       $('#ajaxModel').html("Agregar Evento");
       $('#ajax-model').modal('show');
    });
 
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
         
        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('eventos.edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
              $('#ajaxModel').html("Editar Evento");
              $('#ajax-model').modal('show');
              $('#id').val(res.id);
              $('#nombre').val(res.nombre);
              $('#direccion').val(res.direccion);
              $('#fecha').val(res.fecha);
              $('#hora_inicio').val(res.hora_inicio);
              $('#hora_final').val(res.hora_final);
           }
        });
    });

    $('body').on('click', '.delete', function () {
       if (confirm("Desea Eliminar el Evento?") == true) {
            var id = $(this).data('id');
            
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ route('eventos.destroy') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    window.location.reload();
                }
            });
       }
    });

    $('body').on('click', '.foto', function () {
        $('#editFotoForm').html("");
        var id = $(this).data('id');

        // ajax
        $.ajax({
            type:"POST",
            url: "{{ route('eventos.foto') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                $('#fotos-model').modal('show');
                for(var i=0; i<res.length; i++){
                    var aux = '<img src="'+res[i].url+'" width="150" height="150">'+
                    '<input type="file" id="image'+res[i].id+'" name="image'+res[i].id+'" accept="image/*" required="">'+
                    '<a href="javascript:void(0)" class="btn btn-primary update-img" data-id="'+res[i].id+'">Actualizar</a><br>'+
                    '<a href="javascript:void(0)" class="btn btn-danger delete-img" data-id="'+res[i].id+'">Eliminar</a><br>';
                    $(aux).appendTo("#editFotoForm");
                }
            }
        });
    });

    $('body').on('click', '#btn-save', function (event) {
        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var direccion = $('#direccion').val();
        var fecha = $('#fecha').val();
        var hora_inicio = $('#hora_inicio').val();
        var hora_final = $('#hora_final').val();
        $("#btn-save").html('Espere por favor...');
        $("#btn-save").attr('disabled', true);

        // ajax
        $.ajax({
            method:"PUT",
            url: "{{ route('eventos.update') }}",
            data: {
                id:id,
                nombre:nombre,
                direccion:direccion,
                fecha:fecha,
                hora_inicio:hora_inicio,
                hora_final:hora_final
            },
            dataType: 'json',
            success: function(res){
                window.location.reload();
                $("#btn-save").html('submit');
                $("#btn-save").attr("disabled", false);
            }
        });
    });

    $('body').on('click', '.delete-img', function () {
       if (confirm("Desea eliminar la foto?") == true) {
            var id = $(this).data('id'); 

            // ajax
            $.ajax({
                type:"POST",
                url: "{{ route('eventos.deleteImg') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    window.location.reload();
                }
            });
       }
    });

    $('body').on('click', '.update-img', function (event) {
        var id = $(this).data('id');
        var imagen = $('#image'+id).val();

        // ajax
        $.ajax({
            method:"PUT",
            url: "{{ route('eventos.updateImg') }}",
            data: {
                id:id,
                imagen:imagen
            },
            dataType: 'json',
            success: function(res){
                console.log(res);
                window.location.reload();
            }
        });
    });

    $('body').on('click', '.abono', function (event) {
        var id = $(this).data('id');

        // ajax
        $.ajax({
            method:"POST",
            url: "{{ route('eventos.viewAbono') }}",
            data: {
                id:id
            },
            dataType: 'json',
            success: function(res){
                $('#abono-model').modal('show');
                $('#id_abono').val(res.id);
            }
        });
    });

    $('body').on('click', '#btn-save-abono', function (event) {
        var id = $('#id_abono').val();
        var monto = $('#monto').val();

        // ajax
        $.ajax({
            method:"POST",
            url: "{{ route('eventos.abono') }}",
            data: {
                id:id,
                monto:monto
            },
            dataType: 'json',
            success: function(res){
                //console.log(res);
                window.location.reload();
            }
        });
    });
});
</script>
</body>
</html>