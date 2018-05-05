<input type="hidden" name="_token" value="{{csrf_token()}}" />
<div class="row">
    <div class="col-sm-6">
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}" />
    </div>
    <div class="col-sm-6">
        <label for="email">Correo</label>
        <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}" />
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" />
    </div>
</div>