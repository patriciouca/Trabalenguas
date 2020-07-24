




{{ csrf_field() }}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Name">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre"
                   @isset($colegio)
                   value="{{$colegio->nombre}}"
                    @endisset
            >
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <label for="Name">Localidad</label>
                <input type="text" name="localidad" id="localidad" class="form-control input-sm" placeholder="Localidad"
                       @isset($colegio)
                       value="{{$colegio->localidad}}"
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


