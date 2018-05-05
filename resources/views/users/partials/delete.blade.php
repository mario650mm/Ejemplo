<button type="button" class="btn btn-danger btn-sm"
        data-toggle="modal" data-target="#deleteModal">
    <i class="fa fa-trash-alt"></i> Eliminar
</button>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
     aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usuario {{$user->name}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿ Estás seguro de eliminar el usuario {{ $user->name }} ?
            </div>
            <form action="{{url('/users/delete/'.$user->id)}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm"
                            data-dismiss="modal">
                        <i class="fa fa-circle-notch"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash-alt"></i> Eliminar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>