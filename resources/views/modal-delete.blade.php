<div class="modal fade" id="modal-delete-{{$empleado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('empleados.destroy', $empleado)}}" method="POST">
            @method('DELETE')
            @csrf
            {{-- <button type="submit" class="btn btn-light"><i class="fa fa-trash" aria-hidden="true"></i></button> --}}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Desea eliminar el empleado {{$empleado->nombre}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save" aria-hidden="true"></i> Aceptar</button>
                </div>
            </div>
        </form>
    </div>
</div>