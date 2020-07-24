




{{ csrf_field() }}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Name">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre"
                   @isset($cliente)
                   value="{{$cliente->nombre}}"
                    @endisset
            >
        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control input-sm" placeholder="telefono"
                   @isset($cliente)
                   value="{{$cliente->telefono}}"
                    @endisset
            >
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control input-sm" placeholder="email"
                   @isset($cliente)
                   value="{{$cliente->email}}"
                    @endisset
            >
        </div>
    </div>


    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">

            <label for="foto">Foto</label>
            <br>

            @isset($cliente)
                <img src="{{url('imagen/'.$cliente->foto)}}" alt="">
            @endisset
            <input type="file" id="foto" name="fotoG">
        </div>
    </div>

</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellido1" id="apellido1" class="form-control input-sm" placeholder="Apellido1"
                   @isset($cliente)
                   value="{{$cliente->apellido1}}"
                    @endisset
            >
            <input type="text" name="apellido2" id="apellido2" class="form-control input-sm" placeholder="Apellido2"
                   @isset($cliente)
                   value="{{$cliente->apellido2}}"
                    @endisset
            >
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="colegio">Colegio</label>

            <select name="colegio_id" class="form-control input-sm" id="colegio_id" >
                @foreach($colegios as $colegio)
                    @isset($cliente)
                        @if($colegio->id==$cliente->colegio_id)
                            <option value="{{$colegio->id}}" selected="selected">{{$colegio->nombre}}</option>
                        @else
                            <option value="{{$colegio->id}}" >{{$colegio->nombre}}</option>
                        @endif
                    @else
                        <option value="{{$colegio->id}}">{{$colegio->nombre}}</option>
                    @endisset


                @endforeach

            </select>

        </div>
    </div>

</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="alergia">Alergias</label>

            <select name="alergias[]" class="form-control input-sm" id="alergias" multiple="multiple">
                @foreach($alergias as $alergia)
                    @isset($cliente)
                        @php($entrada=false)
                        @foreach($cliente->alergias as $alergiaCliente)
                            @if($alergia->id==$alergiaCliente->id)
                                <option value="{{$alergia->id}}" selected>{{$alergia->nombre}}</option>
                                @php($entrada=true)
                            @endif
                        @endforeach
                        @if(!$entrada)
                            <option value="{{$alergia->id}}">{{$alergia->nombre}}</option>
                        @endif
                    @else
                        <option value="{{$alergia->id}}">{{$alergia->nombre}}</option>
                    @endisset
                @endforeach

            </select>

            <label for="aspectos">Nota Alergias</label>
            <input type="text" name="alergia_nota" id="alergia_nota" class="form-control input-sm" placeholder="Nota Alergia"
                   @isset($cliente)
                   value="{{$cliente->alergia_nota}}"
                    @endisset
            >
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="aspecto">Aspectos</label>

            <select name="aspectos[]" class="form-control input-sm" id="aspectos" multiple="multiple">
                @foreach($aspectos as $aspecto)

                    @isset($cliente)
                        @php($entrada=false)
                        @foreach($cliente->aspectos as $aspectoCliente)
                            @if($aspecto->id==$aspectoCliente->id)
                                <option value="{{$aspecto->id}}" selected>{{$aspecto->nombre}}</option>
                                @php($entrada=true)
                            @endif
                        @endforeach
                        @if(!$entrada)
                            <option value="{{$aspecto->id}}">{{$aspecto->nombre}}</option>
                        @endif
                    @else
                        <option value="{{$aspecto->id}}">{{$aspecto->nombre}}</option>
                    @endisset

                @endforeach

            </select>

            <label for="aspectos">Nota Aspectos</label>
            <input type="text" name="aspectos_nota" id="aspectos_nota" class="form-control input-sm" placeholder="Nota Aspectos"
                   @isset($cliente)
                   value="{{$cliente->aspectos_nota}}"
                    @endisset
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="tutor">Tutores</label>
            <input type="text" name="tutor" id="tutor" class="form-control input-sm" placeholder="tutor"
                   @isset($cliente)
                   value="{{$cliente->tutor}}"
                    @endisset
            >
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="nombrePadres">Padres</label>
            <input type="text" name="nombrePadres" id="nombrePadres" class="form-control input-sm" placeholder="nombrePadres"
                   @isset($cliente)
                   value="{{$cliente->nombrePadres}}"
                    @endisset
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="hermanos">Hermanos</label>
            <input type="text" name="hermanos" id="hermanos" class="form-control input-sm" placeholder="hermanos"
                   @isset($cliente)
                   value="{{$cliente->hermanos}}"
                    @endisset
            >
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="personasconviven">Personas con las que convive</label>
            <input type="text" name="personasconviven" id="personasconviven" class="form-control input-sm" placeholder="personasconviven"
                   @isset($cliente)
                   value="{{$cliente->personasconviven}}"
                    @endisset
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">

            <label for="presentainforme">Presenta Informe</label>


            @isset($cliente)
                @if($cliente->presenta_informe==0)
                    <input disabled type="radio" name="presenta_informe" id="presenta_informe" class="" value="1"> Si
                    <input type="radio" name="presenta_informe" id="presenta_informe" class="" value="0" checked="checked"> No

                @else
                    <input type="radio" name="presenta_informe" id="presenta_informe" class="" value="1" checked="checked"> Si
                    <input type="radio" name="presenta_informe" id="presenta_informe" class="" value="0" disabled > No
                    <a  target="_blank" href="{{url('informes/'.$cliente->informe)}}" alt="">Informe</a>
                @endif

            @else
                <input disabled type="radio" name="presenta_informe" id="presenta_informe" class="" value="1"> Si
                <input type="radio" name="presenta_informe" id="presenta_informe" class="" value="0" checked="checked"> No

            @endisset
            <br>
            <input type="file" id="informe" name="informeG">

        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="fecharegistro">Fecha de registro</label>
            <input type="date" name="fecharegistro" id="fecharegistro" class="form-control input-sm"

                   @isset($cliente)

                   value="{{$cliente->fecharegistro}}"

                    @endisset
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="fechanacimiento">Fecha Nacimiento</label>
            <input type="date" name="fechanacimiento" id="fechanacimiento" class="form-control input-sm" placeholder="fechanacimiento"
                   @isset($cliente)

                   value="{{$cliente->fechanacimiento}}"

                    @endisset
            >
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="cuota">Cuota</label>
            <input type="number" name="cuota" id="cuota" step="any"  class="form-control input-sm" placeholder="cuota"
                   @isset($cliente)

                   value="{{$cliente->cuota}}"

                    @endisset
            >
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <input type="submit"  value="Guardar" class="btn btn-success btn-block">

    </div>

</div>


