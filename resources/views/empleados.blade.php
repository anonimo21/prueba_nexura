<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Empleados</title>
    <style>
        .bold{
            font-weight: bold;
        }
        label.error { float: none; color: red; padding-left: .5em; vertical-align: middle; font-size: 12px; }
    </style>
  </head>
  <body>
    <div class="container my-5">
        <div clas="row">
            <h2><i class="fa fa-list" aria-hidden="true"></i> Lista de empleados</h2>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="texto" placeholder="Buscar...">
                                </div>
                                <div class="col-auto">
                                    <input type="submit" class="btn btn-outline-success" value="Buscar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end">
                        <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-user-plus" aria-hidden="true"></i> Crear</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </symbol>
                </svg>
                @if (session('info'))
                <div class="alert alert-primary alert-dismissible fade show d-flex align-items-center mt-2" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <strong>{{session('info')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col"><i class="fas fa-user" aria-hidden="true"></i> Nombre</th>
                        <th scope="col"><i class="fas fa-at" aria-hidden="true"></i> Email</th>
                        <th scope="col"><i class="fas fa-venus-mars" aria-hidden="true"></i> Sexo</th>
                        <th scope="col"><i class="fas fa-briefcase" aria-hidden="true"></i> Area</th>
                        <th scope="col"><i class="fas fa-envelope" aria-hidden="true"></i> Boletin</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                            <tr>
                                <td>{{$empleado->nombre}}</td>
                                <td>{{$empleado->email}}</td>
                                <td>{{$empleado->sexo}}</td>
                                <td>{{$empleado->area->nombre}}</td>
                                <td>{{($empleado->boletin == 1) ? 'Si' : 'No'}}</td>
                                <td>
                                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-light"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$empleado->id}}">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    {{-- <form action="{{route('empleados.destroy', $empleado)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-light" data-toggle="modal" data-target="#exampleModalDelete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form> --}}
                                </td>
                            </tr>   
                            <!-- Modal Delete-->
                            @include('modal-delete')
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{$empleados->links()}}
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="{{route('empleados.store')}}" method="POST" name="formCrear" id="formCrear">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Crear Empleado</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-primary" role="alert">
                                        Los campos con asterisos(*) son obligatorios
                                    </div>
                                    <div class="form-group row mb-2">
                                        <div class="col-3">
                                            <label for="nombre" class="bold">Nombre completo *</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                aria-describedby="emailHelp" placeholder="Nombre completo del empleado" required>
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label for="correo" class="bold">Correo electrónico *</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="email" class="form-control" id="email" name="email"
                                                aria-describedby="emailHelp" placeholder="Correo electrónico" required>
                                        </div>
                                    </div>
                
                                    <div class="form-group row my-2">
                                        <div class="col-3">
                                            <label for="sexo" class="bold">Sexo *</label>
                                        </div>
                                        <div class="col-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"
                                                        value="M">
                                                    <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                                </div>
                                                <br>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2"
                                                        value="F">
                                                    <label class="form-check-label" for="inlineRadio2">Femenino</label>
                                                </div>
                                        </div>
                                    </div>
                
                                    <div class="form-group row mb-2">
                                        <div class="col-3">
                                            <label class="bold" for="area">Área *</label>
                                        </div>
                                        <div class="col-8">
                                            <select class="custom-select form-control" id="area_id" name="area_id" required>
                                                {{-- <option selected>Selecione</option> --}}
                                                @foreach ($areas as $area)
                                                    <option value="{{$area->id}}">
                                                        {{$area->nombre}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label class="bold" for="descripcion">Descripción *</label>
                                        </div>
                                        <div class="col-8">
                                            <textarea type="text" class="form-control" id="descripcion" name="descripcion"
                                                aria-describedby="emailHelp" placeholder="Descripcíon de la experiencia del empleado"
                                                required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row my-4">
                                        <div class="col-3">
                                            <label for=""></label>
                                        </div>
                                        <div class="col-8">
                                            <div class="d-block">
                                                <div class="form-check form-check-inline col-12 mt-0">
                                                    <input class="form-check-input" type="checkbox" name="boletin" id="inlineRadio1"
                                                        value="1">
                                                    <label class="form-check-label" for="inlineRadio1" id="boletin">
                                                        Deseo recibir boletín informativo
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <div class="col-3">
                                            <label class="bold" for="id_area">Roles *</label>
                                        </div>
                                        <div class="col-8">
                                            <div class="d-block">
                                                @foreach($roles as $role)
                                                <div class="form-check form-check-inline col-12 mt-0">                              
                                                    <input class="form-check-input" type="checkbox" name="rol_id[]" id="inlineRadio1 rol_id"
                                                        value="{{$role->id}}">                              
                                                    <label class="form-check-label" for="inlineRadio1">{{$role->nombre}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Cerrar</button>
                                    <button type="submit" class="btn btn-primary" id="btnSave"><i class="fa fa-save" aria-hidden="true"></i> Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js'></script>
    <script>
        $(function() {
            $("#btnSave").on('click', function() {
                $("#formCrear").validate({
                    rules: {
                        nombre: {
                            required: true,
                        },
                        email: {
                            required: true, 
                            email:true
                        },
                        sexo: {
                            required: true,
                        },
                        descripcion: {
                            required: true,
                        }
                    },
                    messages: {
                        nombre: {
                            required: "Campo nombre requerido *"
                        },
                        email: {
                            required: "Campo email requerido *"
                        },
                        sexo: {
                            required: "Campo sexo requerido *"
                        },
                        descripcion: {
                            required: "Campo descripción requerido *"
                        },
                    }
                });
            });
        });
    </script>
</body>
</html>