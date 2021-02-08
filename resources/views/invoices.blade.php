
<table>
    <thead>
        <tr>
            @if($paterno == 1)
            <th>Apellido Paterno</th>
            @endif
            @if($materno == 1)
            <th>Apellido Materno</th>
            @endif
            @if($nombres == 1)
            <th>Nombres</th>
            @endif
            @if($direccion == 1)
            <th>Dirección</th>
            @endif
            @if($celular == 1)
            <th>Telefono</th>
            @endif
            @if($genero == 1)
            <th>Género</th>
            @endif
            @if($especialidad == 1)
            <th>Especialidad</th>
            @endif
            @if($correo == 1)
            <th>Correo Electronico</th>
            @endif
            @if($sede == 1)
            {{-- <th>Ubigeo Domicilio</th> --}}
            <th>Sede</th>
            @endif
            @if($nacimiento == 1)
            <th>Fecha de nacimiento</th>
            @endif
            @if($ultimo == 1)
            <th>Último Pago</th>
            @endif
            @if($codigo == 1)
            {{-- <th>Fecha Incorporación</th> --}}
            <th>Codigo CIP</th>
            @endif
            @if($tipo == 1)
            <th>Tipo de colegiado</th>
            @endif
            @if($estado == 1)
            <th>Estado Colegiado</th>
            @endif
            @if($dni == 1)
            {{-- <th>Lugar de Nacimiento</th> --}}
            <th>Dni</th>
            @endif
            @if($habil == 1)
            <th>Habil Hasta</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $reports)
            <tr>
                @if($paterno == 1)
                <td>{{$reports->paterno}}</td>
                @endif
                @if($materno == 1)
                <td>{{$reports->materno}}</td>
                @endif
                @if($nombres == 1)
                <td>{{$reports->nombres}}</td>
                @endif
                @if($direccion == 1)
                <td>{{$reports->direccion}}</td>
                @endif
                @if($celular == 1)
                <td>{{$reports->celular}}</td>
                @endif
                @if($genero == 1)
                <td>{{$reports->genero}}</td>
                @endif
                @if($especialidad == 1)
                <td>{{$reports->especialidades}}</td>
                @endif
                @if($correo == 1)
                <td>{{$reports->email}}</td>
                @endif
                @if($sede == 1)
                <td>{{$reports->sede}}</td>
                @endif
                @if($nacimiento == 1)
                <td>{{$reports->fechaNacimiento}}</td>
                @endif
                @if($ultimo == 1)
                <td>{{$reports->ultimoPago}}</td>
                @endif
                @if($codigo == 1)
                <td>{{$reports->codigoCIP}}</td>
                @endif
                @if($tipo == 1)
                <td>{{$reports->tipo}}</td>
                @endif
                @if($estado == 1)
                <td>{{$reports->habiliad}}</td>
                @endif
                @if($dni == 1)
                <td>{{$reports->dni}}</td>
                @endif
                @if($habil == 1)
                <td>{{$reports->habilHasta}}</td>
                @endif
            </tr>
        @endforeach

    </tbody>
</table>