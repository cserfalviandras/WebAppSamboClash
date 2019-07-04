<tr>
    <td>
        @php
            echo $name;
        @endphp
    </td>
    <td>
        @php
            echo $start_date;
        @endphp
    </td>
    <td>
        @php
            echo $end_date;
        @endphp
    </td>
    <td>
        <a href="{{ route('competitions.edit', [$comp_id], 'edit') }}" class="card-link">Szerkesztés</a>
    </td>
</tr>