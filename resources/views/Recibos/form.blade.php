




{{ csrf_field() }}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Name">Concepto</label>
            <input type="text" name="concepto" id="concepto" class="form-control input-sm" placeholder="Nombre"
                   @isset($recibo)
                   value="{{$recibo->concepto}}"
                    @endisset
            >
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" name="precio" step="0.01" id="precio"  class="form-control input-sm" placeholder="Precio en euros"
                   @isset($recibo)
                   value="{{$recibo->precio}}"
                    @endisset
            >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8">
    <div class="form-group">
        <label for="precio">Alumno</label>
        <select name="cliente_id" class="form-control input-sm" id="cliente_id" >
            @foreach($clientes as $cliente)
                @isset($recibo)
                    @if($recibo->cliente_id==$cliente->id)
                        <option value="{{$cliente->id}}" selected="selected">{{$cliente->nombre}}.{{$cliente->apellido1}}</option>
                    @else
                        <option value="{{$cliente->id}}" >{{$cliente->nombre}}.{{$cliente->apellido1}}</option>
                    @endif
                @else
                    <option value="{{$cliente->id}}">{{$cliente->nombre}}.{{$cliente->apellido1}}</option>
                @endisset


            @endforeach

        </select>
    </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <label for="fecha_recibo">Fecha de recibo</label>
            <input type="date" name="fecha_recibo" id="fecha_recibo" class="form-control input-sm"

                   @isset($recibo)

                   value="{{$recibo->fecha_recibo}}"
                   @else
                   value="{{Carbon\Carbon::now()->toDateString()}}"

                    @endisset
            >
        </div>
        </div>
    </div>
</div>

</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <input type="submit"  value="Guardar" class="btn btn-success btn-block">

    </div>

</div>


