<form action="/ggwp">
    <input type="text" name="id_1">
    <input type="text" name="id_2">
    <button type="submit"> enviar</button>
</form>


<a class="btn btn-success" href="/ggwp"> export excel </a>
<table>
    <thead>
        <tr>
            <th>todos los datos que ni recuerdo fuck you</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $reports )
            <tr>
                <td>{{ $reports->name}}</td>
            </tr>
        @endforeach

    </tbody>
</table>