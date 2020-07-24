




{{ csrf_field() }}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Name">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre"
                   @isset($clase)
                   value="{{$clase->nombre}}"
                    @endisset
            >
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="duracion">Duracion</label>
            <input type="number" name="duracion" id="duracion" type="number" class="form-control input-sm" placeholder="Duracion en minutos"
                   @isset($clase)
                   value="{{$clase->duracion}}"
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


