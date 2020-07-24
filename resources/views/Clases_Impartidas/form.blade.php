




{{ csrf_field() }}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="dia">Clase Modelo:</label>
            <select name="clase" class="form-control input-sm" id="clase">
            @foreach($clases as $clase)
                    <option value="{{$clase->id}}">{{$clase->nombre}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Name">Hora inicio</label>
            @isset($clases_impartida)
                <input type="time" id="hora" name="hora" value="{{$clases_impartida->hora}}" required>
            @else
                <input type="time" id="hora" name="hora" required>
            @endisset

        </div>
    </div>

</div>

<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <label for="dia">Días:</label>

        <select name="diaS[]" class="form-control input-sm" id="dia" multiple="multiple">
            @foreach($dias as $dia)
                <option value={{array_search($dia, $dias)}}
                @isset($clases_impartida)
                    @if($clases_impartida->dia==array_search($dia, $dias))
                        {{"selected=selected"}}
                    @endif
                @endisset
                >{{$dia}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <label for="profesor">Profesor:</label>

        <select name="profesor" class="form-control input-sm" id="profesor">
            @foreach($profesores as $profesor)
                @isset($clases_impartida)
                    @if($profesor->id==$clases_impartida->profesor_id)
                        <option value="{{$profesor->id}}" selected="selected">{{$profesor->name}} {{$profesor->primer_apellido}} {{$profesor->segundo_apellido}}</option>
                    @else
                        <option value="{{$profesor->id}}" >{{$profesor->name}} {{$profesor->primer_apellido}} {{$profesor->segundo_apellido}}</option>
                    @endif
                @else
                    <option value="{{$profesor->id}}">{{$profesor->name}} {{$profesor->primer_apellido}} {{$profesor->segundo_apellido}}</option>
                @endisset
            @endforeach
        </select>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <input type="submit"  value="Guardar" class="btn btn-success btn-block">

    </div>

</div>


