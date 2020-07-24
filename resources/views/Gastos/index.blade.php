 @extends('layouts.layout')
        @section('content')

            <div class="row">
                <section class="content">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="pull-left"><h3>Gastos</h3></div>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <form action="" method="get" style="display:inline">
                                            <select name="id">
                                            @foreach ($meses as $key=>$mes)
                                                <option
                                                @if($key==$mesI)
                                                        {{"selected=selected"}}
                                                @endif
                                                value={{ $key }}>{{ $mes }}</option>
                                            @endforeach
                                            </select>
                                            <input type="submit" value="Buscar">
                                        </form>
                                        <a href="{{ route('gasto.create') }}" class="btn btn-info" >Añadir Gasto</a>
                                    </div>
                                </div>
                                <div class="table-container">
                                    @if(count($gastos)>0)
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                        @foreach(array_keys($gastos[0]->toArray()) as $atributo)
                                            @if(in_array($atributo, $campos))
                                                <th>{{$atributo}}</th>
                                            @endif

                                        @endforeach
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        </thead>
                                        <tbody>
                                        @if($gastos->count())
                                            @foreach($gastos as $gasto)


                                                <tr>
                                                    @foreach(array_keys($gastos[0]->toArray()) as $atributo)
                                                        @if(in_array($atributo, $campos))
                                                            <td>{{$gasto->$atributo}}</td>
                                                            @if($atributo=="precio")
                                                                @php
                                                                    $precio+=$gasto->$atributo;
                                                                @endphp
                                                            @endif
                                                        @endif
                                                    @endforeach

                                                    <td><a class="btn btn-primary btn-xs" href="{{action('GastoController@edit', $gasto->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                    <td>
                                                        <form action="{{action('GastoController@destroy', $gasto->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">

                                                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                        </form>
                                                    </td>
                                                </tr>

                                            @endforeach
                                            <tr style='  background-color:#d9edf7 !important' class="bg-info"><td>Sumatorio</td><td>{{$precio}}</td></tr>
                                        @else
                                            <tr>
                                                <td colspan="8">No hay gastos</td>
                                            </tr>
                                        @endif
                                        </tbody>

                                    </table>
                                @endif
                                </div>
                            </div>
                            {{ $gastos->links() }}
                        </div>
                    </div>
                </section>

@endsection