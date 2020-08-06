 @extends('layouts.layout')
        @section('content')

            <div class="row">
                <section class="content">
                    <div class="col-md-8 col-md-offset-2">

                        <table class="table table-striped">
                            <tr>
                                <th></th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miercoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>

                            </tr>
                            @php



                                for($i=0;$i<7;$i++)
                                {
                                    echo "<tr>";
                                    echo "<td>";
                                    for($j=0;$j<2;$j++)
                                    {

                                        echo $horas[($i+$j)];
                                        echo "<br>";
                                        $horaF=$horas[$i+1];
                                        $horaI=$horas[$i];

                                    }
                                    echo "</td>";

                                    for($z=0;$z<5;$z++)
                                    {
                                        $encontrado=false;

                                        foreach($primero as $clase){


                                            if($clase->dia==$z)
                                            {


                                                if($clase->hora_fin>$horaI && $horaF > $clase->hora){
                                                    $encontrado=true;
                                                    echo "<td>";
                                                    echo $clase->hora."  -  ".$clase->hora_fin;

                                                    echo "</td>";
                                                }

                                            }

                                            if(!$encontrado)
                                                echo "<td>";


                                                echo "</td>";
                                        }


                                    }



                                    echo "</tr>";
                                }


                            @endphp
                        </table>




                            @foreach($segundo as $clase)

                                {{$clase->dia}}
                            @endforeach

                    </div>
                </section>

@endsection