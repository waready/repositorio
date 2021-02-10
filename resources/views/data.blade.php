@foreach ($cip_user as $users )
<tr class="odd gradeX">

    <td>{{$users->codigoCIP}}</td>
    <td>{{$users->name}}</td>
    <td>{{$users->dni}}</td>
    <td>{{$users->email}}</td>
    <td>{{$users->celular}}</td>
    <td>{{$users->ultimoPago}}</td>
    <td> 
        {{$users->sede}}
    </td>

    <td>
    {{-- {{$users->tipoColegiado}} --}}
    {{$users->tipo}}

    </td>
    <td >
    {{$users->habiliad}}

    </td>
    <td>

    @foreach ($users->especialidades as $items )
        <li>
        {{$items->especialidad}}
        </li>
    @endforeach
    </td>

    </tr>
@endforeach