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
    </style>
  </head>
  <body>
    <div class="container my-5">
        <div clas="row">
            <h2><i class="fa fa-edit" aria-hidden="true"></i> Editar empleados</h2>
            <div class="col-md-8">
                <form action="{{route('empleados.update', $empleado->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                            <div class="alert alert-primary" role="alert">
                                Los campos con asterisos(*) son obligatorios
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-3">
                                    <label for="nombre" class="bold">Nombre completo *</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        aria-describedby="emailHelp" placeholder="Nombre completo del empleado" value="{{$empleado->nombre}}" required>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <div class="col-3">
                                    <label for="correo" class="bold">Correo electrónico *</label>
                                </div>
                                <div class="col-8">
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp" placeholder="Correo electrónico" value="{{$empleado->email}}" required>
                                </div>
                            </div>
        
                            <div class="form-group row my-2">
                                <div class="col-3">
                                    <label for="sexo" class="bold">Sexo *</label>
                                </div>
                                <div class="col-8">
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"
                                                value="M" {{ ($empleado->sexo=="M")? "checked" : "" }} required>
                                            <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                        </div>
                                        <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2"
                                                value="F" {{ ($empleado->sexo=="F")? "checked" : "" }} required>
                                            <label class="form-check-label" for="inlineRadio2">Femenino</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="form-group row mb-2">
                                <div class="col-3">
                                    <label class="bold" for="area">Área *</label>
                                </div>
                                <div class="col-8">
                                    <select class="custom-select form-control" id="area_id" name="area_id">
                                        <option selected>Selecione</option>
                                        @foreach ($areas as $area)
                                            <option value="{{$area->id}}" {{ ( $area->id == $empleado->area_id) ? 'selected' : '' }}>
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
                                        required>{{$empleado->descripcion}}</textarea>
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
                                                value="1" {{ ($empleado->boletin==1) ? "checked" : "" }}>
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
                                                    value="{{$role->id}}" @foreach ($empleado->roles as $item) {{ ( $role->id == $item->id) ? 'checked' : ''}} @endforeach>                              
                                                <label class="form-check-label" for="inlineRadio1">{{$role->nombre}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class=" d-flex justify-content-end">
                                <a href="{{route('empleados.index')}}" class="btn btn-danger"><i class="fas fa-chevron-circle-left"></i> Volver</a>
                                <button type="submit" class="btn btn-primary mx-2"><i class="fa fa-save" aria-hidden="true"></i> Actualizar</button>
                            </div>
                </form>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js'></script>
    <script src='{{asset('js/validations.js')}}'></script>
  </body>
</html>