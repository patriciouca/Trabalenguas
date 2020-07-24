




{{ csrf_field() }}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Name">Usuario</label>
            <input type="text" name="name" id="usuario" class="form-control input-sm" placeholder="Usuario"
                   @isset($usuario)
                   value="{{$usuario->name}}"
                    @endisset
            >
        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Name">Contraseña</label>
            <input type="password" name="password" id="contrasena" class="form-control input-sm" placeholder="Contraseña"

            >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="primer_apellido">Primer Apellido</label>
            <input type="text" name="primer_apellido" id="usuario" class="form-control input-sm" placeholder="Primer Apellido"
                   @isset($usuario)
                   value="{{$usuario->primer_apellido}}"
                    @endisset
            >
        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="segundo_apellido">Segundo Apellido</label>
            <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control input-sm" placeholder="Segundo Apellido"
                   @isset($usuario)
                   value="{{$usuario->segundo_apellido}}"
                    @endisset
            >
        </div>
    </div>
</div>
<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email"
                   @isset($usuario)
                   value="{{$usuario->email}}"
                    @endisset
            >
        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="rol">Rol</label>

            <select name="rol_id" class="form-control input-sm" id="rol" >
                @foreach($roles as $rol)
                    @isset($usuario)
                        @if($rol->id==$usuario->rol_id)
                            <option value="{{$rol->id}}" selected="selected">{{$rol->nombre}}</option>
                        @else
                            <option value="{{$rol->id}}" >{{$rol->nombre}}</option>
                        @endif
                    @else
                        <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                    @endisset


                @endforeach

            </select>

        </div>
    </div>

</div>



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <input type="submit"  value="Guardar" class="btn btn-success btn-block">

    </div>

</div>


