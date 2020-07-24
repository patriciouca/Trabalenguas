




{{ csrf_field() }}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="concepto">Concepto</label>
            <input type="text" name="concepto" id="concepto" class="form-control input-sm" placeholder="Concepto"
                   @isset($gasto)
                   value="{{$gasto->concepto}}"
                    @endisset
            >
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" name="precio" step="0.01" id="precio"  class="form-control input-sm" placeholder="Precio en euros"
                   @isset($gasto)
                   value="{{$gasto->precio}}"
                    @endisset
            >
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="fecha_recibo">Fecha de recibo</label>
            <input type="date" name="fecha_recibo" id="fecha_recibo" class="form-control input-sm"

                   @isset($gasto)

                    value="{{$gasto->fecha_recibo}}"
                   @else
                   value="{{Carbon\Carbon::now()->toDateString()}}"

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


